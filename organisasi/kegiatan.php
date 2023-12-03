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
    <div class="container my-3">

<br>

</br>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="row no-gutters"> 
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-center" contentEditable="true" oninput="updateCardContent(this, 'title')">Sosialisasi</h5>
                        <p class="card-text"><i class="bi bi-geo-alt-fill"></i> <span contentEditable="true" oninput="updateCardContent(this, 'location')">Bengkong Indah 2</span></p>
                        <p class="card-text"><i class="bi bi-calendar-date-fill"></i> <span contentEditable="true" oninput="updateCardContent(this, 'date')">1 Apr 2024 - 1 Mei 2024</span></p>
                        <p class="card-text">Deskripsi Kegiatan</p>
                            
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary">Selesai</a>
                            <button class="btn btn-warning ms-2" onclick="editCard(this)"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger ms-2" onclick="deleteCard(this)"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="/nuraga/images/bg.jpg" class="card-img" alt="Card Image" style="width: 100%; height: 100%; object-fit: cover;" contentEditable="true" oninput="updateCardContent(this, 'imageAlt')">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="row no-gutters"> 
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sosialisasi</h5>
                        <p class="card-text"><i class="bi bi-geo-alt-fill"></i> Bengkong Indah 2</p>
                        <p class="card-text"><i class="bi bi-calendar-date-fill"></i> 1 Apr 2024 - 1 Mei 2024</p>
                        <p class="card-text">Deskripsi Kegiatan</p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary">Selesai</a>
                            <button class="btn btn-warning ms-2" onclick="editCard(this)"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger ms-2" onclick="deleteCard(this)"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="/nuraga/images/bg.jpg" class="card-img" alt="Card Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="row no-gutters"> 
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sosialisasi</h5>
                        <p class="card-text"><i class="bi bi-geo-alt-fill"></i> Aktivitas Virtual</p>
                        <p class="card-text"><i class="bi bi-calendar-date-fill"></i> 1 Apr 2024 - 1 Mei 2024</p>
                        <p class="card-text">Deskripsi Kegiatan</p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary">Selesai</a>
                            <button class="btn btn-warning ms-2" onclick="editCard(this)"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger ms-2" onclick="deleteCard(this)"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="/nuraga/images/bg.jpg" class="card-img" alt="Card Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="row no-gutters"> 
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sosialisasi</h5>
                        <p class="card-text"><i class="bi bi-geo-alt-fill"></i> Bengkong Indah 2</p>
                        <p class="card-text"><i class="bi bi-calendar-date-fill"></i> 1 Apr 2024 - 1 Mei 2024</p>
                        <p class="card-text">Deskripsi Kegiatan</p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary">Selesai</a>
                            <button class="btn btn-warning ms-2" onclick="editCard(this)"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger ms-2" onclick="deleteCard(this)"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="/nuraga/images/bg.jpg" class="card-img" alt="Card Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="row no-gutters"> 
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sosialisasi</h5>
                        <p class="card-text"><i class="bi bi-geo-alt-fill"></i> Bengkong Indah 2</p>
                        <p class="card-text"><i class="bi bi-calendar-date-fill"></i> 1 Apr 2024 - 1 Mei 2024</p>
                        <p class="card-text">Deskripsi Kegiatan</p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary">Selesai</a>
                            <button class="btn btn-warning ms-2" onclick="editCard(this)"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger ms-2" onclick="deleteCard(this)"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="/nuraga/images/bg.jpg" class="card-img" alt="Card Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
            
        </div>
    </div>
    <style>
</style>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="row no-gutters"> 
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sosialisasi</h5>
                        <p class="card-text"><i class="bi bi-geo-alt-fill"></i> Bengkong Indah 2</p>
                        <p class="card-text"><i class="bi bi-calendar-date-fill"></i> 1 Apr 2024 - 1 Mei 2024</p>
                        <p class="card-text">Deskripsi Kegiatan</p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary">Selesai</a>
                            <button class="btn btn-warning ms-2" onclick="editCard(this)"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger ms-2" onclick="deleteCard(this)"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="/nuraga/images/bg.jpg" class="card-img" alt="Card Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
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
    