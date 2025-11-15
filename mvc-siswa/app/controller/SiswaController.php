<?php
require_once BASE_PATH . '/app/model/Siswa.php';
require_once BASE_PATH . '/app/model/SiswaMapel.php';

$siswa = new Siswa();
$siswaMapel = new SiswaMapel();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aksi']) && $_POST['aksi'] === 'simpan') {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];

    $error = [];

    if (empty($nama) || strlen(trim($nama)) < 3)  {
        $error[] = "Nama minimal 3 huruf.";
    }

    if (!is_numeric($umur) || $umur < 5 || $umur > 100) {
        $error[] = "Umur harus 5 - 100.";
    }

    if (empty($alamat) || strlen(trim($alamat)) < 3 ) {
        $error[] = "Alamat minimal 3 huruf";
    }


    if (!empty($error)) {
        $param = http_build_query([
            'menu' => 'siswa',
            'aksi' => 'form',
            'id' => $id ?? null,
            'error' => implode('|', $error),
            'nama' => $nama,
            'umur' => $umur,
            'alamat' => $alamat,
            'mapel' => $_POST['mapel'] ?? [],
        ]);
        header("Location: ". BASE_URL . "/index.php?$param"); // Pake "
        exit();
    }

    // if (!empty($error)) {
    //    header('Location: ../../index.php?menu=siswa&aksi=form&error='. urldecode(implode(', ', $error)));
    //    exit();
    // }

    if ($siswa->simpan($nama, $umur, $alamat)) {
        $id_siswa = $siswa->getLastInsertId();

        if(!empty($_POST['mapel'])) {
             foreach ($_POST['mapel'] as $id_mapel) {
                $siswaMapel->simpan($id_siswa, $id_mapel);
            }
        }
   
        header("Location: " . BASE_URL . "/index.php?pesan=sukses");
    } else {
        echo "Gagal simpan data";
    }
    exit();
    
}

if (isset($_POST['aksi']) && $_POST['aksi'] === 'hapus') {
    $id = $_POST['id'];
    if ($siswa->hapus($id)) {
        header("Location: " . BASE_URL . "/index.php?pesan=hapus");
    } else {
        echo "Gagal Hapus";
    }
    exit();

}

if (isset($_POST['aksi']) && $_POST['aksi'] === 'edit') {
    $id = $_POST['id'];
    $data = $siswa->ambil($id);
    include BASE_PATH . '/app/view/siswa/form.php';
    exit();
}

if (isset($_POST['aksi']) && $_POST['aksi'] === 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];

    $error = [];

    if (empty($nama) || strlen(trim($nama)) < 3) {
        $error[] = "Nama minimal 3 huruf.";
    }

    if (!is_numeric($umur) || $umur < 5 || $umur > 100) {
        $error[] = "Umur harus 5 - 100.";
    }

    if (empty($alamat) || strlen(trim($alamat)) < 3) {
        $error[] = "Alamat minimal 3 huruf.";
    }

    // $paramMapel = '';
    // if (!empty($_POST['mapel'])) {
    //     foreach ($_POST['mapel'] as $id_mapel) {
    //         $paramMapel .= '&mapel[]' . urlencode($id_mapel);
    //     }
    // }

    if (!empty($error)) {
        $param = http_build_query([
            'menu' => 'siswa',
            'aksi' => 'form',
            'id' => $id ?? null,
            'error' => implode('|', $error),
            'nama' => $nama,
            'umur' => $umur,
            'alamat' => $alamat,
            'mapel' => $_POST['mapel'] ?? [],
        ]);
        header("Location: " . BASE_URL . "/index.php?$param");
        exit();
    }

    if ($siswa->update($nama, $umur, $alamat, $id)) {
        $siswaMapel->hapusBySiswa($id);

        if(!empty($_POST['mapel'])) {
             foreach ($_POST['mapel'] as $id_mapel) {
                $siswaMapel->simpan($id, $id_mapel);
            }
        }
        header("Location: " .BASE_URL .  "/index.php?pesan=update");
    } else {
        echo "Gagal Update Data";
    }
    exit();
}


?>