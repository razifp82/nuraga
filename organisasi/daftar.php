<?php
session_start();

include ".././koneksi.php";

global $conn;

$conn = connectDB();


if (!isset($_SESSION["user"]) || !isset($_SESSION["userType"])) {
    header("location: /nuraga/login.php");
    exit;
}

if ($_SESSION["userType"] !== 'organisasi') {
    switch ($_SESSION["userType"]) {
        case 'admin':
            header("Location: /nuraga/admin/admin.php?username=" . $_SESSION["user"]);
            break;
        case 'relawan':
            header("Location: /nuraga/relawan/relawan.php?username=" . $_SESSION["user"]);
            break;
        default:
            header("Location: /nuraga/login.php");
            break;
    }
    exit;
}

// Proses form jika ada pengiriman data melalui POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['dokumentasi'])) {
    $nama_kegiatan = $_POST["nama-kegiatan"];
    $jenis_kegiatan = $_POST["jenis-kegiatan"];
    $deskripsi_kegiatan = $_POST["deskripsi-kegiatan"];
    $tanggal_kegiatan = $_POST["tanggal-kegiatan"];
    $lokasi = $_POST["Lokasi"];

    // Proses file dokumentasi
    $nama_file = $_FILES['dokumentasi']['name'];
    $ukuran_file = $_FILES['dokumentasi']['size'];
    $tipe_file = $_FILES['dokumentasi']['type'];
    $tmp_file = $_FILES['dokumentasi']['tmp_name'];

    // Simpan file ke direktori tertentu (misalnya: upload/)
    $upload_dir = "upload/";
    $upload_path = $upload_dir . $nama_file;

    // Pindahkan file ke direktori upload
    if (move_uploaded_file($tmp_file, $upload_path)) {
        // Implementasikan penyimpanan data ke database, sesuaikan dengan struktur tabel Anda
        $query = "INSERT INTO kegiatan (nama_kegiatan, jenis_kegiatan, deskripsi_kegiatan, tanggal_kegiatan, lokasi, dokumentasi,organisasi) 
                  VALUES ('$nama_kegiatan', '$jenis_kegiatan', '$deskripsi_kegiatan', '$tanggal_kegiatan', '$lokasi', '$nama_file','$id_organisasi')";

        if ($conn->query($query) === TRUE) {
            // Redirect ke halaman kegiatan setelah berhasil menyimpan
            header("Location: /nuraga/organisasi/organisasi.php?username=" . $_SESSION["user"]);
            exit;
        } else {
            // Hapus file yang sudah diupload jika gagal menyimpan ke database
            unlink($upload_path);
            // Tampilkan pesan error jika gagal menyimpan
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuraga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/bg.jpg" type="image/x-icon">
</head>

<body>
    <header>
        <a class="logo" href="/"><img src="/nuraga/images/logo/logo.pth.png" height="50px" alt="logo"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="organisasi.php">Beranda</a></li>
                <li><a href="organisasi.php">Program</a></li>
                <li><a href="organisasi.php">Tentang Kami</a></li>
                <li><a href="daftar.php">Buat Kegiatan</a></li>
                <li><a href="kegiatan.php">Kegiatan Saya</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section id="login">
        <div class="login">
            <br>
            <form method="POST" enctype="multipart/form-data">
                <label for="nama-kegiatan">Nama Kegiatan:</label>
                <input type="text" id="nama-kegiatan" name="nama-kegiatan" required>

                <label for="jenis-kegiatan">Jenis Kegiatan:</label>
                <input type="text" id="jenis-kegiatan" name="jenis-kegiatan" required>

                <label for="deskripsi-kegiatan">Deskripsi Kegiatan:</label>
                <textarea id="deskripsi-kegiatan" name="deskripsi-kegiatan" required></textarea>

                <label for="tanggal-kegiatan">Tanggal Kegiatan:</label>
                <input type="date" id="tanggal-kegiatan" name="tanggal-kegiatan" required>

                <label for="tanggal">Lokasi</label>
                <input type="text" id="Lokasi" name="Lokasi" required>

                <label for="dokumentasi">Dokumentasi (file):</label>
                <input type="file" id="dokumentasi" name="dokumentasi" required>

                <input type="submit" value="Submit">
            </form>
            <br>
        </div>
    </section>

    <section id="contact">
        <div class="contact-content">
            <h2>Kontak</h2>
            <p>Email: nuraga@gmail.com</p>
            <p>Telepon: 123-456-7890</p>
        </div>
    </section>

    <footer>
        <p>Hak Cipta &copy; 2023 NURAGA</p>
    </footer>
</body>

</html>
