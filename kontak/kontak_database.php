<?php
$servername = "localhost";      
$username_db = "root";          
$password_db = "";              
$dbname = "shadowsix";     

$conn_kontak = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn_kontak->connect_error) {
    die("Koneksi ke database kontak gagal: " . $conn_kontak->connect_error);
}
?>
