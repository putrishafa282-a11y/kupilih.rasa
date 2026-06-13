<?php
// hapus_transaksi.php
include 'koneksi.php';

header('Content-Type: application/json');

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $query = "DELETE FROM transaksi WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success", "message" => "Log transaksi berhasil dihapus"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menghapus: " . mysqli_error($koneksi)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "ID tidak ditemukan"]);
}
?>