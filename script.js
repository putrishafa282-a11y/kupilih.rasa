function tambahKeKeranjang(namaProduk) {
    // Nomor WhatsApp Anda (Ganti dengan nomor asli Anda)
    const nomorWA = "62895327556000"; 
    
    // Pesan otomatis
    const pesan = `Halo Kupilih Rasa, saya ingin memesan: *${namaProduk}*. Mohon informasi detailnya ya!`;
    
    // Encode pesan agar bisa dibaca URL
    const linkWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
    
    // Konfirmasi sederhana
    alert(`Mengarahkan Anda ke WhatsApp untuk memesan ${namaProduk}...`);
    
    // Buka WhatsApp di tab baru
    window.open(linkWA, '_blank');
}

// Efek scroll smooth untuk navigasi
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const section = document.querySelector(this.getAttribute('href'));
        section.scrollIntoView({ behavior: 'smooth' });
    });
});