document.addEventListener('DOMContentLoaded', function () {
    
    // Targetkan form reset password yang baru
    const formsReset = document.querySelectorAll(".form-reset-password");

    formsReset.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault(); // Kunci submit bawaan

            // Mengambil teks username dari kolom tabel terdekat (.col-username)
            const username = this.closest("tr").querySelector(".col-username").textContent.trim();

            // Jalankan SweetAlert2 dengan pesan kustom khusus reset password
            Swal.fire({
                title: "Reset Password?",
                text: `Password user "${username}" akan di-reset ke password bawaan !`,
                icon: "warning", // Menggunakan icon warning/peringatan
                showCancelButton: true,
                confirmButtonColor: "#f39c12", // Warna orange/kuning khas warning/reset
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, Reset!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit form asli jika klik Ya
                }
            });
        });
    });

});