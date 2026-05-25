<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika menggunakan XAMPP bawaan
$db   = "db_kupilih_rasa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>