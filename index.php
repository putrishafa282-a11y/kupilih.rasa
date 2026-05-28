<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kupilih Rasa | Resep Cantik Rasa Tak Terkalahkan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header>
        <nav>
            <div class="logo">Kupilih<span>.Rasa</span></div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#menu-utama">Menu</a></li>
                <li><a href="#cara-pesan">Cara Pesan</a></li>
                <li><a href="#portal" class="btn-portal" onclick="bukaModalLogin(event)">Portal Staff</a></li>
            </ul>
        </nav>
    </header>

    <div id="konten-landing">
        <section id="home" class="hero">
            <div class="hero-content">
                <h1>Camilan Kekinian, Rasa Pilihan!</h1>
                <p>Resep Cantik Rasa Tak Terlupakan.</p>
                <a href="#menu-utama" class="btn-utama">Lihat Menu</a>
            </div>
        </section>

        <div id="menu-utama">
            <section class="menu-container">
                <h2>RISOL RAINBOW</h2>
                <p>Satu risol, enam sensasi! Nikmati varian rasa lengkap mulai dari manisnya Matcha, Choco, Taro, Red Velvet dan Tiramisu.</p>
                <div class="grid-menu">
                    <div class="card">
                        <div class="badge">BEST SELLER</div>
                        <img src="images/risol-matcha.png" alt="Risol Matcha Cheese">
                        <h3>Risol Matcha Cheese</h3>
                        <p>Isian lumer dengan balutan glaze matcha yang manis dan parutan keju.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Risol Matcha Cheese', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-choco-cheese.png" alt="Risol Choco Cheese">
                        <h3>Risol Choco Cheese</h3>
                        <p>Cokelat melimpah yang lumer dengan perpaduan parutan keju di setiap gigitan.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Risol Choco Cheese', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-taro.png" alt="Risol Taro Cheese">
                        <h3>Risol Taro Cheese</h3>
                        <p>Perpaduan unik rasa Taro yang milky dengan gurihnya keju melimpah.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Risol Taro Cheese', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-red-velvet.png" alt="Risol Red Velvet Oreo">
                        <h3>Risol Red Velvet Oreo</h3>
                        <p>Perpaduan mewah glaze Red Velvet lembut dengan isian bubuk oreo yang renyah.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Risol Red Velvet Oreo', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-choco-oreo.png" alt="Risol Choco Oreo">
                        <h3>Risol Choco Oreo</h3>
                        <p>Cokelat melimpah yang lumer dengan perpaduan bubuk oreo di setiap gigitan.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Risol Choco Oreo', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-tiramisu.png" alt="Risol Tiramisu Oreo">
                        <h3>Risol Tiramisu Oreo</h3>
                        <p>Sensasi elegan aroma Tiramisu premium bertemu dengan taburan Oreo yang crunchy.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Risol Tiramisu Oreo', 3000)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>CISTIK-ACI STIK</h2>
                <p>Camilan krispi dengan isian ayam suwir gurih yang melimpah!</p>
                <div class="grid-menu">
                    <div class="card">
                        <img src="images/cistik-ayam-suwir.png" alt="CISTIK Ayam Suwir">
                        <h3>CISTIK Ayam Suwir</h3>
                        <p>Isian ayam suwir premium yang gurih dan lembut di setiap gigitan.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('CISTIK Ayam Suwir', 3000)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>POTATO CURLY</h2>
                <p>Kentang goreng potong spiral yang super krispi di luar dan lembut di dalam. Dibumbui dengan perpaduan varian bumbu pilihan, lalu disiram Saos Pedas plus Mayonais yang creamy.</p>
                <div class="grid-menu" style="justify-content: center;">
                    <div class="card" style="max-width: 320px; margin: 0 auto;">
                        <img src="images/potato-curly.png" alt="Potato Curly">
                        <h3>Potato Curly</h3>
                        <p>Sensasi rasa manis, pedas, gurih, dan creamy yang bikin nagih dalam sekali gigit!</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="bukaModalVarian('Potato Curly', 5000)">Pilih Varian</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>PENTOL KRISPI</h2>
                <p>Jajanan legendaris yang naik level! Pentol daging pilihan dengan tekstur kenyal di dalam, dibalut tepung panir super renyah di luar. Sensasi garingnya kriuk banget di setiap gigitan!</p>
                <div class="grid-menu" style="justify-content: center;">
                    <div class="card" style="max-width: 320px; margin: 0 auto;">
                        <img src="images/pentol-krispi.png" alt="Pentol Krispi">
                        <h3>Pentol Krispi</h3>
                        <p>Nikmati renyahnya pentol krispi dengan taburan bumbu favorit pilihanmu.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="bukaModalVarian('Pentol Krispi', 5000)">Pilih Varian</button>
                    </div>
                </div>
            </section>

            <div id="modal-varian" class="modal-varian-wrapper" style="display: none;">
                <div class="modal-varian-content">
                    <span class="close-varian" onclick="tutupModalVarian()">&times;</span>
                    <h3 id="varian-title-produk">Pilih Varian</h3>
                    <p class="varian-subtitle">Silahkan pilih 1 varian rasa / bumbu:</p>
        
                    <div class="opsi-varian-list">
                        <button class="btn-opsi-varian" onclick="pilihVarianSelesai('Bumbu Tabur Balado')">Bumbu Tabur Balado</button>
                        <button class="btn-opsi-varian" onclick="pilihVarianSelesai('Bumbu Tabur Jagung Manis')">Bumbu Tabur Jagung Manis</button>
                        <button class="btn-opsi-varian" onclick="pilihVarianSelesai('Saos Pedas')">Saos Pedas</button>
                        <button class="btn-opsi-varian" onclick="pilihVarianSelesai('Mayonais')">Mayonais</button>
                    </div>
                </div>
            </div>
            
            <section class="menu-container">
                <h2>PENTOL KABUL</h2>
                <p>Nikmati paket lengkap kebahagiaan! Perpaduan Pentol Kabul yang kenyal, Tahu Aci gurih, serta Siomay dan Siomay Gubis yang lezat dalam satu sajian mewah harga ramah.</p>
                <div class="grid-menu">
                    <div class="card">
                        <img src="images/siomay-gubis.png" alt="Siomay Gubis">
                        <h3>Siomay Gubis</h3>
                        <p>Sensasi kenyal adonan dalam balutan kubis segar.</p>
                        <span class="harga">Rp 500</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Siomay Gubis', 500)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/pentol-kabul.png" alt="Pentol Kabul">
                        <h3>Pentol Kabul</h3>
                        <p>Cari jajanan murah tapi rasa mewah? Pentol Kabul solusinya!</p>
                        <span class="harga">Rp 500</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Pentol Kabul', 500)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/tahu-aci.png" alt="Tahu Aci">
                        <h3>Tahu Aci</h3>
                        <p>Cocok untuk stok camilan. Dicocol sambal makin mantap!</p>
                        <span class="harga">Rp 500</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Tahu Aci', 500)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/siomay.png" alt="Siomay">
                        <h3>Siomay</h3>
                        <p>Lebih lengkap, lebih mantap dengan Siomay!</p>
                        <span class="harga">Rp 500</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Siomay', 500)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>NESCAFE</h2>
                <p>Segarkan harimu dengan koleksi minuman premium! Mulai dari Nescafe Klepon yang unik, Caffe Latte yang creamy, hingga kesegaran Nestea Lemon Tea dan Milo yang legendaris.</p>
                <div class="grid-menu">
                    <div class="card">
                        <img src="images/kopi-klepon.png" alt="Nescafe Klepon">
                        <h3>Nescafe Klepon</h3>
                        <p>Paduan kopi creamy, wangi pandan, dan manisnya gula aren yang legit.</p>
                        <span class="harga">Rp 10.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nescafe Klepon', 10000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/dalgona.png" alt="Nescafe Dalgona">
                        <h3>Nescafe Dalgona</h3>
                        <p>Nikmati perpaduan sempurna kopi hitam pilihan dengan tekstur creamy foam.</p>
                        <span class="harga">Rp 10.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nescafe Dalgona', 10000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/neslo.png" alt="NESLO Nescafe x Milo">
                        <h3>NESLO Nescafe x Milo</h3>
                        <p>Perpaduan sempurna antara tendangan kopi Nescafe dan kelezatan Milo.</p>
                        <span class="harga">Rp 10.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('NESLO', 10000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/nestle-lemon-tea.png" alt="Nestea Lemon Tea">
                        <h3>Nestea Lemon Tea</h3>
                        <p>Perpaduan teh pilihan dengan ekstrak lemon asli.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nestea Lemon Tea', 5000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/nestle-lemonade.png" alt="Nestle Lemonade">
                        <h3>Nestle Lemonade</h3>
                        <p>Ledakan rasa lemon yang fresh dan bikin mata langsung melek!</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nestle Lemonade', 5000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/nestle-blackcurrant.png" alt="Nestle Blackcurrant">
                        <h3>Nestle Blackcurrant</h3>
                        <p>Kombinasi rasa manis-asam yang pas dari buah beri.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nestle Blackcurrant', 5000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/nestle-milo.png" alt="Nestle Milo">
                        <h3>Nestle Milo</h3>
                        <p>Nikmati segelas Nestlé Milo dengan rasa cokelat yang khas.</p>
                        <span class="harga">Rp 10.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nestle Milo', 10000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/coffee-latte.png" alt="Nescafe Caffe Latte">
                        <h3>Nescafe Caffe Latte</h3>
                        <h4>Normal</h4>
                        <span class="harga">Rp 9.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nescafe Caffe Latte Normal', 9000)">Pesan Sekarang</button>
                        <h4 style="margin-top:10px;">Strong</h4>
                        <span class="harga">Rp 11.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nescafe Caffe Latte Strong', 11000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/ice-roast.png" alt="Nescafe Ice Roast">
                        <h3>Nescafe Ice Roast</h3>
                        <h4>1 Shoot</h4>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nescafe Ice Roast 1 Shoot', 5000)">Pesan Sekarang</button>
                        <h4 style="margin-top:10px;">2 Shoot</h4>
                        <span class="harga">Rp 7.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nescafe Ice Roast 2 Shoot', 7000)">Pesan Sekarang</button>
                        <h4 style="margin-top:10px;">3 Shoot</h4>
                        <span class="harga">Rp 9.000</span>
                        <button class="btn-pesan" onclick="masukKeranjang('Nescafe Ice Roast 3 Shoot', 9000)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>
        </div>

        <section id="cara-pesan" class="cara-pesan">
            <h2>Bagaimana Cara Pesan?</h2>
            <div class="langkah-container">
                <div class="langkah">
                    <i class="fas fa-search"></i>
                    <h4>1. Pilih Menu</h4>
                    <p>Pilih menu favoritmu dari katalog kami.</p>
                </div>
                <div class="langkah">
                    <i class="fab fa-whatsapp"></i>
                    <h4>2. Klik Pesan</h4>
                    <p>Tombol akan mengarahkanmu langsung ke WhatsApp kami.</p>
                </div>
                <div class="langkah">
                    <i class="fas fa-truck"></i>
                    <h4>3. Kirim / Ambil</h4>
                    <p>Pesanan siap diantar atau diambil di outlet terdekat.</p>
                </div>
            </div>
        </section>
    </div>

    <div id="modal-login" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="tutupModalLogin()">&times;</span>
            <h3>Login Akses Internal</h3>
            <form id="form-login" onsubmit="prosesLogin(event)">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" id="username" required placeholder="Masukkan username">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" id="password" required placeholder="Masukkan password">
                </div>
                <button type="submit" class="btn-submit-login">Masuk Dashboard</button>
            </form>
        </div>
    </div>

    <section id="dashboard-section" class="dashboard-container" style="display: none;">
        <div class="dashboard-header">
            <h2>Dashboard Operasional (<span id="user-role">Role</span>)</h2>
            <button class="btn-logout" onclick="logoutDashboard()">Keluar</button>
        </div>

        <div id="fitur-owner-eksklusif" class="owner-cards" style="display: none;">
            <div class="card-omset">
                <h4>Total Omset Pendapatan (Hari Ini)</h4>
                <p id="total-omset-hari-ini">Rp 0</p>
            </div>
        </div>

        <div class="form-input-manual-box">
            <h3>Input Penjualan Manual (Transaksi Stand / Offline)</h3>
            <form id="form-penjualan-manual" onsubmit="simpanTransaksiManual(event)">
                <div class="manual-input-row">
                    <div class="input-group-manual">
                        <label>Nama Produk / Rincian</label>
                        <input type="text" id="manual-nama-produk" required placeholder="Contoh: 2 Risol Matcha + 1 Milo">
                    </div>
                    <div class="input-group-manual">
                        <label>Total Pembayaran (Rp)</label>
                        <input type="number" id="manual-harga-produk" required placeholder="Contoh: 16000">
                    </div>
                    <div class="input-group-manual btn-area">
                        <button type="submit" class="btn-simpan-manual"><i class="fas fa-plus"></i> Catat Log</button>
                    </div>
                </div>
            </form>
        </div>

    <div class="laporan-box">
            <h3>Daftar Log Transaksi</h3>
            
            <div style="margin-bottom: 20px; text-align: left;">
                <label for="filter-tanggal" style="font-weight: 600; margin-right: 10px;">Pilih Tanggal: </label>
                <input type="date" id="filter-tanggal" style="padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div class="table-responsive">
                <table id="tabel-penjualan">
                    <thead>
                        <tr>
                            <th>Waktu / Tanggal</th> 
                            <th>Nama Produk</th>
                            <th>Harga Total</th>
                            <th>Petugas / Sumber</th>
                        </tr>
                    </thead>
                    <tbody id="data-penjualan-hari-ini">
                    </tbody>
                </table>
            </div>
        </div> </section>

    <div id="area-keranjang" class="keranjang-container" style="display: none;">
    <div class="keranjang-header">
        <h3><i class="fas fa-shopping-cart"></i> Keranjang Belanja (<span id="jumlah-item-keranjang">0</span>)</h3>
        <span class="tutup-keranjang" onclick="toggleKeranjang()">&times;</span>
    </div>
    <div id="list-item-keranjang" class="list-item-keranjang">
        </div>
    <div class="keranjang-footer">
        <div class="total-bayar-keranjang">
            <span>Total:</span>
            <span id="total-harga-keranjang">Rp 0</span>
        </div>
        <button class="btn-checkout-wa" onclick="kirimKeranjangKeWA()">
            <i class="fab fa-whatsapp"></i> Kirim Pesanan via WhatsApp
        </button>
    </div>
</div>

<div id="btn-keranjang-floating" class="keranjang-float" onclick="toggleKeranjang()" style="display: none;">
    <i class="fas fa-shopping-basket"></i>
    <span id="badge-keranjang-count" class="badge-count">0</span>
</div>

    <footer>
        <p>&copy 2026 Kupilih Rasa. Dibuat dengan ❤️</p>
    </footer>
    
    <a href="https://wa.me/62895327556000" class="wa-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="script.js"></script>
</body>
</html>