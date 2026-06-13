<?php
include 'koneksi.php';

if (isset($_POST['produk']) && isset($_POST['harga']) && isset($_POST['logged_by'])) {
    $produk    = mysqli_real_escape_string($koneksi, $_POST['produk']);
    $harga     = (int)$_POST['harga'];
    $logged_by = mysqli_real_escape_string($koneksi, $_POST['logged_by']);
    
    $tanggal   = date('Y-m-d'); 
    $waktu     = date('Y-m-d H:i:s'); 

    $query = "INSERT INTO transaksi (tanggal_key, waktu, produk, harga, logged_by) 
              VALUES ('$tanggal', '$waktu', '$produk', '$harga', '$logged_by')";

    if (mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success", "message" => "Data berhasil disimpan"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Parameter tidak lengkap"]);
}
?>