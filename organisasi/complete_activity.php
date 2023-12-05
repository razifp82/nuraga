<?php
include ".././koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_kegiatan"])) {
    $id_kegiatan = $_POST["id_kegiatan"];

    // Update status kegiatan menjadi 'selesai'
    $updateQuery = "UPDATE kegiatan SET status = 'selesai' WHERE id_kegiatan = '$id_kegiatan'";
    $updateResult = $conn->query($updateQuery);

    if ($updateResult) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
