<?php
// ubah_transaksi.php
include 'koneksi.php';

header('Content-Type: application/json');

if (isset($_POST['id']) && isset($_POST['produk']) && isset($_POST['harga'])) {
    $id     = mysqli_real_escape_string($koneksi, $_POST['id']);
    $produk = mysqli_real_escape_string($koneksi, $_POST['produk']);
    $harga  = (int)$_POST['harga'];

    // Query untuk memperbarui data berdasarkan ID transaksi
    $query = "UPDATE transaksi SET produk = '$produk', harga = '$harga' WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success", "message" => "Data transaksi berhasil diperbarui."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal memperbarui data: " . mysqli_error($koneksi)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Parameter tidak lengkap."]);
}
?>