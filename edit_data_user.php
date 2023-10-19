
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Carent</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php
    include 'conn.php';
    session_start();
    if(isset($_SESSION['username'])){
      ?>
      <!-- Navbar If Login -->
      <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="index.php" class="logo d-flex align-items-center">
            <span class="logonav1">Carent</span>
          </a>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
              <li><a class="nav-link scrollto" href="bantuan.php">Bantuan</a></li>
              <li><a href= <?php if($_SESSION['role'] == "owner") { echo "katalog_admin.php";} else { echo "katalog.php";} ?>>Katalog</a></li>
              <li class="nav-item dropdown">
                <li class="bi bi-person"></li>
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama'] ?></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <?php if($_SESSION['role'] != "owner"){
                    ?>
                      <a class="dropdown-item" href="data_diri.php">Data Diri</a>
                      <a class="dropdown-item" href="pesanan.php">Pesanan</a>
                    <?php
                    } else {
                      ?>
                      <a class="dropdown-item" href="data_user.php">Daftar User</a>
                      <a class="dropdown-item" href="pesanan_user.php">Daftar Pesanan</a>
                      <?php
                    } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
              </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
        

        </div>
      </header><!-- End Header -->
    
      <?php
      } else {
      ?>
      <header id="header" class="header fixed-top">
          <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
              <span class="logonav1">Carent</span>
            </a>

            <nav id="navbar" class="navbar">
              <ul>
                <li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
                <li><a class="nav-link scrollto" href="bantuan.php">Bantuan</a></li>
                <li><a href= <?php if($_SESSION['role'] == "owner") { echo "katalog_admin.php";} else { echo "katalog.php";} ?>>Katalog</a></li>
                <li><a class="nav-link scrollto" href="register.php">Daftar</a></li>
                <li><a class="getstarted scrollto" href="login.php">Login</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

          </div>
        </header><!-- End Header -->
      <?php
      }
      ?>
  <!-- Katalog -->
  
  <!-- Card Profile -->
 
  <div class="card-profile">
    <section style="background-color: #f4f5f7;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-6 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">           
              <div class="row g-0" id="editData">
                <div class="col-md-4 gradient-custom text-center text-black",
                  style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                  <br><br>
                  <form action="edit_data_user.php" method="post">

                  <?php 
                  $username_UPD = $_GET['id'];
                  $sql = "SELECT * FROM `user` WHERE `username` = '$username_UPD'";
                  $query = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_array($query);


                  if(isset($_POST['update'])){
                    $nama = $_POST['nama'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $no_hp = $_POST['no_hp'];
                    $fotoProfil = $_POST['fotoProfil'];


                    $sql = "
                    UPDATE `user` SET 
                    `nama` = '$nama' , 
                    `username` = '$username' , 
                    `email` = '$email' ,
                    `foto_profil` = '$fotoProfil' ,
                    `no_hp` = '$no_hp' WHERE 
                    `username` = '$username'
                    ";

                    if(!empty($_FILES)&& isset($_FILES['fotoProfil'])){
                        $profil = $_FILES['fotoProfil']['name'];
                        $locProfil = "assets/img/usr/imgprfl/".$profil;
              
                        if(move_uploaded_file($_FILES['fotoProfil']['tmp_name'], $locProfil)){
                          echo "<p>Upload KTP file successfully</p>";
                        } else {
                          echo "<p>Upload KTP file failed</p>";
                        }
              
                      }

                    $query = mysqli_query($conn,$sql);
                    if($query){
                      ?>
                      <script>
                        alert("Data user berhasil diubah")
                        document.location = "data_user.php"
                      </script>
                      <?php
                    }
                    
                  }

                  ?>

                        <img class="rounded-circle" style="height: 150px"  src="assets/img/usr/imgprfl/<?php 
                      if(isset($row['foto_profil'])) {
                        echo $row['foto_profil'];
                      }
                      else { ?>person-4-512.png<?php }
                      ?>"
                        alt="Avatar" class="img-fluid my-5" style="width: 80px;" >
                        <br>
                      <h5><?php echo $row['nama'] ?></h5>
                      <p><?php echo $row['role'] ?></p>

                        <input class="ganti" name="fotoProfil" type="file" value="Ganti Foto">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-4">
                        <h5 align="center">Edit Data Diri</h5>
                        <hr class="mt-0 mb-4">
                          <div class="row pt-1">
                            <div class="col-6 mb-3">
                                <input type="text" name="nama" placeholder="Nama" value=<?php echo $row['nama'] ?>>
                            </div>
                            <div class="col-6 mb-3">
                                <input type="text" name="username" placeholder="Username" value=<?php echo $row['username'] ?>>
                            </div>
                          </div>
                        
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">

                          <div class="col-6 mb-3">
                            <input type="email" name="email" placeholder="Email" value=<?php echo $row['email'] ?>>
                          </div>
                          <div class="col-6 mb-3">
                            <input type="int" name="no_hp" placeholder="Nomor HP" value=<?php echo $row['no_hp'] ?>>
                          </div>
                        </div>
                        <hr class="mt-0 mb-4">
                        
                        <div>
                          <input type="text" name="re_password" placeholder="Password" style="width: 100%;" value=<?php echo $row['password'] ?>>
                        </div>
                        <div class="row pt-1">
                          <div class="col-6 mb-3 ">
                            <a href="data_diri.php">
                              <input type="submit" class="batal" onclick="location.href='data_diri.php';" value="Batal">
                            </a>
                            
                          </div>
                          <div class="col-6 mb-3 " >
                            <input type="submit" class="tombol" name="update" value="Update">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  
              </div>
            </div>

            </div>
          </div>
        </div>
      </div> 
    </section>
  </div>                
                    

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Carent</span>
            </a>
            <p>Carent adalah platform perentalan mobil yang beroperasi di Purbalingga. Kenyamanan pelanggan juga merupakan kenyamanan kami. </p>
          </div>

          <div class="col-lg-2 col-6 footer-links">
          </div>
          <div class="col-lg-3 col-6 footer-links">
              <h4>Contact Us</h4>
              <p>
                <strong>Phone:</strong> +62 938 9283 3212<br>
                <strong>Email:</strong> carent@gmail.com<br>
              </p>
              
          </div>

          <div class="col-lg-2 col-md-12 footer-contact text-center text-md-start">
            <h4>Address</h4>
            <p>
              Kalimanah, Purbalingga <br>
              Jawa Tengah 53371<br>
              Indonesia<br><br>
              
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Carent2022</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></h$sql>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>