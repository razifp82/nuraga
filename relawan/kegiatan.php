<?php
session_start();

include ".././koneksi.php";

if (!isset($_SESSION["user"]) || !isset($_SESSION["userType"])) {
    header("location: /nuraga/login.php");
    exit;
}

if ($_SESSION["userType"] !== 'relawan') {
    // Redirect ke halaman yang sesuai dengan hak akses pengguna
    switch ($_SESSION["userType"]) {
        case 'admin':
            header("Location: /nuraga/admin/admin.php?username=" . $_SESSION["user"]);
            break;
        case 'organisasi':
            header("Location: /nuraga/organisasi/organisasi.php?username=" . $_SESSION["user"]);
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
            <li><a href="relawan.php">Beranda</a></li>
            <li><a href="relawan.php">Program</a></li>
            <li><a href="relawan.php">Tentang Kami</a></li>
            <li><a href="kegiatan.php">Cari kegiatan</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
</header>
<div class="container my-3">
    <br>
    <div class="search-container">
        <form method="get" action="kegiatan.php">
            <input type="text" name="search" id="search" placeholder="Search..."> <button type="submit">Search</button>
           
        </form>
    </div>
    <br>
    <div class="container my-3">
        <br>
        </br>
        <div class="row">
            <?php
            // Ambil nilai pencarian dari parameter URL
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            // Query untuk mengambil data kegiatan dari database dengan status 'belum' dan sesuai dengan kata kunci pencarian
            $query = "SELECT id_kegiatan, nama_kegiatan, organisasi, lokasi, tanggal_kegiatan, deskripsi_kegiatan, dokumentasi, status FROM kegiatan WHERE status = 'belum'";

            // Tambahkan kondisi pencarian jika ada kata kunci pencarian
            if (!empty($search)) {
                $search = $conn->real_escape_string($search);
                $query .= " AND (nama_kegiatan LIKE '%$search%' OR organisasi LIKE '%$search%' OR lokasi LIKE '%$search%' OR tanggal_kegiatan LIKE '%$search%' OR deskripsi_kegiatan LIKE '%$search%')";
            }

            $result = $conn->query($query);

            // Periksa apakah query berhasil dijalankan
            if ($result) {
                // Tampilkan konten HTML
                while ($row = $result->fetch_assoc()) {
                    $id_kegiatan = $row['id_kegiatan'];
                    $nama_kegiatan = $row['nama_kegiatan'];
                    $nama_organisasi = $row['organisasi'];
                    $lokasi = $row['lokasi'];
                    $tanggal_kegiatan = $row['tanggal_kegiatan'];
                    $deskripsi = $row['deskripsi_kegiatan'];
                    $dokumentasi = $row['dokumentasi'];
                    $status = $row['status'];

                    echo '<div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="row no-gutters"> 
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-center" contentEditable="true" oninput="updateCardContent(this, \'title\')">' . $nama_kegiatan . '</h5>
                                            <p class="card-text"><i class="bi bi-people-fill"></i> <span contentEditable="true" oninput="updateCardContent(this, \'organisasi\')">' . $nama_organisasi . '</span></p>
                                            <p class="card-text"><i class="bi bi-geo-alt-fill"></i> <span contentEditable="true" oninput="updateCardContent(this, \'location\')">' . $lokasi . '</span></p>
                                            <p class="card-text"><i class="bi bi-calendar-date-fill"></i> <span contentEditable="true" oninput="updateCardContent(this, \'date\')">' . $tanggal_kegiatan . '</span></p>
                                            <p class="card-text" contentEditable="true" oninput="updateCardContent(this, \'description\')">' . $deskripsi . '</p>
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-primary" onclick="completeActivity(' . $id_kegiatan . ')">Gabung</button>
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
            } else {
                // Tampilkan pesan jika query gagal
                echo "Error: " . $query . "<br>" . $conn->error;
            }

            // Tutup koneksi ke database
            $conn->close();
            ?>
            <style>
                body {
                    background: radial-gradient(#d61212, #332042);
                }
            </style>

            <div class="row">
                <div class="col-md-5">

                </div>
                <div class="col-md-5">

                </div>
                <div class="col-md-5">

                </div>
            </div>
        </div>

        <script>
            function updateCardContent(element, property) {
                const content = element.innerText;
                const card = element.closest('.card');

                switch (property) {
                    case 'title':
                        card.querySelector('.card-title').innerText = content;
                        break;
                    case 'organisasi':
                        card.querySelector('.card-text i.bi-people-fill + span').innerText = content;
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
                }
            }
        </script>

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
