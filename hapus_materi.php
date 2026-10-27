<?php
session_start();
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/databasecpnel.php';

shadowsix_require_admin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Metode permintaan tidak diizinkan.');
}

if (!shadowsix_verify_csrf_token($_POST['csrf_token'] ?? null)) {
    http_response_code(400);
    exit('Sesi formulir tidak valid. Muat ulang dashboard lalu coba lagi.');
}

$idValue = $_POST['id'] ?? '';
$id = is_scalar($idValue) && ctype_digit((string) $idValue) ? (int) $idValue : 0;

if ($id <= 0) {
    header('Location: dashboard_admin.php?pesan=hapus_gagal');
    exit();
}

$stmt = null;
try {
    $stmt = $conn->prepare('DELETE FROM materi WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $deleted = $stmt->affected_rows > 0;
    header('Location: dashboard_admin.php?pesan=' . ($deleted ? 'hapus_berhasil' : 'hapus_gagal'));
} catch (Throwable $e) {
    error_log('ShadowSix: failed to delete material: ' . $e->getMessage());
    header('Location: dashboard_admin.php?pesan=hapus_gagal');
} finally {
    if ($stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
}
exit();
