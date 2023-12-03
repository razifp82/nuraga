<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laporan kegiatan</title>
    <link rel="stylesheet" href="style.css">
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
    <div class="center">
      <h1>Laporan Kegiatan</h1>
      <div class="textarea">
        <form action="/form/submit" method="post">
          <textarea name="textarea" rows="15" cols="70" placeholder=" Hasil Laporan"></textarea>
          <br>
          <button type="submit" class="submit">Submit</button>
					
          
        </form>
        </div>
        
    </div>
    
    
</body>
</html>

