<?php
session_start();
require_once __DIR__ . '/security.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Metode permintaan tidak diizinkan.');
}

if (
    !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ||
    !shadowsix_verify_csrf_token($_POST['csrf_token'] ?? null)
) {
    http_response_code(400);
    exit('Permintaan logout tidak valid. Muat ulang halaman lalu coba lagi.');
}

$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

session_destroy();
header('Location: index.php');
exit();
