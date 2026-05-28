// Konfigurasi Akun Pengguna Sederhana
const AKUN_INTERNAL = {
    "owner_kupilih": { password: "owner123", role: "Owner" },
    "staff_kupilih": { password: "staff123", role: "Staff" }
};

let sessionRoleAktif = "";

let dataKeranjang = [];

// 1. Fungsi memasukkan produk ke array keranjang (Nama disamakan dengan HTML lama Anda)
function tambahKeKeranjang(namaProduk, harga) {
    // Cek apakah produk sudah pernah dimasukkan sebelumnya
    const indexSama = dataKeranjang.findIndex(item => item.produk === namaProduk);

    if (indexSama > -1) {
        // Jika sudah ada, tambahkan quantity-nya saja
        dataKeranjang[indexSama].qty += 1;
    } else {
        // Jika belum ada, buat objek baru dalam array
        dataKeranjang.push({
            produk: namaProduk,
            harga: harga,
            qty: 1
        });
    }

    // Refresh visual tampilan keranjang
    updateTampilanKeranjang();
    
    // Tampilkan tombol keranjang melayang (floating) karena sudah ada isinya
    document.getElementById('btn-keranjang-floating').style.display = 'flex';
    
    // Opsional: Beri notifikasi kecil agar pembeli tahu item berhasil masuk keranjang
    alert(`${namaProduk} berhasil ditambahkan ke keranjang!`);
}

// 2. Fungsi merubah Qty (Tambah / Kurang) di dalam panel keranjang
function ubahQtyItem(namaProduk, perubahan) {
    const index = dataKeranjang.findIndex(item => item.produk === namaProduk);
    if (index === -1) return;

    dataKeranjang[index].qty += perubahan;

    // Jika qty menjadi 0 atau kurang, hapus item dari daftar keranjang
    if (dataKeranjang[index].qty <= 0) {
        dataKeranjang.splice(index, 1);
    }

    updateTampilanKeranjang();
}

// 3. Fungsi sinkronisasi data Array ke komponen HTML UI
function masukKeranjang() {
    const listContainer = document.getElementById('list-item-keranjang');
    const badgeCount = document.getElementById('badge-keranjang-count');
    const jumlahItemHeader = document.getElementById('jumlah-item-keranjang');
    const txtTotalHarga = document.getElementById('total-harga-keranjang');

    if(!listContainer) return;

    listContainer.innerHTML = "";
    let totalHarga = 0;
    let totalItems = 0;

    dataKeranjang.forEach(item => {
        const subTotal = item.harga * item.qty;
        totalHarga += subTotal;
        totalItems += item.qty;

        const divItem = document.createElement('div');
        divItem.className = 'item-keranjang';
        divItem.innerHTML = `
            <div class="detail-item-keranjang">
                <h4>${item.produk}</h4>
                <span>Rp ${subTotal.toLocaleString('id-ID')}</span>
            </div>
            <div class="kontrol-qty">
                <button onclick="ubahQtyItem('${item.produk}', -1)">-</button>
                <span>${item.qty}</span>
                <button onclick="ubahQtyItem('${item.produk}', 1)">+</button>
            </div>
        `;
        listContainer.appendChild(divItem);
    });

    // Update Angka Atribut Info
    if(badgeCount) badgeCount.innerText = totalItems;
    if(jumlahItemHeader) jumlahItemHeader.innerText = totalItems;
    if(txtTotalHarga) txtTotalHarga.innerText = `Rp ${totalHarga.toLocaleString('id-ID')}`;

    // Sembunyikan floating button & panel box jika keranjang kosong total
    if (dataKeranjang.length === 0) {
        document.getElementById('area-keranjang').style.display = 'none';
        document.getElementById('btn-keranjang-floating').style.display = 'none';
    }
}

// 4. Fungsi buka-tutup kontainer keranjang belanja
function toggleKeranjang() {
    const keranjangBox = document.getElementById('area-keranjang');
    if (keranjangBox.style.display === 'none' || keranjangBox.style.display === '') {
        keranjangBox.style.display = 'flex';
    } else {
        keranjangBox.style.display = 'none';
    }
}

