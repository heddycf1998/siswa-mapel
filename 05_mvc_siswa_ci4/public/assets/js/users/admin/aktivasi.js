document.addEventListener("DOMContentLoaded", function () {
  // 1. SweetAlert2 untuk Tombol Massal
  const formMassal = document.getElementById("form-generate-massal");
  if (formMassal) {
    formMassal.addEventListener("submit", function (e) {
      e.preventDefault();

      Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Sistem akan membuatkan akun otomatis untuk SEMUA siswa yang belum punya akun!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#10b981",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Ya, Generate Massal!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          formMassal.submit();
        }
      });
    });
  }

  // 2. SweetAlert2 untuk Tombol Satuan di Tabel
  const formsSatuan = document.querySelectorAll(".form-aktivasi-satuan");
  formsSatuan.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      // Mengambil nama siswa dari kolom tabel terdekat (.col-nama)
      const namaSiswa =
        this.closest("tr").querySelector(".col-nama").textContent;

      Swal.fire({
        title: "Aktifkan Akun?",
        text: `Apakah Anda ingin mengaktifkan akun login untuk siswa bernama ${namaSiswa}?`,
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3b82f6",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Ya, Aktifkan!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
});
