<?php

require"koneksi.php";

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NURAGA</title>
    <link rel="icon" href="images/logo/icon.pth.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a class="logo" href="/"><img src="images/logo/logo.pth.png" height="50px" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#programs">Program</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                </ul>
            </nav>
            
            <a class="cta" href="login.php">Masuk</a>
            <input type="checkbox" id="modal" />
<label for="modal" class="cta">Daftar
	<i class="fa fa-fire" aria-hidden="true"></i>
</label>
<label for="modal" class="modal-bg"></label>
<div class="modal-content">
	<label for="modal" class="close">
		<i class="fa fa-times" aria-hidden="true"></i>
	</label>
	<header>
		<h2 style="color: aliceblue;">Pendaftaran</h2>
	</header>
	<article class="content">
        <center>
		<p>Bergabung dengan Nuraga sebagai organisasi atau sebagai relawan</p></center>
	</article>
	<footer>
		<a href="regis/relawan/index.php" target="_parent" class="button success"> <img src="images/relawan.png" alt="" height="100px" width="20px">RELAWAN</a>
        <a href="regis/organisasi/index.php" target="_parent" class="button success"> <img src="images/organisasi.png" alt="" height="100px">ORGANISASI</a>
    </footer>
	
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
            
            <p class="menu cta">Menu</p>
    </header>

    <section id="hero" >
        <div class="hero-content">
            <h1 style="height: 30px;">NURAGA</h1>
            <p>Platform untuk berkontribusi dan membantu sesama </p>
            <br>
            <a href="login.php" class="btn">Gabung Sekarang</a>
        </div>
    </section>

<?php

?>

    <section id="programs">
        <div class="program-content">
        <section class="articles">
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/1011/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/1005/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/103/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
</section>
        </div>
    </section>

    <section id="about">
        <div class="about-content">
            <h2>Tentang Kami</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc id aliquam tincidunt, nunc nunc ultrices nunc, id lacinia nunc nunc id nunc. Sed auctor, nunc id aliquam tincidunt, nunc nunc ultrices nunc, id lacinia nunc nunc id nunc.</p>
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