// 5. Fungsi checkout menyusun pesan dan mengirimkannya ke WhatsApp resmi
function kirimKeranjangKeWA() {
    if (dataKeranjang.length === 0) {
        alert("Keranjang Anda masih kosong!");
        return;
    }

    const nomorWA = "62895327556000"; 
    let teksPesanan = `Halo Kupilih Rasa, saya ingin memesan menu berikut:\n\n`;
    let totalAkhir = 0;

    // Loop data keranjang untuk menyusun teks WA & merekam logs database harian
    dataKeranjang.forEach((item, index) => {
        const subTotal = item.harga * item.qty;
        totalAkhir += subTotal;
        teksPesanan += `${index + 1}. *${item.produk}* (x${item.qty}) - Rp ${subTotal.toLocaleString('id-ID')}\n`;
        
        // Memanggil fungsi simpanKeDatabase bawaan Anda untuk dicatat ke MySQL
        simpanKeDatabase(item.produk, subTotal, "Pembeli (WA)");
    });

    teksPesanan += `\n*Total Pembayaran: Rp ${totalAkhir.toLocaleString('id-ID')}*\n\nMohon informasi detail pembayarannya ya!`;

    const linkWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(teksPesanan)}`;
    
    alert("Pesanan berhasil dicatat ke sistem! Mengarahkan Anda ke WhatsApp...");
    
    // Reset keranjang setelah selesai dialihkan
    dataKeranjang = [];
    updateTampilanKeranjang();
    document.getElementById('area-keranjang').style.display = 'none';

    // Buka tautan WhatsApp di tab baru
    window.open(linkWA, '_blank');
}

// Fungsi internal menyimpan logs transaksi ke MySQL via PHP
function simpanKeDatabase(namaProduk, harga, sumber) {
    let dataKirim = new FormData();
    dataKirim.append('produk', namaProduk);
    dataKirim.append('harga', harga);
    dataKirim.append('logged_by', sumber);

    fetch('simpan_transaksi.php', {
        method: 'POST', 
        body: dataKirim 
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            console.log("Mantap! Data berhasil masuk MySQL.");
            // Jika dashboard sedang terbuka, refresh tabel secara real-time
            const inputTanggal = document.getElementById('filter-tanggal').value;
            if (inputTanggal) {
                muatTabelLaporanPenjualan(inputTanggal);
            }
        } else {
            console.error("Gagal mengirim: ", data.message);
        }
    })
    .catch(error => console.error("Ada error jaringan:", error));
}

// Fungsi input manual dari form dashboard offline
function simpanTransaksiManual(e) {
    e.preventDefault();
    const namaProduk = document.getElementById('manual-nama-produk').value.trim();
    const hargaProduk = document.getElementById('manual-harga-produk').value;

    simpanKeDatabase(namaProduk, hargaProduk, `Manual (${sessionRoleAktif})`);
    document.getElementById('form-penjualan-manual').reset();

    alert("Transaksi offline berhasil disimpan!");
}

// Logika Smooth Scroll Menu Utama
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        if(this.getAttribute('href').startsWith('#') && this.getAttribute('href') !== '#portal') {
            e.preventDefault();
            
            document.getElementById('konten-landing').style.display = 'block';
            document.getElementById('dashboard-section').style.display = 'none';
            
            const targetSection = document.querySelector(this.getAttribute('href'));
            if(targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});

function bukaModalLogin(e) {
    e.preventDefault();
    document.getElementById('modal-login').style.display = 'flex';
}

function tutupModalLogin() {
    document.getElementById('modal-login').style.display = 'none';
}

function prosesLogin(e) {
    e.preventDefault();
    const userIn = document.getElementById('username').value.trim();
    const passIn = document.getElementById('password').value;

    if (AKUN_INTERNAL[userIn] && AKUN_INTERNAL[userIn].password === passIn) {
        const userSession = AKUN_INTERNAL[userIn];
        sessionRoleAktif = userSession.role;
        tutupModalLogin();
        bukaDashboard(userSession.role);
    } else {
        alert("Username atau Password salah!");
    }
}

function bukaDashboard(role) {
    document.getElementById('konten-landing').style.display = 'none';
    const dashboard = document.getElementById('dashboard-section');
    dashboard.style.display = 'block';
    document.getElementById('user-role').innerText = role;
    document.getElementById('form-login').reset();

    const fiturOwner = document.getElementById('fitur-owner-eksklusif');
    if (role === "Owner") {
        fiturOwner.style.display = 'block';
    } else {
        fiturOwner.style.display = 'none';
    }

    // Set default tanggal kalender ke hari ini (Format: YYYY-MM-DD)
    const hariIni = new Date();
    const yyyy = hariIni.getFullYear();
    const mm = String(hariIni.getMonth() + 1).padStart(2, '0');
    const dd = String(hariIni.getDate()).padStart(2, '0');
    const tanggalFormat = `${yyyy}-${mm}-${dd}`;
    
    document.getElementById('filter-tanggal').value = tanggalFormat;

    // Muat data hari ini ke tabel
    muatTabelLaporanPenjualan(tanggalFormat);
    window.scrollTo(0, 0);
}

// Fungsi utama memuat data dari MySQL ke Tabel HTML
function muatTabelLaporanPenjualan(tanggalDicari) {
    const tbody = document.getElementById('data-penjualan-hari-ini');
    if (!tbody) return;

    if (!tanggalDicari) {
        tanggalDicari = document.getElementById('filter-tanggal').value;
        if (!tanggalDicari) return;
    }
    
    // Ambil data lewat Fetch API ke PHP
    fetch(`ambil_transaksi.php?tanggal=${tanggalDicari}`)
    .then(response => response.json())
    .then(data => {
        tbody.innerHTML = ""; 

        // 1. Update Total Omset Pendapatan (Hanya jika Owner)
        if (sessionRoleAktif === "Owner") {
            document.getElementById('total-omset-hari-ini').innerText = `Rp ${data.totalOmset.toLocaleString('id-ID')}`;
        }

        // 2. Jika data transaksi kosong
        if (!data.transaksi || data.transaksi.length === 0) {
            tbody.innerHTML = `<tr><td colspan="4" style="text-align:center; padding: 30px; color:#888;">Tidak ada pesanan tercatat pada tanggal ini.</td></tr>`;
            return;
        }

        // 3. Tampilkan data dari MySQL ke dalam tabel HTML
        data.transaksi.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.waktu}</td>
                <td><strong>${item.produk}</strong></td>
                <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                <td><span class="badge-staff">${item.loggedBy}</span></td>
            `;
            tbody.appendChild(row);
        });
    })
    .catch(error => console.error("Gagal memuat data dari MySQL:", error));
}

