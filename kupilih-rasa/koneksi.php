<?php
date_default_timezone_set("Asia/Jakarta");
$host = "sql111.infinityfree.com"; 
$user = "if0_42029754"; 
$pass = "kupilihrasa26"; 
$db   = "if0_42029754_db_kupilih"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>