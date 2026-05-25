<?php
include 'koneksi.php';

// Menerima data yang dikirim oleh JavaScript
$produk    = $_POST['produk'];
$harga     = $_POST['harga'];
$logged_by = $_POST['logged_by'];
$tanggal   = date('Y-m-d'); // Otomatis ambil tanggal hari ini untuk tanggal_key

// Perintah SQL untuk memasukkan data
$query = "INSERT INTO transaksi (tanggal_key, produk, harga, logged_by) 
          VALUES ('$tanggal', '$produk', '$harga', '$logged_by')";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["status" => "success", "message" => "Data berhasil disimpan"]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
}
?>