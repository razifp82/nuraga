<?php
session_start();

function connectDB() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "nuraga";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_organisasi = $_POST["nama_organisasi"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sosial_media = $_POST["sosial_media"];
    $username = $_POST["username"];
    $ketua_organisasi = $_POST["ketua_organisasi"];
    $deskripsi_organisasi = $_POST["deskripsi_organisasi"];

    if (empty($nama_organisasi) || empty($email) || empty($password) || empty($sosial_media) || empty($username) || empty($ketua_organisasi) || empty($deskripsi_organisasi)) {
        $error_message = "Harap isi semua bidang.";
    } else {
        // Membuat koneksi ke database
        $conn = connectDB();

        // Melakukan escape string untuk menghindari SQL Injection
        $nama_organisasi = $conn->real_escape_string($nama_organisasi);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);
        $sosial_media = $conn->real_escape_string($sosial_media);
        $username = $conn->real_escape_string($username);
        $ketua_organisasi = $conn->real_escape_string($ketua_organisasi);
        $deskripsi_organisasi = $conn->real_escape_string($deskripsi_organisasi);

        // Hashing password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Menyiapkan query untuk menyimpan data ke dalam tabel relawan
        $sql = "INSERT INTO organisasi (nama_organisasi, email, password, sosial_media, username, ketua_organisasi, deskripsi_organisasi) VALUES ('$nama_organisasi', '$email', '$hashed_password', '$sosial_media', '$username', '$ketua_organisasi', '$deskripsi_organisasi')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Pendaftaran berhasil! Selamat datang, $nama_organisasi!";
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
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
                <div class="card-heading"></div>
                <div class="card-body">
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
                    <div class="top_link"><a href="\nuraga/index.html"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Kembali ke halaman utama</a></div>
<br><br>
                    <h2 class="title">Pendaftaran organisasi</h2>
                    <?php
                    if (isset($error_message)) {
                        echo '<div style="color: red;">' . $error_message . '</div>';
                    } elseif (isset($success_message)) {
                        echo '<div style="color: green;">' . $success_message . '</div>';
                    }
                    ?>
                    <form method="POST" onsubmit="return validateForm()">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nama Organisasi" name="nama_organisasi">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Sosial Media" name="sosial_media">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Ketua Organisasi" name="ketua_organisasi">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Deskripsi Organisasi" name="deskripsi_organisasi">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Username" name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Passowrd" name="password">
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
