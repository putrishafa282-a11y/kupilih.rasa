<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kupilih Rasa | Resep Cantik Rasa Tak Terkalahkan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <header>
        <nav>
            <div class="logo">Kupilih<span>.Rasa</span></div>
        
            <div class="nav-actions-hp">
            <!-- Ikon Keranjang Belanja: Langsung Muncul di Navbar HP -->
                <a href="#" class="btn-keranjang-nav" onclick="bukaPopupKeranjang(event)">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span id="badge-keranjang-count" class="badge-count">0</span>
                </a>

                <button class="menu-toggle" onclick="toggleMenu()">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
            </div>

        <!-- Daftar Menu Gantung (Hanya isi Home, Menu, Cara Pesan, Portal Staff) -->
            <ul id="nav-menu">
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
                <div class="grid-menu grid-risol">
                    <div class="card">
                        <div class="badge">BEST SELLER</div>
                        <img src="images/risol-matcha.png" alt="Risol Matcha Cheese">
                        <h3>Risol Matcha Cheese</h3>
                        <p>Isian lumer dengan balutan glaze matcha yang manis dan parutan keju.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Risol Matcha Cheese', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-choco-cheese.png" alt="Risol Choco Cheese">
                        <h3>Risol Choco Cheese</h3>
                        <p>Cokelat melimpah yang lumer dengan perpaduan parutan keju di setiap gigitan.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Risol Choco Cheese', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-taro.png" alt="Risol Taro Cheese">
                        <h3>Risol Taro Cheese</h3>
                        <p>Perpaduan unik rasa Taro yang milky dengan gurihnya keju melimpah.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Risol Taro Cheese', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-red-velvet.png" alt="Risol Red Velvet Oreo">
                        <h3>Risol Red Velvet Oreo</h3>
                        <p>Perpaduan mewah glaze Red Velvet lembut dengan isian bubuk oreo yang renyah.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Risol Red Velvet Oreo', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-choco-oreo.png" alt="Risol Choco Oreo">
                        <h3>Risol Choco Oreo</h3>
                        <p>Cokelat melimpah yang lumer dengan perpaduan bubuk oreo di setiap gigitan.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Risol Choco Oreo', 3000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/risol-tiramisu.png" alt="Risol Tiramisu Oreo">
                        <h3>Risol Tiramisu Oreo</h3>
                        <p>Sensasi elegan aroma Tiramisu premium bertemu dengan taburan Oreo yang crunchy.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Risol Tiramisu Oreo', 3000)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>CISTIK-ACI STIK</h2>
                <p>Camilan krispi dengan isian ayam suwir gurih yang melimpah!</p>
                <div class="grid-menu" style="justify-content: center;">
                    <div class="card" style="max-width: 320px; margin: 0 auto;">
                        <img src="images/cistik-ayam-suwir.png" alt="CISTIK Ayam Suwir">
                        <h3>CISTIK Ayam Suwir</h3>
                        <p>Isian ayam suwir premium yang gurih dan lembut di setiap gigitan.</p>
                        <span class="harga">Rp 3.000</span>
                        <button class="btn-pesan" onclick="bukaModalVarian('CISTIK Ayam Suwir', 3000)">Pilih Varian</button>
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
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Siomay Gubis', 500)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/pentol-kabul.png" alt="Pentol Kabul">
                        <h3>Pentol Kabul</h3>
                        <p>Cari jajanan murah tapi rasa mewah? Pentol Kabul solusinya!</p>
                        <span class="harga">Rp 500</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Pentol Kabul', 500)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/tahu-aci.png" alt="Tahu Aci">
                        <h3>Tahu Aci</h3>
                        <p>Cocok untuk stok camilan. Dicocol sambal makin mantap!</p>
                        <span class="harga">Rp 500</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Tahu Aci', 500)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/siomay.png" alt="Siomay">
                        <h3>Siomay</h3>
                        <p>Lebih lengkap, lebih mantap dengan Siomay!</p>
                        <span class="harga">Rp 500</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Siomay', 500)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>TRIO KENYAL</h2>
                <p>"Ngemil rame-rame jadi lebih seru! Paket keroyokan ini menyatukan kelezatan Cirawang, Cirawit, dan Tahu Cirawit dalam satu wadah.</p>
                <div class="grid-menu" style="justify-content: center;">
                    <div class="card" style="max-width: 320px; margin: 0 auto;">
                        <img src="images/cirawang.png" alt="cirawang">
                        <h3>Cirawang</h3>
                        <p>Bola-bola aci kenyal bertabur daun bawang segar yang gurihnya pas. Tekstur chewy dan aroma bawangnya dijamin bikin kamu gak bisa berhenti ngunyah! Murah meriah, rasa mewah.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Cirawang', 5000)">Pesan Sekarang</button>
                    </div>
                    <div class="card" style="max-width: 320px; margin: 0 auto;">
                        <img src="images/tahu-cirawit.png" alt="tahu-cirawit">
                        <h3>Tahu Cirawit</h3>
                        <p>Tahu pong renyah dengan isian aci lembut yang super chewy, dibalut ulekan cabai rawit melimpah yang pedasnya langsung nembus ke lidah. Camilan juara buat kamu pencinta tantangan pedas!</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Tahu Cirawit', 5000)">Pesan Sekarang</button>
                    </div>
                    <div class="card" style="max-width: 320px; margin: 0 auto;">
                        <img src="images/cirawit.png" alt="cirawit">
                        <h3>Cirawit</h3>
                        <p>Bakso aci bulat pilihan dengan tekstur kenyal maksimal, dibalut ulekan sambal rawit melimpah yang gurih, pedas, dan meresap sempurna.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Cirawit', 5000)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>ICE MATCHA</h2>
                <div class="grid-menu">
                    <div class="card">
                        <img src="images/matcha-regular.png" alt="Ice Matcha Regular" class="img-matcha-coklat">
                        <h3>Ice Matcha Regular</h3>
                        <p>Matcha manis yang segar dan ringan.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Matcha Regular', 5000)">Pesan Sekarang</button>
                    </div>
                    <div class="card">
                        <img src="images/matcha-premium.png" alt="Ice Matcha Premium" class="img-matcha-coklat">
                        <h3>Ice Matcha Premium</h3>
                        <p>Matcha manis yang ekstra creamy.</p>
                        <span class="harga">Rp 7.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Matcha Premium', 7000)">Pesan Sekarang</button>
                    </div>
                </div>
            </section>

            <section class="menu-container">
                <h2>ICE CHOCOLATE</h2>
                <div class="grid-menu">
                    <div class="card">
                        <img src="images/choco-normal.png" alt="Choco Normal" class="img-matcha-coklat">
                        <h3>Choco Normal</h3>
                        <p>Nikmati kemewahan rasa cokelat premium yang pekat, dingin, dan bertekstur. Pure chocolate bliss!</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Choco Normal', 5000)">Pesan Sekarang</button>
                    </div> 
                        <div class="card">
                        <img src="images/choco-oreo.png" alt="Choco Oreo" class="img-matcha-coklat">
                        <h3>Choco Oreo</h3>    
                        <p>Nikmati sensasi ledakan cokelat dengan sentuhan renyah Oreo di setiap tegukan.</p>
                        <span class="harga">Rp 7.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Choco Oreo', 7000)">Pesan Sekarang</button>
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
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nescafe Klepon', 10000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/dalgona.png" alt="Nescafe Dalgona">
                        <h3>Nescafe Dalgona</h3>
                        <p>Nikmati perpaduan sempurna kopi hitam pilihan dengan tekstur creamy foam.</p>
                        <span class="harga">Rp 10.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nescafe Dalgona', 10000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/neslo.png" alt="NESLO Nescafe x Milo">
                        <h3>NESLO Nescafe x Milo</h3>
                        <p>Perpaduan sempurna antara tendangan kopi Nescafe dan kelezatan Milo.</p>
                        <span class="harga">Rp 10.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('NESLO', 10000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/nestle-lemon-tea.png" alt="Nestea Lemon Tea">
                        <h3>Nestea Lemon Tea</h3>
                        <p>Perpaduan teh pilihan dengan ekstrak lemon asli.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nestea Lemon Tea', 5000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/nestle-lemonade.png" alt="Nestle Lemonade">
                        <h3>Nestle Lemonade</h3>
                        <p>Ledakan rasa lemon yang fresh dan bikin mata langsung melek!</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nestle Lemonade', 5000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/nestle-blackcurrant.png" alt="Nestle Blackcurrant">
                        <h3>Nestle Blackcurrant</h3>
                        <p>Kombinasi rasa manis-asam yang pas dari buah beri.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nestle Blackcurrant', 5000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/nestle-milo.png" alt="Nestle Milo">
                        <h3>Nestle Milo</h3>
                        <p>Nikmati segelas Nestlé Milo dengan rasa cokelat yang khas.</p>
                        <span class="harga">Rp 10.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nestle Milo', 10000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/coffee-latte.png" alt="Nescafe Caffe Latte">
                        <h3>Nescafe Coffee Latte</h3>
                        <h4>Normal</h4>
                        <p>Lebih smooth, creamy, dan manisnya pas. Cocok buat santai.</p>
                        <span class="harga">Rp 9.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nescafe Caffe Latte Normal', 9000)">Pesan Sekarang</button>
                        <h4 style="margin-top:10px;">Strong</h4>
                        <p>Kopinya lebih pekat, mantap, dan bold. Pas buat usir ngantuk & fokus ekstra.</p>
                        <span class="harga">Rp 11.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nescafe Caffe Latte Strong', 11000)">Pesan Sekarang</button>
                    </div>

                    <div class="card">
                        <img src="images/ice-roast.png" alt="Nescafe Ice Roast">
                        <h3>Nescafe Ice Roast</h3>
                        <p>Kopi segar yang langsung larut di air dingin. Pilih tingkat kekuatan kopimu:</p>
                        <h4>1 Shoot</h4>
                        <p>Ringan, smooth, dan ramah di lidah. Cocok buat santai.</p>
                        <span class="harga">Rp 5.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nescafe Ice Roast 1 Shoot', 5000)">Pesan Sekarang</button>
                        <h4 style="margin-top:10px;">2 Shoot</h4>
                        <p>Pas, seimbang, dan mantap untuk nemenin aktivitas harian.</p>
                        <span class="harga">Rp 7.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nescafe Ice Roast 2 Shoot', 7000)">Pesan Sekarang</button>
                        <h4 style="margin-top:10px;">3 Shoot</h4>
                        <p>Pekat, bold, dan kuat. Pas buat usir ngantuk & fokus ekstra.</p>
                        <span class="harga">Rp 9.000</span>
                        <button class="btn-pesan" onclick="tambahKeKeranjang('Nescafe Ice Roast 3 Shoot', 9000)">Pesan Sekarang</button>
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
                    <p>Klik menu favoritmu untuk memasukkannya ke dalam keranjang belanja.</p>
                </div>
                <div class="langkah">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>2. Cek Keranjang</h4>
                    <p>Atur jumlah pesananmu langsung melalui popup keranjang yang muncul.</p>
                </div>
                <div class="langkah">
                    <i class="fab fa-whatsapp"></i>
                    <h4>3. Checkout di Atas</h4>
                    <p>Klik tombol WhatsApp di bagian atas keranjang untuk mengirimkan rincian pesanan.</p>
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
            <div class="card-omset" style="margin-bottom: 20px;">
                <h4>Total Omset Pendapatan (Hari Ini)</h4>
                <p id="total-omset-hari-ini">Rp 0</p>
            </div>

            <div class="card-grafik" style="background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 25px;">
                <h4 style="margin-top: 0; margin-bottom: 15px; color: var(--warna-gelap); font-weight: 600;">
                    <i class="fas fa-chart-line" style="color: var(--warna-utama); margin-right: 8px;"></i>Tren Penjualan per Jam (Hari Ini)
                </h4>
                <div style="position: relative; width: 100%; height: 300px;">
                    <canvas id="grafikPenjualanJam"></canvas>
                </div>
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
                            <th>Nama Customer</th>
                            <th>Nama Produk</th>
                            <th>Harga Total</th>
                            <th>Petugas / Sumber</th>
                            <th>Aksi</th> <!-- Tambahkan kolom Th ini -->
                        </tr>
                    </thead>
                    <tbody id="data-penjualan-hari-ini"></tbody>
                </table>
            </div>
        </div> </section>

        <!-- ... Potongan kode area-keranjang bawaan ... -->
        <div id="area-keranjang" class="modal">
            <div class="modal-content" style="max-width: 450px; text-align: left; padding: 25px;">
                <span class="close-modal" onclick="tutupPopupKeranjang()">&times;</span>

                <div style="text-align: center; margin-bottom: 15px;">
                    <i class="fas fa-shopping-basket" style="font-size: 2.2rem; color: var(--warna-utama); margin-bottom: 10px;"></i>
                    <h3 style="font-size: 1.4rem; color: var(--warna-gelap); font-weight: 700; margin-bottom: 15px;">Keranjang Belanja</h3>
                </div>

                <!-- TAMBAHAN: PILIHAN METODE PEMBAYARAN -->
                <div style="margin-bottom: 15px; background: #f8f9fa; padding: 12px; border-radius: 8px;">
                    <label style="font-weight: 600; font-size: 0.9rem; display: block; margin-bottom: 8px;">Pilih Metode Pembayaran:</label>
                    <div style="display: flex; gap: 10px;">
                        <label style="flex: 1; background: white; padding: 10px; border: 1px solid #ccc; border-radius: 6px; cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
                            <input type="radio" name="metode_bayar" value="wa" checked> WhatsApp
                        </label>
                        <label style="flex: 1; background: white; padding: 10px; border: 1px solid #ccc; border-radius: 6px; cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
                            <input type="radio" name="metode_bayar" value="qris"> QRIS (E-Wallet)
                        </label>
                    </div>
                </div>

                <div style="margin-bottom: 20px; border-bottom: 2px dashed #eee; padding-bottom: 15px;">
                    <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 1.1rem; margin-bottom: 12px;">
                        <span>Total Pembayaran:</span>
                        <span id="total-harga-keranjang">Rp 0</span>
                    </div>
                    <!-- UBAH ONCLICK BUTTON: Memicu fungsi proses checkout adaptif -->
                    <button class="btn-checkout-wa" onclick="prosesCheckoutKeranjang()">
                        <i class="fas fa-check-circle"></i> Proses Pembayaran
                    </button>
                </div>

                <div id="list-item-keranjang" style="max-height: 240px; overflow-y: auto;"></div>
             </div>
        </div>

        <!-- TAMBAHAN: MODAL POP-UP QRIS -->
        <div id="modal-qris" class="modal" style="z-index: 3000;">
            <div class="modal-content" style="max-width: 400px; text-align: center; padding: 25px;">
                <span class="close-modal" onclick="tutupModalQris()">&times;</span>
                <h3 style="text-align: center; margin-bottom: 10px; color: var(--warna-gelap); font-weight: 700;">Pembayaran QRIS</h3>
                <p style="font-size: 0.9rem; color: #555; margin-bottom: 15px;">Silakan scan QRIS di bawah ini sebesar:</p>
        
                <!-- Tempat nominal total dinamis -->
                <div id="qris-total-tagihan" style="font-size: 1.6rem; font-weight: bold; color: var(--warna-utama); margin-bottom: 15px;">Rp 0</div>
        
                <!-- Gambar QRIS Toko -->
                <img src="images/qris-kupilih-rasa.png" alt="QRIS Kupilih Rasa" style="width: 100%; max-width: 220px; margin: 0 auto 15px auto; display: block; border: 1px solid #eee; padding: 5px; border-radius: 8px;">
        
                <!-- INPUT UPLOAD BUKTI PEMBAYARAN -->
                <div style="margin-bottom: 15px; text-align: left; background: #f8f9fa; padding: 12px; border-radius: 8px; border: 1px dashed #ccc;">
                    <label style="display: block; font-weight: 600; font-size: 0.85rem; margin-bottom: 6px; color: var(--warna-gelap);">
                        <i class="fas fa-camera"></i> Upload Bukti Pembayaran (Wajib):
                    </label>
                    <input type="file" id="qris-bukti-file" accept="image/*" style="width: 100%; font-size: 0.85rem;">
                </div>

                <div style="background: #fff3cd; color: #856404; padding: 10px; border-radius: 6px; font-size: 0.85rem; margin-bottom: 15px; text-align: left;">
                    <i class="fas fa-info-circle"></i> <strong>Penting:</strong> Masukkan foto/screenshot bukti transfer di atas terlebih dahulu, kemudian klik tombol di bawah agar pesanan diproses.
                </div>
        
                <button class="btn-checkout-wa" onclick="konfirmasiPembayaranQrisSelesai()">
                    <i class="fas fa-paper-plane"></i> Saya Sudah Bayar
                </button>
            </div>
        </div>
    </div>

    <div id="modal-struk-kasir" class="modal-petunjuk" style="display: none; z-index: 2000;">
        <div class="modal-konten-petunjuk" style="max-width: 380px; padding: 0; background: #fdfdfd; border-radius: 8px; overflow: hidden;">
        
            <div id="area-cetak-struk" style="padding: 20px; font-family: 'Courier New', Courier, monospace; color: #000; font-size: 13px; line-height: 1.4;">
                <div style="text-align: center; margin-bottom: 15px;">
                    <h3 style="margin: 0 0 5px 0; font-family: 'Segoe UI', sans-serif; font-weight: bold; letter-spacing: 1px;">KUPILIH RASA</h3>
                    <p style="margin: 0; font-size: 11px;">Resep Cantik Rasa Tak Terkalahkan</p>
                    <p style="margin: 3px 0 0 0; font-size: 11px;">Pasuruan, Jawa Timur</p>
                    <p style="margin: 0;">================================</p>
                </div>
            
                <table style="width: 100%; font-size: 12px; margin-bottom: 10px;">
                    <tr>
                        <td>No. Nota</td>
                        <td>:</td>
                        <td id="struk-id-transaksi">#000</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td id="struk-waktu-transaksi">00-00-0000 00:00</td>
                    </tr>
                    <tr>
                        <td>Kasir</td>
                        <td>:</td>
                        <td id="struk-nama-kasir">Staff</td>
                    </tr>
                    <tr>
                        <td>Pelanggan</td>
                        <td>:</td>
                        <td id="struk-nama-pelanggan">Offline</td>
                    </tr>
                </table>
            
                <p style="margin: 0; text-align: center;">--------------------------------</p>
            
                <div id="struk-daftar-item" style="margin: 10px 0;">
                    </div>
            
                <p style="margin: 0; text-align: center;">--------------------------------</p>
            
                <table style="width: 100%; font-size: 13px; font-weight: bold; margin-top: 5px;">
                    <tr>
                        <td style="text-align: left;">TOTAL AKHIR</td>
                        <td style="text-align: right;" id="struk-total-harga">Rp 0</td>
                    </tr>
                </table>
            
                <div style="text-align: center; margin-top: 25px; font-size: 11px;">
                    <p style="margin: 0;">Terima Kasih Atas Kunjungan Anda</p>
                    <p style="margin: 5px 0 0 0; font-style: italic;">Savor the taste you choose!</p>
                </div>
            </div>

            <div style="padding: 15px; background: #f1f3f5; display: flex; gap: 10px; justify-content: flex-end; border-top: 1px solid #e9ecef;">
                <button onclick="tutupModalStruk()" style="padding: 8px 14px; background: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">
                    Tutup
                </button>
                <button onclick="eksekusiPrintStruk()" style="padding: 8px 16px; background: #2b2d42; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.85rem; font-weight: 600;">
                    <i class="fas fa-print"></i> Cetak Struk
                </button>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy 2026 Kupilih Rasa. Dibuat dengan ❤️</p>
    </footer>
    
    <a href="https://wa.me/62895327556000" class="wa-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="script.js?v=2.0"></script>
</body>
</html>