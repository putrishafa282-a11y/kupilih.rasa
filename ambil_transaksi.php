<?php
include 'koneksi.php';

// Ambil tanggal yang dikirim oleh JavaScript, jika tidak ada, default ke hari ini
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');

// Query untuk mengambil data transaksi pada tanggal tersebut (Urutan terbaru di atas)
$query = "SELECT waktu, produk, harga, logged_by FROM transaksi WHERE tanggal_key = '$tanggal' ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

$list_transaksi = [];
$total_omset = 0;

while ($row = mysqli_fetch_assoc($result)) {
    // Format waktu agar hanya menampilkan Jam:Menit:Detik atau sesuai kebutuhan
    $format_waktu = date('H:i:s', strtotime($row['waktu']));
    
    $list_transaksi[] = [
        'waktu' => $format_waktu,
        'produk' => $row['produk'],
        'harga' => (int)$row['harga'],
        'loggedBy' => $row['logged_by']
    ];
    
    // Hitung total omset harian
    $total_omset += $row['harga'];
}

// Kirimkan hasilnya ke JavaScript
echo json_encode([
    "transaksi" => $list_transaksi,
    "totalOmset" => $total_omset
]);
?>