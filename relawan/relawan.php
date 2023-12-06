<?php
session_start();

include ".././koneksi.php";

$query = "SELECT * FROM kegiatan WHERE status = 'selesai'";
$result = $conn->query($query);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>NURAGA</title>
    <link rel="icon" href="images/logo/icon.pth.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a class="logo" href="/"><img src="/nuraga/images/logo/logo.pth.png" height="50px" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#programs">Program</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="kegiatan.php">Cari Kegiatan</a></li>
                    <li><?php
                    include'notif.php' ?></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </nav>
	
    </header>

    <section id="hero" >
        <div class="hero-content">
            <h1 style="height: 30px;">Hai, <?php echo ucfirst( $_SESSION['nama']); ?>!</h1>
            <p>  senang melihat Anda kembali! Kami sangat menghargai kontribusi Anda sebagai relawan. </p>
            <p>Mari bersama-sama menjadikan dunia ini tempat yang lebih baik.</p>
            
        </div>
    </section>

<?php

?>

<section id="programs">
        <div class="program-content">
            <section class="articles">
                <?php
                // Loop melalui hasil query dan menampilkan data kegiatan
                while ($row = $result->fetch_assoc()) {
                    $nama_kegiatan = $row['nama_kegiatan'];
                    $deskripsi_kegiatan = $row['deskripsi_kegiatan'];
                    $dokumentasi = $row['dokumentasi'];
                ?>
                    <article>
                        <div class="article-wrapper">
                            <figure>
                                <img src="/nuraga/organisasi/upload/<?php echo $dokumentasi; ?>" alt="" />
                            </figure>
                            <div class="article-body">
                                <h2><?php echo $nama_kegiatan; ?></h2>
                                <p>
                                    <?php echo $deskripsi_kegiatan; ?>
                                </p>
                                <a href="#" class="read-more">
                                    Read more <span class="sr-only">about <?php echo $nama_kegiatan; ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php
                }
                ?>
            </section>
        </div>
    </section>
        </div>
    </section>

    <section id="about">
        <div class="about-content">
            <img src="/nuraga/images/logo/logo.htm.png" alt="">
            <br>
            <h2 align="center">Nuraga adalah website online yang mempertemukan organisasi sosial yang membutuhkan relawan dengan siapapun yang ingin menjadi relawan, dan juga memudahkan para relawan mencari suatu kegiatan sosial. Mimpi besar kami adalah melihat kegiatan menjadi relawan sebagai gaya hidup. Di mana relawan bukan lagi kegiatan sosial yang eksklusif tapi sudah menjadi kebiasaan masyarakat Indonesia. Misi utama kami yakni ingin membuat kolaborasi antara relawan dengan organisasi/komunitas dengan misi sosial menjadi lebih mudah melalui platform nuraga</h2>
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

