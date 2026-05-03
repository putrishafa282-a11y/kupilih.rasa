function tambahKeKeranjang(namaProduk) {
    const nomorWA = "62895327556000"; 
    
    const pesan = `Halo Kupilih Rasa, saya ingin memesan: *${namaProduk}*. Mohon informasi detailnya ya!`;
    
    const linkWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
    
    alert(`Mengarahkan Anda ke WhatsApp untuk memesan ${namaProduk}...`);
    
    window.open(linkWA, '_blank');
}

document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const section = document.querySelector(this.getAttribute('href'));
        section.scrollIntoView({ behavior: 'smooth' });
    });
});