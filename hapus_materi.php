<?php
session_start();
include 'databasecpnel.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM materi WHERE id = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            header("Location: dashboard_admin.php?pesan=hapus_berhasil");
        } else {
            header("Location: dashboard_admin.php?pesan=hapus_gagal");
        }
        $stmt->close();
    }
} else {
    header("Location: dashboard_admin.php");
}
exit();