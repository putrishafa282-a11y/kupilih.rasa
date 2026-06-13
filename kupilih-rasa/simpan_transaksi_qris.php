<?php
// simpan_transaksi_qris.php
include 'koneksi.php';

header('Content-Type: application/json');

if (isset($_POST['produk']) && isset($_POST['harga']) && isset($_POST['logged_by']) && isset($_FILES['bukti_foto'])) {
    
    $produk    = mysqli_real_escape_string($koneksi, $_POST['produk']);
    $harga     = (int)$_POST['harga'];
    $logged_by = mysqli_real_escape_string($koneksi, $_POST['logged_by']);
    
    $tanggal   = date('Y-m-d'); 
    $waktu     = date('Y-m-d H:i:s');

    // --- PROSES HANDLE UPLOAD FILE GAMBAR BUKTI ---
    $file_name = $_FILES['bukti_foto']['name'];
    $file_tmp  = $_FILES['bukti_foto']['tmp_name'];
    
    // Ambil ekstensi file gambar (.jpg, .png, dll)
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Buat nama file baru yang unik berdasarkan timestamp agar tidak saling menindih
    $nama_file_baru = "BUKTI_" . time() . "_" . rand(1000, 9999) . "." . $ext;
    
    // Tentukan folder tujuan penyimpanan file di hosting/server Anda
    $target_dir = "uploads/";
    
    // Buat folder 'uploads' otomatis jika belum tersedia di server
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    
    $target_file = $target_dir . $nama_file_baru;

    if (move_uploaded_file($file_tmp, $target_file)) {
        // Jika file berhasil dipindah ke server, masukkan catatan nama file bukti ke dalam nama produk
        $produk_dengan_bukti = $produk . " [Bukti: " . $nama_file_baru . "]";

        // Simpan data ke dalam satu tabel tunggal transaksi bawaan Anda
        $query = "INSERT INTO transaksi (tanggal_key, waktu, produk, harga, logged_by) 
                  VALUES ('$tanggal', '$waktu', '$produk_dengan_bukti', '$harga', '$logged_by')";

        if (mysqli_query($koneksi, $query)) {
            echo json_encode([
                "status" => "success", 
                "message" => "Transaksi QRIS dan file bukti berhasil disimpan.",
                "filename" => $nama_file_baru
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal menyimpan ke database: " . mysqli_error($koneksi)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal mengunggah file gambar bukti pembayaran ke server hosting."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Parameter upload tidak lengkap."]);
}
?>