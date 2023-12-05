<?php
session_start();

include ".././koneksi.php";

// ...

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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NURAGA</title>
    <link rel="icon" href="images/logo/icon.pth.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8H+0aNCIn1w4/4RM79XEOGQl47c4sDO/MEbqmbek5B+6EAg1PTXBRQDbh8Rw" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f8f9fa; /* Light gray background color */
        }
    </style>

</head>
<body>
<header>
        <a class="logo" href="organisasi.php"><img src="/nuraga/images/logo/logo.pth.png" height="50px" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="organisasi.php">Beranda</a></li>
                    <li><a href="organisasi.php">Program</a></li>
                    <li><a href="organisasi.php">Tentang Kami</a></li>
                    <li><a href="daftar.php">Buat Kegiatan</a></li>
                    <li><a href="kegiatan.php">Kegiatan saya</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
	
    </header>
    <div class="container my-3">

<br>

</br>

<div class="row">
<?php
// Query untuk mengambil data kegiatan dari database
$query = "SELECT nama_kegiatan, lokasi, tanggal_kegiatan, deskripsi_kegiatan, dokumentasi FROM kegiatan";
$result = $conn->query($query);

// Periksa apakah query berhasil dijalankan
if ($result) {
    // Tampilkan header HTML dan navigasi
   
    // Tampilkan konten HTML
    while ($row = $result->fetch_assoc()) {
        $id_kegiatan = $row['id_kegiatan']; // Asumsi nama kolom adalah 'id_kegiatan'
        $nama_kegiatan = $row['nama_kegiatan'];
        $lokasi = $row['lokasi'];
        $tanggal_kegiatan = $row['tanggal_kegiatan'];
        $deskripsi = $row['deskripsi_kegiatan'];
        $dokumentasi = $row['dokumentasi'];
        $status = $row['status']; // Asumsi nama kolom adalah 'status'
    
        echo '<div class="col-md-6 mb-4">
                <div class="card">
                    <div class="row no-gutters"> 
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title text-center" contentEditable="true" oninput="updateCardContent(this, \'title\')">' . $nama_kegiatan . '</h5>
                                <p class="card-text"><i class="bi bi-geo-alt-fill"></i> <span contentEditable="true" oninput="updateCardContent(this, \'location\')">' . $lokasi . '</span></p>
                                <p class="card-text"><i class="bi bi-calendar-date-fill"></i> <span contentEditable="true" oninput="updateCardContent(this, \'date\')">' . $tanggal_kegiatan . '</span></p>
                                <p class="card-text" contentEditable="true" oninput="updateCardContent(this, \'description\')">' . $deskripsi . '</p>
                                
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary" onclick="completeActivity(' . $id_kegiatan . ')">Selesai</button>
                                    <button class="btn btn-warning ms-2" onclick="editCard(this)"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-danger ms-2" onclick="deleteActivity(' . $id_kegiatan . ')"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="/nuraga/organisasi/upload/' . $dokumentasi . '" class="card-img" alt="Card Image" style="width: 100%; height: 100%; object-fit: cover;" contentEditable="true" oninput="updateCardContent(this, \'imageAlt\')">
                        </div>
                    </div>
                </div>
            </div>';
    }
    
    // Bebaskan hasil query
    $result->free_result();
    
    ?>
</br>
</div>
        <style>
    body {
        background-image: url('/nuraga/images/bg.jpg');
        background-size: cover; /* Adjust the size to cover the entire background */
        background-position: center; /* Center the background image */
        background-repeat: no-repeat; /* Prevent the background image from repeating */
    }
</style>
    <!-- Add your content here, such as cards or a list of activities -->
    <div class="row">
        <div class="col-md-5">
            <!-- Your content goes here -->
        </div>  
        <div class="col-md-5">
            <!-- Your content goes here -->
        </div>
        <div class="col-md-5">
            <!-- Your content goes here -->
        </div>
    </div>
</div>
<!-- Add this script to your page -->
<script>
    function updateCardContent(element, property) {
        // Retrieve the edited content and update the corresponding property
        const content = element.innerText;
        const card = element.closest('.card');
        
        switch (property) {
            case 'title':
                card.querySelector('.card-title').innerText = content;
                break;
            case 'location':
                card.querySelector('.card-text i.bi-geo-alt-fill + span').innerText = content;
                break;
            case 'date':
                card.querySelector('.card-text i.bi-calendar-date-fill + span').innerText = content;
                break;
            case 'imageAlt':
                card.querySelector('.card-img').alt = content;
                break;
            // Add more cases for other editable content
        }
    }

    function completeActivity(id_kegiatan) {
            // Menggunakan AJAX untuk mengirim permintaan ke server
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'complete_activity.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Handle response, if needed
                    console.log('Activity marked as completed.');
                } else {
                    console.error('Failed to complete activity.');
                }
            };
            xhr.send('id_kegiatan=' + id_kegiatan);
        }

        function deleteActivity(id_kegiatan) {
            // Menggunakan AJAX untuk mengirim permintaan ke server
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_activity.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Handle response, if needed
                    console.log('Activity deleted.');
                } else {
                    console.error('Failed to delete activity.');
                }
            };
            xhr.send('id_kegiatan=' + id_kegiatan);
        }
</script>

<!-- Add a footer section if needed -->
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
<style>
    .card-text i.bi-geo-alt-fill,
    .card-text i.bi-calendar-date-fill {
        color: #e74c3c;
    }
</style>

</body>
</html>
    