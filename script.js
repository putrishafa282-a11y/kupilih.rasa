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
    
    // Otomatis tercatat di sistem backend MySQL
    simpanKeDatabase(namaProduk, harga, "Pembeli (WA)");

    alert(`Mengarahkan Anda ke WhatsApp untuk memesan ${namaProduk}...`);
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