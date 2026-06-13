<?php
// ambil_transaksi.php
include 'koneksi.php';

header('Content-Type: application/json');

// Jika parameter tanggal tidak diisi, otomatis gunakan tanggal hari ini (WIB)
$tanggal = isset($_GET['tanggal']) ? mysqli_real_escape_string($koneksi, $_GET['tanggal']) : date('Y-m-d');

$query = "SELECT id, waktu, produk, harga, logged_by FROM transaksi WHERE tanggal_key = '$tanggal' ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

$list_transaksi = [];
$total_omset = 0;

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Mengonversi waktu dari database ke format jam (H:i:s)
        $format_waktu = date('H:i:s', strtotime($row['waktu']));
        
        $list_transaksi[] = [
            'id' => $row['id'],
            'waktu' => $format_waktu,
            'produk' => $row['produk'],
            'harga' => (int)$row['harga'],
            'loggedBy' => $row['logged_by']
        ];
        
        $total_omset += $row['harga'];
    }
    
    echo json_encode([
        "transaksi" => $list_transaksi,
        "totalOmset" => $total_omset
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Gagal mengambil data: " . mysqli_error($koneksi),
        "transaksi" => [],
        "totalOmset" => 0
    ]);
}
?>