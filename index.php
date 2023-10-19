<?php  
include 'conn.php';
session_start();
?>



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
  <!-- ======= Header ======= -->
  <?php
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
              </a></li>
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
                <li><a href="katalog.php">Katalog</a></li>
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
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <?php 
          if(isset($_SESSION['username'])){
            ?>
            <h2 data-aos="fade-up">Halo, <?php echo $_SESSION['nama'] ?></h2>
            <br>
            <?php
          }
          ?>
          <h1 data-aos="fade-up">Pergi berlibur dengan keluarga, nyaman dan aman pastinya</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Kami menyediakan banyak jenis mobil untuk dirental, rental sekarang untuk perjalanan yang lebih nyaman</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">

              <div class="container">
                <div class="row">

                  <?php 
                  if(!isset($_SESSION['username'])){
                  ?>
                  <div class="col-sm">
                  <a href="register.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>Rental Sekarang</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                  </div>
                  <?php
                  }
                  ?>
                  

                  <div class="col-sm">
                    <a href="<?php 
                    if($_SESSION['role']=="owner"){
                      ?>
                      katalog_admin.php
                      <?php
                    } else {
                      ?>
                      katalog.php
                      
                      <?php
                      
                    }?> "
                    class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                      <span>Lihat Katalog</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>                  
                  </div>

                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-4 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/mobil.png" class="img-fluid2" alt="car" margin-top="50">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>Why Us?</p>
        </header>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Kenyamanan Transaksi</h3>
              <p>Ada berbagai jenis metode pembayaran, pilih pembayaran metode sesuai keinginanmu!</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Pelayanan Terbaik</h3>
              <p>Kami siap melayani pelanggan walau permintaanya aneh-aneh.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/values-3.png" class="img-fluid" alt="">
              <h3>Mekanik</h3>
              <p>Kami menyediakan mekanik untuk perawatan mobil serta cek mesin sebelum anda rental.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <!-- ======= Katalog Section ======= -->
    <div id="katalog" class="katalog">

      <div class="container" data-aos="fade-up">
        <header  class="section-header2">
          <p>Carent Car</p>
        </header>
        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box2">
              <img src="assets/img/mobil2.png" class="img-fluid" alt="">
              <h3>Alphard</h3>
              <p>Kendaraan ternyaman untuk anda yang ingin badan tetap bugar walau berpergian jauh. Pastikan kantong juga bugar ya! </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box2">
              <img src="assets/img/mobil3.png" class="img-fluid" alt="">
              <h3>Rush</h3>
              <p>Cocok untuk keluarga dengan ruang yang luas sehingga dapat berpergian dengan nyaman seperti di rumah sendiri.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box2">
              <img src="assets/img/mobil4.png" class="img-fluid" alt="">
              <h3>Veloz</h3>
              <p>Mobil ini juga memiliki kapasitas yang luas dan dengan body yang terlihat kokoh, tapi bukan china.</p>
            </div>
          </div>
        </div>
      </div>

    </div><!-- End katalog Section -->

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
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
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