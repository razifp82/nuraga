<?php
// ... (kode sebelumnya)

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_kegiatan'])) {
    $id_kegiatan = $_POST['id_kegiatan'];
    $id_relawan = $_SESSION['id_relawan'];

    $query = "UPDATE daftar SET lastUpdate = CURRENT_TIMESTAMP WHERE id_kegiatan = $id_kegiatan AND id_relawan = $id_relawan";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $response = array('success' => true, 'lastUpdated' => date('Y-m-d H:i:s'));
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'error' => mysqli_error($conn));
        echo json_encode($response);
    }
} else {
    // Permintaan tidak valid
    http_response_code(400);
    echo json_encode(array('success' => false, 'message' => 'Permintaan tidak valid'));
}
?>
