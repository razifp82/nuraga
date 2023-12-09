<div class="dropdown">
                <div class="user-pic">
                    <img src="/nuraga/images/profil_relawan.png" alt="Profile Picture" class="user-pic" height="50px">
                    <div class="dropdown-option">
                        <p class="putih"><?php echo ucfirst( $_SESSION['nama']); ?></p>
                        
                        <p class="putih"><?php echo ucfirst( $_SESSION['tanggal_lahir']); ?></p>
                        
                        <p class="putih"><?php echo ucfirst( $_SESSION['email']); ?></p>
                       
                        <img src="/nuraga/images/logout.png" class="logout-img">
                        <a><a href="logout.php">Logout</a></a>
                        <hr>
                    </div>
            </div>