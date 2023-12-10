<?php
// Function to get the last update timestamp of a kegiatan
function getLastUpdatedTimestamp($idKegiatan) {
    global $conn;

    $query = "SELECT lastUpdate FROM kegiatan WHERE id_kegiatan = $idKegiatan";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return strtotime($row['lastUpdate']);
    }

    return 0;
}

// Get id_kegiatan and id_relawan from session
$idKegiatan = $_SESSION['id_kegiatan'];
$idRelawan = $_SESSION['id_relawan'];

// Get the last update timestamp of the kegiatan
$serverLastUpdated = getLastUpdatedTimestamp($idKegiatan);

// Compare timestamps and send response
if ($serverLastUpdated > $_POST['client_last_updated']) {
    // Update the notification message
    $notif = 'Salah Satu Kegiatan Yang Anda Ikuti Telah Melakukan Perubahan!';
    echo json_encode(['status' => 'changes', 'notif' => $notif]);
} else {
    echo json_encode(['status' => 'no_changes']);
}
?>
