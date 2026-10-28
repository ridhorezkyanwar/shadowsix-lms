<?php
declare(strict_types=1);

require_once __DIR__ . '/config_loader.php';

/*
 * Shared DB connection used across the application.
 * Private settings come from config.local.php on shared hosting or DB_*
 * environment variables on Docker/CI. Credentials never belong in Git.
 */
$dbConfig = shadowsix_database_config();
$dbHost = $dbConfig['DB_HOST'];
$dbUser = $dbConfig['DB_USER'];
$dbPassword = $dbConfig['DB_PASSWORD'];
$dbName = $dbConfig['DB_NAME'];

if (
    !is_string($dbUser) || trim($dbUser) === '' ||
    !is_string($dbPassword) ||
    !is_string($dbName) || trim($dbName) === ''
) {
    error_log('ShadowSix: required database configuration is missing.');
    http_response_code(503);
    exit('Layanan basis data belum dikonfigurasi. Silakan hubungi administrator.');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    error_log('ShadowSix database connection failed: ' . $e->getMessage());
    http_response_code(503);
    exit('Layanan basis data sedang tidak tersedia. Silakan coba lagi nanti.');
}
