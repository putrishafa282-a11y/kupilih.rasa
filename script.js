// Konfigurasi Akun Pengguna Sederhana
const AKUN_INTERNAL = {
    "owner_kupilih": { password: "owner123", role: "Owner" },
    "staff_kupilih": { password: "staff123", role: "Staff" }
};

let sessionRoleAktif = "";

// Fungsi pembeli online lewat tombol WA
function tambahKeKeranjang(namaProduk, harga) {
    const nomorWA = "62895327556000"; 
    const pesan = `Halo Kupilih Rasa, saya ingin memesan: *${namaProduk}*. Mohon informasi detailnya ya!`;
    const linkWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
    
    // Otomatis tercatat di sistem backend lokal
    simpanKeLocalStorage(namaProduk, harga, "Pembeli (WA)");

    alert(`Mengarahkan Anda ke WhatsApp untuk memesan ${namaProduk}...`);
    window.open(linkWA, '_blank');
}

// Fungsi internal menyimpan logs transaksi ke Local Storage
function simpanKeLocalStorage(namaProduk, harga, sumber) {
    let listTransaksi = JSON.parse(localStorage.getItem('transaksi_kupilihrasa')) || [];
    
    const waktuSekarang = new Date();
    const dataBaru = {
        waktu: waktuSekarang.toLocaleString('id-ID'),
        tanggalKey: waktuSekarang.toDateString(),
        produk: namaProduk,
        harga: parseInt(harga),
        loggedBy: sumber
    };

    listTransaksi.push(dataBaru);
    localStorage.setItem('transaksi_kupilihrasa', JSON.stringify(listTransaksi));
}

// Menyimpan input penjualan manual offline dari dashboard
function simpanTransaksiManual(e) {
    e.preventDefault();
    const namaProduk = document.getElementById('manual-nama-produk').value.trim();
    const hargaProduk = document.getElementById('manual-harga-produk').value;

    simpanKeLocalStorage(namaProduk, hargaProduk, `Manual (${sessionRoleAktif})`);
    document.getElementById('form-penjualan-manual').reset();

    if (sessionRoleAktif === "Owner") {
        hitungOmsetHarian();
    }
    muatTabelLaporanPenjualan();
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
        hitungOmsetHarian();
    } else {
        fiturOwner.style.display = 'none';
    }

    // FITUR BARU: Otomatis set kalender ke tanggal hari ini saat dashboard dibuka
    const inputTanggal = document.getElementById('filter-tanggal');
    const hariIni = new Date();
    const yyyy = hariIni.getFullYear();
    const mm = String(hariIni.getMonth() + 1).padStart(2, '0');
    const dd = String(hariIni.getDate()).padStart(2, '0');
    inputTanggal.value = `${yyyy}-${mm}-${dd}`;

    // Muat data berdasarkan tanggal yang ada di kalender
    muatTabelLaporanPenjualan(hariIni.toDateString());
    window.scrollTo(0, 0);
}

function muatTabelLaporanPenjualan(tanggalDicari) {
    const listTransaksi = JSON.parse(localStorage.getItem('transaksi_kupilihrasa')) || [];
    const tbody = document.getElementById('data-penjualan-hari-ini');
    
    tbody.innerHTML = ""; 

    // Filter data berdasarkan tanggalKey yang dipilih user
    const transaksiTerfilter = listTransaksi.filter(item => item.tanggalKey === tanggalDicari);

    if (transaksiTerfilter.length === 0) {
        tbody.innerHTML = `<tr><td colspan="4" style="text-align:center; padding: 30px; color:#888;">Tidak ada pesanan tercatat pada tanggal ini.</td></tr>`;
        return;
    }

    // Tampilkan data (terbaru di atas)
    transaksiTerfilter.reverse().forEach(item => {
        const row = document.createElement('tr');
        // Menampilkan jam + tanggal lengkap di kolom pertama agar jelas
        row.innerHTML = `
            <td>${item.waktu}</td>
            <td><strong>${item.produk}</strong></td>
            <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
            <td><span class="badge-staff">${item.loggedBy}</span></td>
        `;
        tbody.appendChild(row);
    });
}

// FITUR BARU: Event Listener ketika user mengubah tanggal di kalender
document.getElementById('filter-tanggal').addEventListener('change', function() {
    const tanggalDipilih = new Date(this.value).toDateString();
    muatTabelLaporanPenjualan(tanggalDipilih);
});

function hitungOmsetHarian() {
    const listTransaksi = JSON.parse(localStorage.getItem('transaksi_kupilihrasa')) || [];
    const hariIniStr = new Date().toDateString();
    
    let total = listTransaksi
        .filter(item => item.tanggalKey === hariIniStr)
        .reduce((sum, item) => sum + item.harga, 0);

    document.getElementById('total-omset-hari-ini').innerText = `Rp ${total.toLocaleString('id-ID')}`;
}

function muatTabelLaporanPenjualan() {
    const listTransaksi = JSON.parse(localStorage.getItem('transaksi_kupilihrasa')) || [];
    const hariIniStr = new Date().toDateString();
    const tbody = document.getElementById('data-penjualan-hari-ini');
    
    tbody.innerHTML = ""; 

    const transaksiHariIni = listTransaksi.filter(item => item.tanggalKey === hariIniStr);

    if (transaksiHariIni.length === 0) {
        tbody.innerHTML = `<tr><td colspan="4" style="text-align:center; padding: 30px; color:#888;">Belum ada pesanan untuk hari ini.</td></tr>`;
        return;
    }

    transaksiHariIni.reverse().forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.waktu.split(' ')[1] || item.waktu}</td>
            <td><strong>${item.produk}</strong></td>
            <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
            <td><span class="badge-staff">${item.loggedBy}</span></td>
        `;
        tbody.appendChild(row);
    });
}

function logoutDashboard() {
    sessionRoleAktif = "";
    document.getElementById('dashboard-section').style.display = 'none';
    document.getElementById('konten-landing').style.display = 'block';
    window.scrollTo(0, 0);
}