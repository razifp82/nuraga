<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuraga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/bg.jpg" type="image/x-icon">
</head>
<body>
<header>
        <a class="logo" href="/"><img src="/nuraga/images/logo/logo.pth.png" height="50px" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="organisasi.php">Beranda</a></li>
                    <li><a href="organisasi.php">Program</a></li>
                    <li><a href="organisasi.php">Tentang Kami</a></li>
                    <li><a href="daftar.php">Buat Kegiatan</a></li>
                    <li><a href="kegiatan.php">kegiatan saya</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </nav>
	
    </header>
    <section id="login">
        <div class="login">
    <br>
    <form>
        <label for="nama-kegiatan">Nama Kegiatan:</label>
        <input type="text" id="nama-kegiatan" name="nama-kegiatan" required>
        
        <label for="jenis-kegiatan">Jenis Kegiatan:</label>
        <input type="text" id="jenis-kegiatan" name="jenis-kegiatan" required>
        
        <label for="deskripsi-kegiatan">Deskripsi Kegiatan:</label>
        <textarea id="deskripsi-kegiatan" name="deskripsi-kegiatan" required></textarea>
        
        <label for="tanggal-kegiatan">Tanggal Kegiatan:</label>
        <input type="date" id="tanggal-kegiatan" name="tanggal-kegiatan" required>
        
        <label for="tanggal">Lokasi</label>
        <input type="text" id="Lokasi" name="Lokasi" required>
        
        <label for="dokumentasi">Dokumentasi (file):</label>
        <input type="file" id="dokumentasi" name="dokumentasi" required>
        
        <input type="submit" value="Submit">
    </form>
    <br></div></section>
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