<?php
session_start();

include ".././koneksi.php";

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Users | Graindashboard UI Kit</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/img/favicon.ico">

    <!-- Template -->
    <link rel="stylesheet" href="public/graindashboard/css/graindashboard.css">
</head>
<body class="has-sidebar has-fixed-sidebar-and-header">    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="/">
                    <img class="img-fluid w-100" src="public/img/logo-mini.png" alt="Graindashboard">
                </a>
                <!-- End Logo For Mobile View -->
    
                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="/">
                    <img class="side-nav-show-on-closed" src="/nuraga/images/logo.htm.png  " alt="NURAGA" style="width: auto; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="/nuraga/images/logo.htm.png" alt="NURAGA" style="width: auto; height: 33px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>
    
            <div class="header-content col px-md-3">
                <div class="d-flex align-items-center">
                    <!-- Side Nav Toggle -->
                    <a  class="js-side-nav header-invoker d-flex mr-md-2" href="#"
                        data-close-invoker="#sidebarClose"
                        data-target="#sidebar"
                        data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->
                        
                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-2">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                            <span class="mr-md-2 avatar-placeholder">J</span>
                            <?php

// Ambil nilai $nama dari session jika ada
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';

// Tampilkan nilai $nama dalam elemen HTML jika $nama tidak kosong
if (!empty($nama)) {
    echo '<span class="d-none d-md-block">' . $nama . '</span>';
}
?>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>
    
                        <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                           
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php">
                        <span class="unfold-item-icon mr-3">
                          <i class="gd-power-off"></i>
                        </span>
                                    Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User Avatar -->
                </div>
            </div>
        </nav>
    </header>
    <main class="main">
        <!-- Sidebar Nav -->
        <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
              
                
               
    
                <!-- Users -->
                <li class="side-nav-menu-item side-nav-has-menu">
                    <a class="side-nav-menu-link media align-items-center" href="#"
                       data-target="#subUsers">
                      <span class="side-nav-menu-icon d-flex mr-3">
                        <i class="gd-user"></i>
                      </span>
                        <span class="side-nav-fadeout-on-closed media-body">Validasi Akun</span>
                        <span class="side-nav-control-icon d-flex">
                    <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                  </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>
    
                    <!-- Users: subUsers -->
                    <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="admin.php">Validasi</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="user-edit.php">Ubah Nilai Status</a>
                        </li>
                    </ul>
                    <!-- End Users: subUsers -->
                </li>
                <!-- End Users -->
    
            </ul>
        </aside>
        <!-- End Sidebar Nav -->
    <div class="content">
        <div class="py-4 px-3 px-md-4">
            <div class="card mb-3 mb-md-4">

                <div class="card-body">
                    <!-- Breadcrumb -->
                    <nav class="d-none d-md-block" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Ubah Nilai Status</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Users</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0">Users</div>
                    </div>


                    <!-- Users -->
                    <div class="table-responsive-xl">
                        <table class="table text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">Id</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Name</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Deskripsi</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Sosial Media</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Email</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

// Misalkan query untuk mengambil data dari tabel organisasi
$query = "SELECT id_organisasi,nama_organisasi, deskripsi_organisasi, status, sosial_media, email_organisasi FROM organisasi";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
while ($row = mysqli_fetch_assoc($result)) {
    $id_organisasi = $row['id_organisasi'];
    $nama_organisasi = $row['nama_organisasi'];
    $deskripsi_organisasi = $row['deskripsi_organisasi'];
    $sosial_media = $row['sosial_media'];
    $email_organisasi = $row['email_organisasi'];
    $status = $row['status'];

    // Tampilkan data dalam bentuk baris tabel HTML
    if ($status != 'none') {
    echo '<tr>
            <td class="py-3">'.$id_organisasi.'</td>
            <td class="align-middle py-3">
                <div class="d-flex align-items-center">
                    <div class="position-relative mr-2">
                        <span class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-success rounded-circle"></span>
                        <span class="avatar-placeholder mr-md-2">' . substr($nama_organisasi, 0, 1) . '</span>
                    </div>
                    ' . $nama_organisasi . '
                </div>
            </td>
            <td class="py-3">' . $deskripsi_organisasi . '</td>
            <td class="py-3">' . $sosial_media . '</td>
            <td class="py-3">' . $email_organisasi . '</td>
            <td class="py-3">
            <div class="position-relative">
            <button type="button" name="yes" class="btn btn-link" onclick="updateStatus(' . $id_organisasi . ', &quot;yes&quot;)">
                <i class="fas fa-check">✔️</i>
            </button>
            <button type="button" name="no" class="btn btn-link" onclick="updateStatus(' . $id_organisasi . ', &quot;no&quot;)">
                <i class="fas fa-times">✖</i>
            </button>
        </div>
            </td>
        </tr>';
}
}
?>
<script>
function updateStatus(idOrganisasi, status) {
    console.log('ID Organisasi:', idOrganisasi);
    console.log('Status:', status);

    // Lakukan AJAX request untuk mengubah status di tabel organisasi
    fetch('update_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id_organisasi=' + idOrganisasi + '&status=' + status,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Status berhasil diperbarui, lakukan aksi yang diperlukan (misalnya, tampilkan notifikasi)
            alert('Status berhasil diperbarui!');
        } else {
            // Gagal memperbarui status, tampilkan pesan error (misalnya, tampilkan notifikasi)
            alert('Gagal memperbarui status: ' + data.error);
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>


                            
                            </tbody>
                        </table>
                        
                </div>
            </div>


        </div>

    </div>
</main>


<script src="public/graindashboard/js/graindashboard.js"></script>
<script src="public/graindashboard/js/graindashboard.vendor.js"></script>

</body>
</html>