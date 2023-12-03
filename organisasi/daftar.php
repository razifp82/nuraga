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
    
    <div class="px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Daftar Kegiatan</h3>
            <div class="card" style="border-width: 0px;">
                <form class="form-card" id="eventForm" action="save_data.php" method="post" onsubmit="return validateForm()">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group flex-column d-flex">
                                <label for="deskripsi_kegiatan" class="form-control-label px-3">Nama Kegiatan<span class="text-danger"> *</span></label>
                                <input type="text" id="deskripsi_kegiatan" name="deskripsi_kegiatan" placeholder="" onblur="validate(4)">
                            </div>
                        </div>

                        <!-- Right Columns -->
                        <div class="col-md-6">
                            <div class="form-group flex-column d-flex">
                                <label for="deskripsi_kegiatan" class="form-control-label px-3">Lokasi<span class="text-danger"> *</span></label>
                                <input type="text" id="deskripsi_kegiatan" name="deskripsi_kegiatan" placeholder="" onblur="validate(4)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group flex-column d-flex">
                                <label for="deskripsi_kegiatan" class="form-control-label px-3">Jenis Kegiatan<span class="text-danger"> *</span></label>
                                <input type="text" id="deskripsi_kegiatan" name="deskripsi_kegiatan" placeholder="" onblur="validate(4)">
                            </div>
                        </div>

                        <!-- Right Columns -->
                        <div class="col-md-6">
                            <div class="form-group flex-column d-flex">
                                <label for="deskripsi_kegiatan" class="form-control-label px-3">Deskripsi Kegiatan<span class="text-danger"> *</span></label>
                                <input type="text" id="deskripsi_kegiatan" name="deskripsi_kegiatan" placeholder="" onblur="validate(4)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group flex-column d-flex">
                                <label for="tanggal" class="form-control-label px-3">Tanggal<span class="text-danger"> *</span></label>
                                <input type="date" id="tanggal" name="tanggal" placeholder="" onblur="validate(4)">
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group flex-column d-flex text-center">
                                <label for="gambar" class="form-control-label px-3">Gambar<span class="text-danger"> *</span></label>
                                <input type="text" id="gambar" name="gambar" placeholder="" onblur="validate(6)">
                                <br>
                                <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center" id="doneButton">Done</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Structure -->
    <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalContent">Are you sure you want to submit the form?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-rd95JB4TXw2TQQv1jDEZZR4l/np0U9aWTftSIUmto9IPAg6Q3PjigKFJoCnq2UpZ" crossorigin="anonymous"></script>

   
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
</body>

</html>