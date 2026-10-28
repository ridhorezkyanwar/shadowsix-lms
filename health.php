<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

function shadowsix_health_unavailable(): never
{
    http_response_code(503);
    echo json_encode(['status' => 'unavailable'], JSON_UNESCAPED_SLASHES);
    exit;
}

require_once __DIR__ . '/config_loader.php';

try {
    $config = shadowsix_database_config();
    $connection = shadowsix_open_database($config);
    $connection->query('SELECT 1');
    $connection->close();

    http_response_code(200);
    echo json_encode(['status' => 'ok'], JSON_UNESCAPED_SLASHES);
} catch (Throwable $exception) {
    // Log only the exception type, never credentials, hostnames or raw query errors.
    error_log('ShadowSix health check failed: ' . get_class($exception));
    shadowsix_health_unavailable();
}
