<?php
declare(strict_types=1);

/*
 * Database configuration is injected by the server environment.
 * Required: DB_USER, DB_PASSWORD (may be empty for local XAMPP only), DB_NAME.
 * Optional: DB_HOST (defaults to localhost).
 */

$dbHost = getenv('DB_HOST');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbName = getenv('DB_NAME');

$dbHost = ($dbHost === false || trim($dbHost) === '') ? 'localhost' : $dbHost;

if (
    $dbUser === false || trim($dbUser) === '' ||
    $dbPassword === false ||
    $dbName === false || trim($dbName) === ''
) {
    error_log('ShadowSix: required database environment variables are missing.');
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
