<?php
session_start();

include 'koneksi.php';

// Fungsi untuk melakukan login
function login($username, $password) {
    $conn = connectDB();

    // Hindari SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Enkripsi password dengan MD5
    $password = md5($password);

    // Tentukan tabel login berdasarkan username
    $tables = ['admin', 'relawan', 'organisasi'];

    foreach ($tables as $table) {
        $query = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // Login berhasil
            $_SESSION['user'] = $username;
            $_SESSION['userType'] = $table;

            // Set cookies
            setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 detik = 1 hari
            setcookie('userType', $table, time() + (86400 * 30), "/");

            switch ($table) {
                case 'admin':
                    header("Location: admin/admin.php?username=".$username);  
                    break;
                case 'relawan':
                    header("Location: relawan/relawan.php?username=".$username); 
                    break;
                case 'organisasi':
                    header("Location: organisasi/organisasi.php?username=".$username);  
                    break;
                default:
                    // Tambahkan penanganan kesalahan jika diperlukan
                    break;
            }
            exit();
        }
    }

    // Jika tidak ada kesesuaian, login gagal
    echo "Login failed. Check your username and password.";

    $conn->close();
}

// Proses formulir login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Panggil fungsi login
    login($username, $password);
}
?>




    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NURAGA</title>
        <link rel="icon" href="images/logo/icon.pth.png" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section class="login">
            <div class="login_box">
            <?php
            
            if (isset($_SESSION["user"], $_SESSION["userType"])) {
               
                switch ($_SESSION["userType"]) {
                    case 'admin':
                        header("Location: admin/admin.php?username=" . $_SESSION["user"]);
                        break;
                    case 'relawan':
                        header("Location: relawan/relawan.php?username=" . $_SESSION["user"]);
                        break;
                    case 'organisasi':
                        header("Location: organisasi/organisasi.php?username=" . $_SESSION["user"]);
                        break;
                    default:
                        
                        break;
                }
                exit();
            }
            ?>
                <div class="left">
                    <div class="top_link"><a href="index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Kembali ke halaman utama</a></div>
                    <div class="contact">
                        <form action="" method="post">
                            <h3>MASUK</h3>
                            <input type="text" value="<?php echo isset($username) ? $username : ''; ?>" name="username" class="input" placeholder="USERNAME">
                            <input type="password" name="password" class="input"  placeholder="PASSWORD">
                            <br><br>
                            <p>Belum punya akun? <a href="regis/relawan/index.php   ">Daftar Sekarang</a></p>
                            <button type="submit" value="login" class="submit">LET'S GO</button>
                            
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="right-text">
                        <h2><img src="images/logo/logo.pth.png" alt=""></h2>
                        <h5>PEDULI BERBAGI BERAKSI</h5>
                    </div>
                </div>
            </div>
        </section>
    </body>
    </html>
