const AKUN_INTERNAL = {
    "owner_kupilih": { password: "owner123", role: "Owner" },
    "staff_kupilih": { password: "staff123", role: "Staff" }
};

let sessionRoleAktif = "";
let dataKeranjang = [];

function tambahKeKeranjang(namaProduk, harga) {
    const indexSama = dataKeranjang.findIndex(item => item.produk === namaProduk);

    if (indexSama > -1) {
        dataKeranjang[indexSama].qty += 1;
    } else {
        dataKeranjang.push({
            produk: namaProduk,
            harga: Number(harga),
            qty: 1
        });
    }

    updateTampilanKeranjang();
    
    bukaPopupKeranjang(); 
}

function ubahQtyItem(index, perubahan) {
    if (dataKeranjang[index] === undefined) return;

    dataKeranjang[index].qty += perubahan;

    if (dataKeranjang[index].qty <= 0) {
        dataKeranjang.splice(index, 1);
    }

    updateTampilanKeranjang();
}

function updateTampilanKeranjang() {
    const wadahList = document.getElementById('list-item-keranjang');
    const badgeCount = document.getElementById('badge-keranjang-count');
    const totalHargaText = document.getElementById('total-harga-keranjang');
    
    if (!wadahList) return;

    wadahList.innerHTML = '';

    let totalItem = 0;
    let totalHarga = 0;

    if (dataKeranjang.length === 0) {
        wadahList.innerHTML = `
            <div style="text-align: center; padding: 30px 0; color: #999;">
                <i class="fas fa-shopping-basket" style="font-size: 2.5rem; margin-bottom: 10px; opacity: 0.5; color: var(--warna-utama);"></i>
                <p style="font-size: 0.95rem; margin: 0;">Keranjang belanja kamu kosong.</p>
            </div>`;
    } else {
        dataKeranjang.forEach((item, index) => {
            totalItem += item.qty;
            totalHarga += (item.harga * item.qty);

            const divItem = document.createElement('div');
            divItem.style.display = 'flex';
            divItem.style.justify = 'space-between';
            divItem.style.alignItems = 'center';
            divItem.style.padding = '12px 0';
            divItem.style.borderBottom = '1px solid #eee';
            
            divItem.innerHTML = `
                <div style="text-align: left;">
                    <h4 style="margin: 0; font-size: 0.95rem; color: var(--warna-gelap); font-weight: 600;">${item.produk}</h4>
                    <span style="font-size: 0.85rem; color: var(--warna-utama); font-weight: 600;">Rp ${(item.harga * item.qty).toLocaleString('id-ID')}</span>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <button onclick="ubahQtyItem(${index}, -1)" style="background: #f0f0f0; border: none; padding: 4px 10px; border-radius: 5px; cursor: pointer; font-weight: bold; color: #333;">-</button>
                    <span style="font-weight: 600; min-width: 15px; text-align: center; font-size: 0.95rem;">${item.qty}</span>
                    <button onclick="ubahQtyItem(${index}, 1)" style="background: #f0f0f0; border: none; padding: 4px 10px; border-radius: 5px; cursor: pointer; font-weight: bold; color: #333;">+</button>
                </div>
            `;
            wadahList.appendChild(divItem);
        });
    }

    if (badgeCount) badgeCount.innerText = totalItem;
    if (totalHargaText) totalHargaText.innerText = `Rp ${totalHarga.toLocaleString('id-ID')}`;
}

function bukaPopupKeranjang(e) {
    if (e) e.preventDefault();
    const wadahKeranjang = document.getElementById('area-keranjang');
    if (wadahKeranjang) wadahKeranjang.style.display = 'flex';
}

function tutupPopupKeranjang() {
    const wadahKeranjang = document.getElementById('area-keranjang');
    if (wadahKeranjang) wadahKeranjang.style.display = 'none';
}

