<?php
declare(strict_types=1);

/**
 * Load DB settings from private config.local.php (shared hosting) or the
 * process environment (Docker/CI). Never print configuration values.
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
    foreach (['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME', 'DB_PORT', 'DB_SSL', 'DB_SSL_CA'] as $key) {
        if (array_key_exists($key, $local) && is_scalar($local[$key])) {
            $config[$key] = (string) $local[$key];
            continue;
        }

        $value = getenv($key);
        $config[$key] = $value === false ? null : $value;
    }

    if (!is_string($config['DB_HOST']) || trim($config['DB_HOST']) === '') {
        $config['DB_HOST'] = 'localhost';
    }
    if (!is_string($config['DB_PORT']) || trim($config['DB_PORT']) === '') {
        $config['DB_PORT'] = '3306';
    }
    if (!is_string($config['DB_SSL']) || trim($config['DB_SSL']) === '') {
        $config['DB_SSL'] = '0';
    }
    if (!is_string($config['DB_SSL_CA'])) {
        $config['DB_SSL_CA'] = '';
    }

    return $config;
}

/**
 * Open a MySQL-compatible connection with bounded connect time and optional
 * verified TLS. Set DB_SSL=1 for managed remote services such as TiDB Cloud.
 */
function shadowsix_open_database(array $config): mysqli
{
    $host = $config['DB_HOST'] ?? null;
    $user = $config['DB_USER'] ?? null;
    $password = $config['DB_PASSWORD'] ?? null;
    $name = $config['DB_NAME'] ?? null;
    $portValue = $config['DB_PORT'] ?? '3306';

    if (
        !is_string($host) || trim($host) === '' ||
        !is_string($user) || trim($user) === '' ||
        !is_string($password) ||
        !is_string($name) || trim($name) === ''
    ) {
        throw new RuntimeException('Required database configuration is missing.');
    }

    $port = filter_var($portValue, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 65535]]);
    if ($port === false) {
        throw new RuntimeException('Database port configuration is invalid.');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connection = mysqli_init();
    if (!$connection instanceof mysqli) {
        throw new RuntimeException('Database client initialization failed.');
    }
    $connection->options(MYSQLI_OPT_CONNECT_TIMEOUT, 8);

    $sslValue = strtolower(trim((string) ($config['DB_SSL'] ?? '0')));
    $sslEnabled = in_array($sslValue, ['1', 'true', 'yes', 'on'], true);

    if ($sslEnabled) {
        $caFile = trim((string) ($config['DB_SSL_CA'] ?? ''));
        if ($caFile === '' && is_readable('/etc/ssl/certs/ca-certificates.crt')) {
            $caFile = '/etc/ssl/certs/ca-certificates.crt';
        }
        if ($caFile !== '' && !is_readable($caFile)) {
            throw new RuntimeException('Configured database TLS CA file is not readable.');
        }
        if (!defined('MYSQLI_OPT_SSL_VERIFY_SERVER_CERT')) {
            throw new RuntimeException('This PHP MySQL client cannot verify database TLS certificates.');
        }

        $connection->ssl_set(null, null, $caFile !== '' ? $caFile : null, null, null);
        $connection->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
        $connection->real_connect($host, $user, $password, $name, (int) $port, null, MYSQLI_CLIENT_SSL);
    } else {
        $connection->real_connect($host, $user, $password, $name, (int) $port);
    }

    $connection->set_charset('utf8mb4');
    return $connection;
}
