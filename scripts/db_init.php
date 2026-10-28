<?php
declare(strict_types=1);

/**
 * Initialize only the schema checked into this repository.
 *
 * This script is CLI-only, imports no user data, never drops tables and uses
 * CREATE TABLE IF NOT EXISTS. It is intended for a new deployment database.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit("Not found.\n");
}

require_once dirname(__DIR__) . '/config_loader.php';

$schemaPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'shadowsix.sql';
$schema = file_get_contents($schemaPath);
if (!is_string($schema) || trim($schema) === '') {
    fwrite(STDERR, "FAIL: the checked-in schema could not be read.\n");
    exit(1);
}

$schema = preg_replace('/^\s*--.*$/m', '', $schema);
$statements = preg_split('/;\s*(?:\r?\n|$)/', (string) $schema, -1, PREG_SPLIT_NO_EMPTY);
if (!is_array($statements) || $statements === []) {
    fwrite(STDERR, "FAIL: no schema statements were found.\n");
    exit(1);
}

$connection = null;
$lastErrorClass = 'RuntimeException';
for ($attempt = 1; $attempt <= 30; $attempt++) {
    try {
        $connection = shadowsix_open_database(shadowsix_database_config());
        break;
    } catch (Throwable $error) {
        $lastErrorClass = get_class($error);
        if ($attempt < 30) {
            sleep(2);
        }
    }
}

if (!$connection instanceof mysqli) {
    error_log('ShadowSix schema bootstrap could not connect to the database: ' . $lastErrorClass);
    fwrite(STDERR, "FAIL: database connection unavailable after retries. Check private DB_* settings and TLS.\n");
    exit(1);
}

try {
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if ($statement === '') {
            continue;
        }
        // The schema file is repository-owned SQL, not user input.
        $connection->query($statement);
    }
    echo "PASS: ShadowSix schema initialized without dropping or importing user data.\n";
} catch (Throwable $error) {
    error_log('ShadowSix schema bootstrap failed: ' . get_class($error));
    fwrite(STDERR, "FAIL: schema initialization failed. Check database permissions and SQL compatibility.\n");
    $connection->close();
    exit(1);
}

$connection->close();