function kirimKeranjangKeWA() {
    if (dataKeranjang.length === 0) {
        alert("Keranjang Anda masih kosong!");
        return;
    }

    let namaCustomer = "";
    
    while (true) {
        const input = prompt("WAJIB: Masukkan nama Anda untuk menyelesaikan pesanan:");
        
        if (input === null) {
            alert("Pesanan dibatalkan karena nama tidak diisi.");
            return; 
        }
        
        if (input.trim() !== "") {
            namaCustomer = input.trim();
            break; 
        }
        
        alert("Nama tidak boleh kosong! Mohon masukkan nama Anda.");
    }

    const nomorWA = "62895327556000"; 
    let teksPesanan = `Halo Kupilih Rasa, saya atas nama *${namaCustomer}* ingin memesan menu berikut:\n\n`;
    let totalAkhir = 0;
    let arrayMenuGabungan = [];

    dataKeranjang.forEach((item, index) => {
        const subTotal = item.harga * item.qty;
        totalAkhir += subTotal;
        teksPesanan += `${index + 1}. *${item.produk}* (x${item.qty}) - Rp ${subTotal.toLocaleString('id-ID')}\n`;
        arrayMenuGabungan.push(`${item.produk} (x${item.qty})`);
    });

    const stringMenuFinal = arrayMenuGabungan.join(', ');
    const dataFormatDatabase = `${namaCustomer}||${stringMenuFinal}`;

    simpanKeDatabase(dataFormatDatabase, totalAkhir, "Pembeli (WA)");

    teksPesanan += `\n*Total Pembayaran: Rp ${totalAkhir.toLocaleString('id-ID')}*\n\nMohon informasi detail pembayarannya ya!`;
    const linkWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(teksPesanan)}`;
    
    alert("Pesanan berhasil dicatat ke sistem! Mengarahkan Anda ke WhatsApp...");
    
    dataKeranjang = [];
    updateTampilanKeranjang();
    tutupPopupKeranjang();

    window.open(linkWA, '_blank');
}

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
            console.log("Mantap! Data berhasil masuk MySQL di tabel terpusat.");
            const inputTanggal = document.getElementById('filter-tanggal').value;
            if (inputTanggal) {
                muatTabelLaporanPenjualan(inputTanggal);
            }
        } else {
            console.error("Gagal menyimpan: ", data.message);
        }
    })
    .catch(error => console.error("Ada error jaringan:", error));
}

function simpanTransaksiManual(e) {
    e.preventDefault();
    
    let namaCustomer = "";
    
    while (true) {
        const input = prompt("WAJIB: Masukkan nama customer offline / nomor meja:");
        
        if (input === null) {
            alert("Input transaksi manual dibatalkan.");
            return; 
        }
        
        if (input.trim() !== "") {
            namaCustomer = input.trim();
            break; 
        }
        
        alert("Nama customer offline wajib diisi! Tanyakan ke pembeli terlebih dahulu.");
    }

    const namaProduk = document.getElementById('manual-nama-produk').value.trim();
    const hargaProduk = document.getElementById('manual-harga-produk').value;

    const dataFormatDatabase = `${namaCustomer}||${namaProduk}`;

    simpanKeDatabase(dataFormatDatabase, hargaProduk, `Manual (${sessionRoleAktif})`);
    document.getElementById('form-penjualan-manual').reset();

    alert("Transaksi offline berhasil disimpan!");
}

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

    const hariIni = new Date();
    const yyyy = hariIni.getFullYear();
    const mm = String(hariIni.getMonth() + 1).padStart(2, '0');
    const dd = String(hariIni.getDate()).padStart(2, '0');
    const tanggalFormat = `${yyyy}-${mm}-${dd}`;
    
    document.getElementById('filter-tanggal').value = tanggalFormat;

    muatTabelLaporanPenjualan(tanggalFormat);
    window.scrollTo(0, 0);
}

function muatTabelLaporanPenjualan(tanggalDicari) {
    const tbody = document.getElementById('data-penjualan-hari-ini');
    if (!tbody) return;

    if (!tanggalDicari) {
        tanggalDicari = document.getElementById('filter-tanggal').value;
        if (!tanggalDicari) return;
    }
    
    fetch(`ambil_transaksi.php?tanggal=${tanggalDicari}`)
    .then(response => response.json())
    .then(data => {
        tbody.innerHTML = ""; 

        if (sessionRoleAktif === "Owner") {
            document.getElementById('total-omset-hari-ini').innerText = `Rp ${data.totalOmset.toLocaleString('id-ID')}`;
        }

        if (!data.transaksi || data.transaksi.length === 0) {
            tbody.innerHTML = `<tr><td colspan="4" style="text-align:center; padding: 30px; color:#888;">Tidak ada pesanan tercatat pada tanggal ini.</td></tr>`;
            return;
        }

        data.transaksi.forEach(item => {
            let namaCust = "Staff/Offline";
            let menuProduk = item.produk;

            if (item.produk.includes("||")) {
                const potonganData = item.produk.split("||");
                namaCust = potonganData[0];
                menuProduk = potonganData[1];
            }

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.waktu}</td>
                <td><span style="color: #2b2d42; font-weight: 600;">${namaCust}</span></td> <!-- Kolom Nama -->
                <td><strong>${menuProduk}</strong></td> <!-- Kolom Menu -->
                <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                <td><span class="badge-staff">${item.loggedBy}</span></td>
                <td>
                    <button class="btn-crud-edit" onclick="aksiEditTransaksi(${item.id}, '${item.produk}', ${item.harga})">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn-crud-delete" onclick="aksiHapusTransaksi(${item.id})">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </td>
            `;
            tbody.appendChild(row);
        });

    })
    .catch(error => console.error("Gagal memuat data dari MySQL:", error));
}

