<?php
declare(strict_types=1);

/**
 * Minimal database-aware health endpoint for load balancers and container checks.
 * It never returns connection details, SQL errors, or credentials.
 */
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

function shadowsix_health_unavailable(): never
{
    http_response_code(503);
    echo json_encode(['status' => 'unavailable'], JSON_UNESCAPED_SLASHES);
    exit;
}

$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbName = getenv('DB_NAME');
$dbHost = getenv('DB_HOST');
$dbHost = is_string($dbHost) && trim($dbHost) !== '' ? trim($dbHost) : 'localhost';

if (
    !is_string($dbUser) || trim($dbUser) === '' ||
    !is_string($dbPassword) ||
    !is_string($dbName) || trim($dbName) === '' ||
    !class_exists(mysqli::class)
) {
    error_log('ShadowSix health check unavailable: database configuration or mysqli extension is missing.');
    shadowsix_health_unavailable();
}

try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    $connection->set_charset('utf8mb4');
    $connection->query('SELECT 1');

    $table1 = 'login';
    $table2 = 'materi';
    $table3 = 'kontak';
    $statement = $connection->prepare(
        'SELECT COUNT(DISTINCT TABLE_NAME) AS table_count
         FROM INFORMATION_SCHEMA.TABLES
         WHERE TABLE_SCHEMA = ? AND TABLE_NAME IN (?, ?, ?)'
    );
    $statement->bind_param('ssss', $dbName, $table1, $table2, $table3);
    $statement->execute();
    $row = $statement->get_result()->fetch_assoc();
    $statement->close();
    $connection->close();

    if ((int) ($row['table_count'] ?? 0) !== 3) {
        error_log('ShadowSix health check failed: required application schema is incomplete.');
        shadowsix_health_unavailable();
    }

    http_response_code(200);
    echo json_encode(['status' => 'ok'], JSON_UNESCAPED_SLASHES);
} catch (Throwable $exception) {
    error_log('ShadowSix health check failed: ' . get_class($exception));
    shadowsix_health_unavailable();
}
