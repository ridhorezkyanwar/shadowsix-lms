<?php
declare(strict_types=1);

require_once __DIR__ . '/config_loader.php';

$dbConfig = shadowsix_database_config();

try {
    $conn = shadowsix_open_database($dbConfig);
} catch (Throwable $error) {
    error_log('ShadowSix database connection failed: ' . get_class($error));
    http_response_code(503);
    exit('Layanan basis data sedang tidak tersedia. Silakan coba lagi nanti.');
}