document.getElementById('filter-tanggal').addEventListener('change', function() {
    muatTabelLaporanPenjualan(this.value);
});

function logoutDashboard() {
    sessionRoleAktif = "";
    document.getElementById('dashboard-section').style.display = 'none';
    document.getElementById('konten-landing').style.display = 'block';
    window.scrollTo(0, 0);
}

let produkSedangDipilih = "";
let hargaProdukSedangDipilih = 0;

function bukaModalVarian(namaProduk, harga) {
    produkSedangDipilih = namaProduk;
    hargaProdukSedangDipilih = harga;
    document.getElementById('varian-title-produk').innerText = `Varian ${namaProduk}`;
    document.getElementById('modal-varian').style.display = 'flex';
}

function tutupModalVarian() {
    document.getElementById('modal-varian').style.display = 'none';
    produkSedangDipilih = "";
    hargaProdukSedangDipilih = 0;
}

function pilihVarianSelesai(namaVarian) {
    const namaLengkapProduk = `${produkSedangDipilih} (${namaVarian})`;
    tambahKeKeranjang(namaLengkapProduk, hargaProdukSedangDipilih);
    tutupModalVarian();
}

function aksiEditTransaksi(id, produkLama, hargaLama) {

    const produkBaru = prompt("Ubah detail / nama produk:", produkLama);
    const hargaBaru = prompt("Ubah nominal harga total (Rp):", hargaLama);

    if (produkBaru !== null && hargaBaru !== null) {
        if (produkBaru.trim() === "" || hargaBaru.trim() === "") {
            alert("Data perubahan tidak boleh dikosongkan!");
            return;
        }

        let dataKirim = new FormData();
        dataKirim.append('id', id);
        dataKirim.append('produk', produkBaru);
        dataKirim.append('harga', hargaBaru);

        fetch('ubah_transaksi.php', {
            method: 'POST',
            body: dataKirim
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message); // Notifikasi sukses
                
                const inputTanggal = document.getElementById('filter-tanggal').value;
                muatTabelLaporanPenjualan(inputTanggal); 
            } else {
                alert("Gagal memperbarui data: " + data.message);
            }
        })
        .catch(error => console.error("Error koneksi jaringan:", error));
    }
}

function aksiHapusTransaksi(idTransaksi) {
    if (confirm("Apakah Anda yakin ingin menghapus log transaksi ini?")) {
        let dataKirim = new FormData();
        dataKirim.append('id', idTransaksi);

        fetch('hapus_transaksi.php', {
            method: 'POST',
            body: dataKirim
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);

                const inputTanggal = document.getElementById('filter-tanggal').value;
                muatTabelLaporanPenjualan(inputTanggal);
            } else {
                alert("Gagal menghapus: " + data.message);
            }
        })
        .catch(error => console.error("Error jaringan:", error));
    }
}

