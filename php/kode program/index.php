<?php
include 'Produk.php'; // Import class Produk agar bisa digunakan
session_start();// Memulai session untuk menyimpan data produk

// Inisialisasi session produk
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = []; // Jika belum ada, buat array kosong untuk menampung produk
}

// Variabel untuk pesan error/sukses
$error = "";
$success = "";

// Tambah Data Produk
if (isset($_POST['tambah'])) {
    $gambarPath = "";// Variabel untuk menyimpan lokasi gambar

    // Validasi input teks dan angka
    if (empty($_POST['id']) || empty($_POST['nama']) || empty($_POST['merk']) || empty($_POST['harga']) || empty($_POST['stok'])) {
        $error = "Semua field selain gambar wajib diisi!";
    }
    elseif (!is_numeric($_POST['harga']) || !is_numeric($_POST['stok'])) {
        $error = "Harga dan stok harus berupa angka!";
    }
    else {
        // Jika ada file gambar yang diupload dan tidak error
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $uploadDir = "images/";// Folder tujuan upload
            if (!is_dir($uploadDir)) { //Jika folder belum ada
                mkdir($uploadDir, 0777, true); // Buat folder baru
            }
            $gambarPath = $uploadDir . basename($_FILES['gambar']['name']);// Tentukan path gambar
            move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarPath); // Simpan file ke folder
        }

        // Membuat objek Produk baru dengan data dari form
        $produk = new Produk(
            $_POST['id'],
            $_POST['nama'],
            $_POST['merk'],
            $_POST['harga'],
            $_POST['stok'],
            $gambarPath
        );

        // Simpan objek produk ke dalam session dengan key id produk
        $_SESSION['produk'][$_POST['id']] = $produk;
        $success = "Produk berhasil ditambahkan!";
    }
}

// Update Data Produk
if (isset($_POST['update'])) {
    $id = $_POST['id'];// Ambil ID produk yang akan diupdate

    if (isset($_SESSION['produk'][$id])) {
        // Validasi input teks dan angka
        if (empty($_POST['nama']) || empty($_POST['merk']) || empty($_POST['harga']) || empty($_POST['stok'])) {
            $error = "Semua field selain gambar wajib diisi untuk update!";
        }
        elseif (!is_numeric($_POST['harga']) || !is_numeric($_POST['stok'])) {
            $error = "Harga dan stok harus berupa angka!";
        }
        else {
            // Update atribut produk menggunakan setter
            $_SESSION['produk'][$id]->setNama($_POST['nama']);
            $_SESSION['produk'][$id]->setMerk($_POST['merk']);
            $_SESSION['produk'][$id]->setHarga($_POST['harga']);
            $_SESSION['produk'][$id]->setStok($_POST['stok']);

            // Jika ada gambar baru yang diupload, update juga gambarnya
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
                $uploadDir = "images/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $gambarPath = $uploadDir . basename($_FILES['gambar']['name']);
                move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarPath);

                // Set gambar baru ke produk
                $_SESSION['produk'][$id]->setGambar($gambarPath);
            }
            $success = "Produk berhasil diupdate!";
        }
    } else {
        $error = "Produk dengan ID $id tidak ditemukan untuk update!";
    }
}

// Hapus Data Produk
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    if (isset($_SESSION['produk'][$id])) {
        unset($_SESSION['produk'][$id]);
        $success = "Produk dengan ID $id berhasil dihapus!";
    } else {
        header("Location: index.php"); 
        exit;
    }
}

// Cari Data Produk
$cariHasil = null; // Variabel untuk hasil pencarian
if (isset($_POST['cari'])) {
    $id = $_POST['id_cari']; // Ambil ID yang dicari
    if (isset($_SESSION['produk'][$id])) {
        $cariHasil = $_SESSION['produk'][$id]; // Simpan hasil jika ditemukan
    } else {
        $error = "Produk dengan ID $id tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toko Elektronik</title>
    <style>
        /* CSS untuk tampilan halaman */
        body { font-family: Arial, sans-serif; font-size: 18px; }
        input, button { padding: 8px; font-size: 16px; margin: 4px 0; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        img { max-width: 120px; }
    </style>
</head>
<body>
    <h1>Manajemen Produk Toko Elektronik</h1>

    <!-- Tampilkan pesan error / sukses jika ada -->
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error; ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?= $success; ?></p>
    <?php endif; ?>

    <!-- Form Tambah / Update Produk  -->
    <form method="post" enctype="multipart/form-data">
        <p><input type="text" name="id" placeholder="ID" required></p>
        <p><input type="text" name="nama" placeholder="Nama" required></p>
        <p><input type="text" name="merk" placeholder="Merk" required></p>
        <p><input type="number" name="harga" placeholder="Harga" required></p>
        <p><input type="number" name="stok" placeholder="Stok" required></p>
        <p><input type="file" name="gambar" accept="image/*"></p>
        <p>
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="update">Update</button>
        </p>
    </form>

    <hr>

    <!-- Form Cari Produk berdasarkan ID -->
    <form method="post">
        <p><input type="text" name="id_cari" placeholder="Cari berdasarkan ID"></p>
        <p><button type="submit" name="cari">Cari</button></p>
    </form>

    <!-- Jika hasil pencarian ditemukan, tampilkan -->
    <?php if ($cariHasil): ?>
        <h3>Hasil Pencarian</h3>
        <p>ID: <?= $cariHasil->getId(); ?></p>
        <p>Nama: <?= $cariHasil->getNama(); ?></p>
         <p>Merk: <?= $cariHasil->getMerk(); ?></p>
        <p>Harga: Rp<?= number_format($cariHasil->getHarga(), 0, ',', '.'); ?></p>
        <p>Stok: <?= $cariHasil->getStok(); ?></p>
        <p><img src="<?= $cariHasil->getGambar(); ?>"></p>
    <?php endif; ?>

    <hr>

    <!-- Tabel Daftar Produk -->
    <h2>Daftar Produk</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
             <th>Merk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <!-- Looping semua produk dari session dan tampilkan -->
        <?php foreach ($_SESSION['produk'] as $p): ?>
        <tr>
            <td><?= $p->getId(); ?></td>
            <td><?= $p->getNama(); ?></td>
            <td><?= $p->getMerk(); ?></td>
            <td>Rp<?= number_format($p->getHarga(), 0, ',', '.'); ?></td>
            <td><?= $p->getStok(); ?></td>
            <td><img src="<?= $p->getGambar(); ?>"></td>
            <td><a href="?hapus=<?= $p->getId(); ?>">Hapus</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