// EVENT LISTENER: Ketika user mengubah tanggal di kalender dashboard
document.getElementById('filter-tanggal').addEventListener('change', function() {
    muatTabelLaporanPenjualan(this.value);
});

function logoutDashboard() {
    sessionRoleAktif = "";
    document.getElementById('dashboard-section').style.display = 'none';
    document.getElementById('konten-landing').style.display = 'block';
    window.scrollTo(0, 0);
}

// Variabel global untuk menyimpan data produk yang sedang dipilih variannya
let produkSedangDipilih = "";
let hargaProdukSedangDipilih = 0;

// Fungsi untuk membuka pop-up varian
function bukaModalVarian(namaProduk, harga) {
    produkSedangDipilih = namaProduk;
    hargaProdukSedangDipilih = harga;
    
    // Update text judul di dalam modal
    document.getElementById('varian-title-produk').innerText = `Varian ${namaProduk}`;
    
    // Tampilkan modal varian
    document.getElementById('modal-varian').style.display = 'flex';
}

// Fungsi untuk menutup pop-up varian
function tutupModalVarian() {
    document.getElementById('modal-varian').style.display = 'none';
    produkSedangDipilih = "";
    hargaProdukSedangDipilih = 0;
}

// Fungsi ketika salah satu varian diklik
function pilihVarianSelesai(namaVarian) {
    // Gabungkan nama produk dengan variannya, contoh: "Potato Curly (Saos Pedas)"
    const namaLengkapProduk = `${produkSedangDipilih} (${namaVarian})`;
    
    // Panggil fungsi keranjang bawaan yang sudah ada di script.js Anda
    tambahKeKeranjang(namaLengkapProduk, hargaProdukSedangDipilih);
    
    // Tutup kembali modalnya secara otomatis
    tutupModalVarian();
}