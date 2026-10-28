<?php
declare(strict_types=1);

require_once __DIR__ . '/config_loader.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

function shadowsix_health_unavailable(): never
{
    http_response_code(503);
    echo json_encode(['status' => 'unavailable'], JSON_UNESCAPED_SLASHES);
    exit;
}

try {
    $connection = shadowsix_open_database(shadowsix_database_config());
    $connection->query('SELECT 1');
    $connection->close();

    http_response_code(200);
    echo json_encode(['status' => 'ok'], JSON_UNESCAPED_SLASHES);
} catch (Throwable $exception) {
    // Never return a hostname, table name, SQL message or credential to callers.
    error_log('ShadowSix health check failed: ' . get_class($exception));
    shadowsix_health_unavailable();
}
