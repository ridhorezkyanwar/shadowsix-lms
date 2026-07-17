<?php
$servername   = "localhost"; 
$username_db  = "ridho10_userdb"; 
$password_db  = "admintelecom#";
$dbname       = "ridho10_shadowsix"; 


try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
} catch (mysqli_sql_exception $e) {
    error_log($e->getMessage());
    die("Maaf, terjadi masalah koneksi ke database. Harap cek kredensial di cPanel.");
}
?>
