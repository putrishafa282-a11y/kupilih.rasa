<?php
$host = "sql111.infinityfree.com"; // Sesuaikan jika berbeda di tabel MySQL Databases kamu
$user = "if0_42029754"; 
$pass = "kupilihrasa26"; // Password akun hosting InfinityFree milikmu
$db   = "if0_42029754_db_kupilih"; // Masukkan nama lengkap databasemu yang ada di panel kiri tadi

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>