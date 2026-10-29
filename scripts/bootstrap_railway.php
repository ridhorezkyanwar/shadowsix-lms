<?php
declare(strict_types=1);

/**
 * Initialize the schema and least-privileged application account on a fresh
 * MySQL-compatible deployment. This is CLI-only and safe to rerun: shadowsix.sql
 * uses CREATE TABLE IF NOT EXISTS and contains no user/contact seed records.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit("Not found.\n");
}

function railway_bootstrap_fail(string $safeMessage, int $code = 1): never
{
    fwrite(STDERR, "ShadowSix bootstrap failed: " . $safeMessage . PHP_EOL);
    exit($code);
}

$host = getenv('DB_BOOTSTRAP_HOST');
$rootUser = getenv('DB_BOOTSTRAP_USER');
$rootPassword = getenv('DB_BOOTSTRAP_PASSWORD');
$dbName = getenv('DB_NAME');
$appUser = getenv('DB_USER');
$appPassword = getenv('DB_PASSWORD');
$portValue = getenv('DB_BOOTSTRAP_PORT');
if (!is_string($portValue) || trim($portValue) === '') {
    $portValue = getenv('DB_PORT');
}
if (!is_string($portValue) || trim($portValue) === '') {
    $portValue = '3306';
}
$port = filter_var($portValue, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 65535],
]);
$sslValue = getenv('DB_BOOTSTRAP_SSL');
if (!is_string($sslValue) || trim($sslValue) === '') {
    $sslValue = getenv('DB_SSL');
}
$sslEnabled = in_array(strtolower(trim(is_string($sslValue) ? $sslValue : '0')), ['1', 'true', 'yes', 'on'], true);
$caValue = getenv('DB_BOOTSTRAP_SSL_CA');
if (!is_string($caValue) || trim($caValue) === '') {
    $caValue = getenv('DB_SSL_CA');
}
$caFile = is_string($caValue) ? trim($caValue) : '';

if (
    !is_string($host) || trim($host) === '' ||
    !is_string($rootUser) || trim($rootUser) === '' ||
    !is_string($rootPassword) ||
    $port === false ||
    !is_string($dbName) || preg_match('/^[A-Za-z0-9_]+$/', $dbName) !== 1 ||
    !is_string($appUser) || preg_match('/^[A-Za-z0-9_]+$/', $appUser) !== 1 ||
    !is_string($appPassword) || $appPassword === '' ||
    $appUser === $rootUser
) {
    railway_bootstrap_fail('required database settings are missing or invalid.', 2);
}

$schemaPath = dirname(__DIR__) . '/shadowsix.sql';
$schema = file_get_contents($schemaPath);
if (!is_string($schema) || trim($schema) === '') {
    railway_bootstrap_fail('schema file is missing or empty.');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $db = mysqli_init();
    if (!$db instanceof mysqli) {
        throw new RuntimeException('Database client initialization failed.');
    }
    $db->options(MYSQLI_OPT_CONNECT_TIMEOUT, 8);

    if ($sslEnabled) {
        if ($caFile === '' && is_readable('/etc/ssl/certs/ca-certificates.crt')) {
            $caFile = '/etc/ssl/certs/ca-certificates.crt';
        }
        if ($caFile !== '' && !is_readable($caFile)) {
            throw new RuntimeException('Configured bootstrap TLS CA file is not readable.');
        }
        if (!defined('MYSQLI_OPT_SSL_VERIFY_SERVER_CERT')) {
            throw new RuntimeException('This PHP MySQL client cannot verify database TLS certificates.');
        }

        $db->ssl_set(null, null, $caFile !== '' ? $caFile : null, null, null);
        $db->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
        $db->real_connect($host, $rootUser, $rootPassword, $dbName, (int) $port, null, MYSQLI_CLIENT_SSL);
    } else {
        $db->real_connect($host, $rootUser, $rootPassword, $dbName, (int) $port);
    }
    $db->set_charset('utf8mb4');

    if (!$db->multi_query($schema)) {
        throw new RuntimeException('Schema initialization was rejected.');
    }

    do {
        $result = $db->store_result();
        if ($result instanceof mysqli_result) {
            $result->free();
        }

        if (!$db->more_results()) {
            break;
        }

        if (!$db->next_result()) {
            throw new RuntimeException('Schema initialization did not complete.');
        }
    } while (true);

    $escapedUser = $db->real_escape_string($appUser);
    $escapedPassword = $db->real_escape_string($appPassword);
    $db->query(
        "CREATE USER IF NOT EXISTS '{$escapedUser}'@'%' IDENTIFIED BY '{$escapedPassword}'"
    );
    $db->query(
        "ALTER USER '{$escapedUser}'@'%' IDENTIFIED BY '{$escapedPassword}'"
    );
    $db->query(
        "GRANT SELECT, INSERT, UPDATE, DELETE ON `{$dbName}`.* TO '{$escapedUser}'@'%'"
    );

    $requiredColumns = [
        'login' => ['id', 'fullname', 'email', 'password', 'role', 'created_at'],
        'materi' => [
            'id', 'nama_pelajaran', 'judul_materi', 'isi_materi',
            'gambar_materi', 'gambar_mapel', 'nama_guru', 'created_at',
        ],
        'kontak' => ['id', 'nama', 'email', 'pesan', 'created_at'],
    ];
    $tableNames = array_keys($requiredColumns);
    $placeholders = implode(', ', array_fill(0, count($tableNames), '?'));
    $query = "SELECT TABLE_NAME, COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = ? AND TABLE_NAME IN ({$placeholders})";
    $statement = $db->prepare($query);
    $types = str_repeat('s', count($tableNames) + 1);
    $values = array_merge([$dbName], $tableNames);
    $statement->bind_param($types, ...$values);
    $statement->execute();
    $result = $statement->get_result();

    $found = [];
    while ($row = $result->fetch_assoc()) {
        $found[(string) $row['TABLE_NAME']][] = (string) $row['COLUMN_NAME'];
    }
    $statement->close();

    $missing = [];
    foreach ($requiredColumns as $table => $columns) {
        foreach ($columns as $column) {
            if (!in_array($column, $found[$table] ?? [], true)) {
                $missing[] = $table . '.' . $column;
            }
        }
    }
    if ($missing !== []) {
        railway_bootstrap_fail('schema validation failed; missing required columns: ' . implode(', ', $missing));
    }

    $db->close();
    fwrite(STDOUT, "PASS: ShadowSix schema exists and the app user has least-privileged CRUD grants." . PHP_EOL);
} catch (Throwable $error) {
    error_log('ShadowSix Railway bootstrap failed: ' . get_class($error));
    railway_bootstrap_fail('database initialization or validation failed. Check host settings and deployment logs.');
}
