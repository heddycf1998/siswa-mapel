document.addEventListener("DOMContentLoaded", function () {
  // Gunakan event delegation pada body agar mendengarkan klik secara global
  document.body.addEventListener("click", function (e) {
    // Cari apakah yang diklik adalah/di dalam tombol .btn-hapus
    const tombolHapus = e.target.closest(".btn-hapus");

    if (tombolHapus) {
      e.preventDefault(); // Kunci browser agar tidak submit otomatis atau lari ke URL lain

      // Cari form pembungkus dari tombol yang diklik
      const formTerkait = tombolHapus.closest("form");

      Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ef4444",
        cancelButtonColor: "#64748b",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          // Jika tombol berada di dalam sebuah form, jalankan submit form-nya
          if (formTerkait) {
            formTerkait.submit();
          } else {
            // Jaga-jaga jika di halaman lain tombolnya berupa link <a> biasa
            const urlTarget = tombolHapus.getAttribute("href");
            if (urlTarget && urlTarget !== "#") {
              window.location.href = urlTarget;
            }
          }
        }
      });
    }
  });
});
