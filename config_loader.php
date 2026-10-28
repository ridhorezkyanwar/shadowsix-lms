<?php
declare(strict_types=1);

/**
 * Load DB settings from a private config.local.php file (shared hosting) or
 * the process environment (Docker/CI). Never print configuration values.
 *
 * config.local.php must return an array using DB_HOST, DB_USER, DB_PASSWORD,
 * and DB_NAME keys. It is ignored by Git and blocked by the root .htaccess.
 */
function shadowsix_database_config(): array
{
    $local = [];
    $localPath = __DIR__ . DIRECTORY_SEPARATOR . 'config.local.php';

    if (is_file($localPath) && is_readable($localPath)) {
        try {
            $candidate = require $localPath;
            if (is_array($candidate)) {
                $local = $candidate;
            } else {
                error_log('ShadowSix: config.local.php must return an array.');
            }
        } catch (Throwable $error) {
            error_log('ShadowSix: private database configuration could not be loaded.');
        }
    }

    $config = [];
    foreach (['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME'] as $key) {
        if (array_key_exists($key, $local) && is_string($local[$key])) {
            $config[$key] = $local[$key];
            continue;
        }

        $value = getenv($key);
        $config[$key] = $value === false ? null : $value;
    }

    if (!is_string($config['DB_HOST']) || trim($config['DB_HOST']) === '') {
        $config['DB_HOST'] = 'localhost';
    }

    return $config;
}
