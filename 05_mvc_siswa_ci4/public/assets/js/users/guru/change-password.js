document
  .getElementById("formUbahPassword")
  .addEventListener("submit", function (e) {
    // 1. Tahan form agar tidak langsung mengirim data
    e.preventDefault();

    // 2. Munculkan peringatan manis
    Swal.fire({
      title: "Ubah Password Kamu?",
      text: "Pastikan kamu sudah mengingat atau mencatat password baru ini dengan benar!",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, Simpan!",
      cancelButtonText: "Batal",
    }).then((result) => {
      // 3. Jika user klik "Ya, Simpan!", barulah form dikirim
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });
