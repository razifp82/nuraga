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

// Panggil fungsi connectDB untuk mendapatkan koneksi
$conn = connectDB();

if (!isset($_SESSION["user"]) || !isset($_SESSION["userType"])) {
    header("location: /nuraga/login.php");
    exit;
}

if (isset($_GET["usertype"]) && $_GET["usertype"] !== $_SESSION["userType"]) {
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
    exit;
}

if (isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // Periksa apakah file adalah gambar
    if (getimagesize($file["tmp_name"])) {
        $imageData = file_get_contents($file["tmp_name"]);
        $encodedImageData = base64_encode($imageData);

        // Simpan gambar di database
        $username = $_SESSION["user"];
        $userType = $_SESSION["userType"];

        $stmt = $conn->prepare("UPDATE kegiatan SET dokumentasi = ? WHERE username = ? AND userType = ?");
        $stmt->bind_param("sss", $encodedImageData, $username, $userType);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Foto berhasil diunggah.";
        } else {
            echo "Gagal mengunggah foto.";
        }

        $stmt->close();
    } else {
        echo "File yang diunggah bukan gambar.";
    }
} else {
    echo "Pilih file gambar terlebih dahulu.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>
</head>
<body>
    <h1>HALO <?php echo ucfirst($_SESSION["userType"]); ?></h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Pilih Foto:</label>
        <input type="file" name="file" id="file" accept="image/*">
        <input type="submit" value="Upload">
    </form>

    <p><a href="logout.php">LOGOUT</a></p>
</body>
</html>