function toggleMenu() {
    const menu = document.getElementById('nav-menu');
    menu.classList.toggle('active');
}

document.querySelectorAll('nav ul li a').forEach(link => {
    link.addEventListener('click', () => {
        const menu = document.getElementById('nav-menu');
        if (menu.classList.contains('active')) {
            menu.classList.remove('active');
        }
    });
});

function prosesCheckoutKeranjang() {
    if (dataKeranjang.length === 0) {
        alert("Keranjang Anda masih kosong!");
        return;
    }

    const radioMetode = document.querySelector('input[name="metode_bayar"]:checked');
    const metodeDipilih = radioMetode ? radioMetode.value : "wa";

    if (metodeDipilih === "wa") {
        kirimKeranjangKeWA();
    } else if (metodeDipilih === "qris") {
        bukaModalQris();
    }
}

function bukaModalQris() {
    if (dataKeranjang.length === 0) {
        alert("Keranjang Anda masih kosong!");
        return;
    }

    let namaCustomer = "";
    
    // Looping paksa: Validasi nama customer SEBELUM modal QRIS terbuka
    while (true) {
        const input = prompt("WAJIB: Masukkan nama Anda sebelum melakukan pembayaran QRIS:");
        
        if (input === null) {
            alert("Pembayaran QRIS dibatalkan karena nama tidak diisi.");
            return; // Batalkan dan keluar, modal QRIS tidak akan terbuka
        }
        
        if (input.trim() !== "") {
            namaCustomer = input.trim();
            break; // Nama valid, keluar dari loop
        }
        
        alert("Nama tidak boleh kosong! Mohon masukkan nama Anda.");
    }

    window.namaCustomerQrisAktif = namaCustomer;

    let totalAkhir = 0;
    dataKeranjang.forEach((item) => {
        totalAkhir += item.harga * item.qty;
    });

    const textTotalQris = document.getElementById('qris-total-tagihan');
    if (textTotalQris) {
        textTotalQris.innerText = `Rp ${totalAkhir.toLocaleString('id-ID')}`;
    }
    
    tutupPopupKeranjang();
    
    const modalQris = document.getElementById('modal-qris');
    if (modalQris) {
        modalQris.style.display = 'flex';
    }
}

function tutupModalQris() {
    const modalQris = document.getElementById('modal-qris');
    if (modalQris) {
        modalQris.style.display = 'none';
    }
}

function konfirmasiPembayaranQrisSelesai() {

    const namaCustomer = window.namaCustomerQrisAktif || "Pelanggan QRIS";

    let totalAkhir = 0;
    let arrayMenuGabungan = [];

    dataKeranjang.forEach((item) => {
        const subTotal = item.harga * item.qty;
        totalAkhir += subTotal;
        arrayMenuGabungan.push(`${item.produk} (x${item.qty})`);
    });

    const stringMenuFinal = arrayMenuGabungan.join(', ');
    const dataFormatDatabase = `${namaCustomer}||${stringMenuFinal}`;

    const fileInput = document.getElementById('qris-bukti-file');
    
    if (!fileInput || fileInput.files.length === 0) {
        alert("Silakan upload foto atau screenshot bukti pembayaran QRIS Anda terlebih dahulu!");
        return; 
    }

    const fileFoto = fileInput.files[0];

    let formData = new FormData();
    formData.append('produk', dataFormatDatabase);
    formData.append('harga', totalAkhir);
    formData.append('logged_by', "Pembeli (QRIS)");
    formData.append('bukti_foto', fileFoto); 

    fetch('simpan_transaksi_qris.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert("Transaksi Berhasil! Bukti pembayaran telah terkirim ke server.");
            
            dataKeranjang = [];
            updateTampilanKeranjang();
            tutupModalQris();
        } else {
            alert("Gagal menyimpan transaksi: " + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Terjadi kesalahan koneksi saat mengirim gambar ke server.");
    });
}