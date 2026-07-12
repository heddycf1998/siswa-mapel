document.addEventListener('DOMContentLoaded', function () {
    const iconEyeOpen = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>`;
    const iconEyeClose = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-10-7-10-7a19.08 19.08 0 0 1 4.39-4.39M1 1l22 22M22 12s-3 7-10 7a10.67 10.67 0 0 1-2.28-.25M9.88 9.88a3 3 0 1 0 4.24 4.24"></path></svg>`;

    // Cari semua tombol yang punya class .toggle-password
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            // Cari container terdekat, lalu cari tag input di dalamnya (lebih generik)
            const container = this.closest('.input-password-container');
            if (!container) return;

            const passwordInput = container.querySelector('input');
            if (!passwordInput) return;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.innerHTML = iconEyeClose;  // Ganti ikon mata dicoret
                this.classList.add('active');   // Nyalakan background biru aktif
            } else {
                passwordInput.type = 'password';
                this.innerHTML = iconEyeOpen;   // Kembalikan ke ikon mata biasa
                this.classList.remove('active'); // Kembalikan ke background abu-abu
            }
        });
    });
});