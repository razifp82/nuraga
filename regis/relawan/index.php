<?php
session_start();

include "../../koneksi.php"; // Mengubah path include

// Fungsi untuk memeriksa keunikkan username pada tabel tertentu
function usernameIsUnique($username, $tableName, $conn) {
    // Lakukan kueri untuk memeriksa keunikkan username di tabel
    $query = "SELECT COUNT(*) as count FROM $tableName WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Ambil jumlah baris yang memiliki username yang sama
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    // Jika count == 0, berarti username unik
    return $count == 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $username = $_POST["username"];
    $alamat = $_POST["alamat"];
    $tanggal_lahir = date("Y-m-d", strtotime($_POST["tanggal_lahir"]));

    // Validasi username di tingkat PHP
    if (usernameIsUnique($username, 'admin', $conn) && usernameIsUnique($username, 'relawan', $conn) && usernameIsUnique($username, 'organisasi', $conn)) {
        // Lanjutkan dengan proses pendaftaran
        // ...
    } else {
        echo '<script>alert("Username sudah digunakan. Pilih username lain.");</script>';
    }

    if (empty($nama) || empty($email) || empty($password) || empty($jenis_kelamin) || empty($username) || empty($alamat) || empty($tanggal_lahir)) {
        echo '<script>alert("Harap isi semua bidang.");</script>';
    } else {
        // Melakukan escape string untuk menghindari SQL Injection
        $nama = $conn->real_escape_string($nama);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);
        $jenis_kelamin = $conn->real_escape_string($jenis_kelamin);
        $username = $conn->real_escape_string($username);
        $alamat = $conn->real_escape_string($alamat);
        $tanggal_lahir = $conn->real_escape_string($tanggal_lahir);

        // Hashing password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Menyiapkan query untuk menyimpan data ke dalam tabel relawan
        $sql = "INSERT INTO relawan (nama, email, password, jenis_kelamin, username, alamat, tanggal_lahir) VALUES ('$nama', '$email', '$hashed_password', '$jenis_kelamin', '$username', '$alamat', '$tanggal_lahir')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Pendaftaran berhasil! Selamat datang, ' . $nama . '!");</script>';
        } else {
            echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
        }

        // Menutup koneksi ke database
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>NURAGA</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
            <?php
            
            if (isset($_SESSION["user"], $_SESSION["userType"])) {
               
                switch ($_SESSION["userType"]) {
                    case 'admin':
                        header("Location: /nuraga/admin/admin.php?username=" . $_SESSION["user"]);
                        break;
                    case 'relawan':
                        header("Location: /nuraga/relawan/relawan.php?username=" . $_SESSION["user"]);
                        break;
                    case 'organisasi':
                        header("Location: /nuraga/organisasi/organisasi.php?username=" . $_SESSION["user"]);
                        break;
                    default:
                        
                        break;
                }
                exit();
            }
            ?>
                <div class="card-heading"></div>
                <div class="card-body">
                    <div class="top_link"><a href="\nuraga/index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Kembali ke halaman utama</a></div>
                    <br><br>
                    <h2 class="title">Pendaftaran relawan</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nama" name="nama">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Tanggal Lahir" name="tanggal_lahir">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="jenis_kelamin">
                                            <option disabled="disabled" selected="selected">Jenis Kelamin</option>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Alamat" name="alamat">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Username" name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="password">
                        </div>
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
