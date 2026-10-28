<?php
declare(strict_types=1);

/**
 * Read-only ShadowSix database/schema preflight.
 *
 * Static mode verifies the checked-in schema without a database:
 *   php scripts/db_preflight.php --schema-only
 *
 * Live mode checks connectivity and required columns without reading or
 * changing application records:
 *   php scripts/db_preflight.php
 *
 * This script is CLI-only and never prints credentials or raw database errors.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit("Not found.\n");
}

$requiredColumns = [
    'login' => ['id', 'fullname', 'email', 'password', 'role', 'created_at'],
    'materi' => [
        'id', 'nama_pelajaran', 'judul_materi', 'isi_materi',
        'gambar_materi', 'gambar_mapel', 'nama_guru', 'created_at',
    ],
    'kontak' => ['id', 'nama', 'email', 'pesan', 'created_at'],
];

function reportFailure(string $message, int $exitCode = 1): never
{
    fwrite(STDERR, "FAIL: {$message}" . PHP_EOL);
    exit($exitCode);
}

function verifySchemaFile(array $requiredColumns): void
{
    $schemaPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'shadowsix.sql';
    $sql = file_get_contents($schemaPath);
    if (!is_string($sql)) {
        reportFailure('cannot read shadowsix.sql.');
    }

    $declaredTables = [];
    preg_match_all(
        '/CREATE\s+TABLE\s+IF\s+NOT\s+EXISTS\s+`([^`]+)`\s*\((.*?)\)\s*ENGINE\s*=/is',
        $sql,
        $tableMatches,
        PREG_SET_ORDER
    );

    foreach ($tableMatches as $tableMatch) {
        $tableName = $tableMatch[1];
        preg_match_all('/^\s*`([^`]+)`/m', $tableMatch[2], $columnMatches);
        $declaredTables[$tableName] = $columnMatches[1] ?? [];
    }

    $missing = [];
    foreach ($requiredColumns as $tableName => $columns) {
        if (!array_key_exists($tableName, $declaredTables)) {
            $missing[] = $tableName . ' (table)';
            continue;
        }
        foreach ($columns as $columnName) {
            if (!in_array($columnName, $declaredTables[$tableName], true)) {
                $missing[] = $tableName . '.' . $columnName;
            }
        }
    }

    if ($missing !== []) {
        reportFailure('schema is missing required declarations: ' . implode(', ', $missing));
    }

    echo "PASS: schema file contains every required table and column." . PHP_EOL;
}

$args = array_slice($argv, 1);
if (in_array('--help', $args, true)) {
    echo "Usage: php scripts/db_preflight.php [--schema-only]" . PHP_EOL;
    echo "  --schema-only  Check shadowsix.sql without a live database connection." . PHP_EOL;
    echo "  (no option)    Check configured database connection and required columns." . PHP_EOL;
    exit(0);
}
foreach ($args as $arg) {
    if ($arg !== '--schema-only') {
        reportFailure('unsupported option. Use --help for usage.', 2);
    }
}

if (in_array('--schema-only', $args, true)) {
    verifySchemaFile($requiredColumns);
    exit(0);
}

require_once dirname(__DIR__) . '/config_loader.php';
$dbConfig = shadowsix_database_config();
$dbName = $dbConfig['DB_NAME'] ?? null;

if (!is_string($dbName) || trim($dbName) === '') {
    reportFailure('DB_NAME must be set in config.local.php or the server environment.', 2);
}

try {
    $db = shadowsix_open_database($dbConfig);
} catch (Throwable $error) {
    reportFailure('database connection failed. Verify private DB_* settings, TLS and host permissions.', 2);
}

$requiredTableNames = array_keys($requiredColumns);
$placeholders = implode(', ', array_fill(0, count($requiredTableNames), '?'));
$query = "SELECT TABLE_NAME, COLUMN_NAME
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_SCHEMA = ? AND TABLE_NAME IN ({$placeholders})";

$foundColumns = [];
try {
    $statement = $db->prepare($query);
    $parameterTypes = str_repeat('s', count($requiredTableNames) + 1);
    $parameterValues = array_merge([$dbName], $requiredTableNames);
    $boundParameters = [$parameterTypes];
    foreach ($parameterValues as $index => $_) {
        $boundParameters[] = &$parameterValues[$index];
    }
    if (!call_user_func_array([$statement, 'bind_param'], $boundParameters)) {
        reportFailure('could not bind database metadata query parameters.', 2);
    }
    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_assoc()) {
        $foundColumns[$row['TABLE_NAME']][] = $row['COLUMN_NAME'];
    }

    $statement->close();
    $db->close();
} catch (Throwable $error) {
    reportFailure('could not read database table metadata; check database permissions.', 2);
}

$missing = [];
foreach ($requiredColumns as $tableName => $columns) {
    foreach ($columns as $columnName) {
        if (!in_array($columnName, $foundColumns[$tableName] ?? [], true)) {
            $missing[] = $tableName . '.' . $columnName;
        }
    }
}

if ($missing !== []) {
    reportFailure('connected database is missing required columns: ' . implode(', ', $missing));
}

echo "PASS: database connection and required application schema are healthy." . PHP_EOL;
echo "No application records were read or modified." . PHP_EOL;
