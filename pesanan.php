<?php
include 'conn.php';
session_start();
function rupiah($angka){
	
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
  
}
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
  <link rel="stylesheet" href="assets/css/style.css">

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
                <li><a class="nav-link scrollto" href="register.php">Daftar  /</a></li>
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
          <h2 class="judul" style="margin-top:5%;">Pesanan Saya</h2>
            <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">      
            <?php 
            $usr = $_SESSION['username'];
            $sql = "SELECT * FROM `pesanan_user` WHERE `username` = '$usr' ORDER BY `tanggal_pesan` DESC ";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)){
              ?>
                <div class="col col-lg-6 mb-4 mb-lg-0" style="width: 100%;">
            <div class="card mb-3" style="border-radius: .5rem;">
                      <h4 class="judul-pesanan" style="margin-left: 40px; margin-top: 10px;"><?php echo $row['tanggal_pesan'] ?></h4>
                      <hr class="mt-0 mb-4">
                    <?php 
                     $sql_mobil = "SELECT * FROM `data_mobil` WHERE `no_plat`= '$row[no_plat]'";
                     $query_mobil = mysqli_query($conn,$sql_mobil);
                     $row_mobil = mysqli_fetch_array($query_mobil);
                    ?>
                    <div class="row g-0">
                      <div class="col">
                        <img src="assets/img/car/<?php echo $row_mobil['foto'] ?>" alt="foto mobil" style="object-fit:fill; width: 300px;padding: 20px;margin-left: 20px;">
                        <h5 class="judul-pesanan" style="margin-left: 40px; margin-top: 10px;"><?php echo $row_mobil['merek'];?></h5>
                        <h5 class="judul-pesanan" style="margin-left: 40px; margin-top: 10px;"><?php echo rupiah($row['harga']) ?></h5>
                        <p class="judul-pesanan">(Rp. 300.000 akan dikembalikan apabila mobil kembali dengan baik)</p>
                        <h5 class="judul-pesanan" style="margin-left: 40px; margin-top: 10px;"><?php echo "( ". $row['jumlah_hari'] . " Hari )" ?></h5>
                      </div>
                      <div class="col">
                        <h5 class="tanggal">Tanggal Ambil</h5>
                        <h5 class="tanggal"><?php echo $row['tanggal_ambil'] ?></h5>
                        <hr class="mt-0 mb-4">
                        <h5 class="tanggal">Tanggal Kembali</h5>
                        <h5 class="tanggal"><?php echo $row['tanggal_kembali'] ?></h5>
                        <hr class="mt-0 mb-4">

                        <?php
                        
                        $sql = "SELECT * FROM `layanan_tambahan` WHERE `id_layanan` = '$row[id_layanan]'";
                        $rowLayanan = mysqli_fetch_array(mysqli_query($conn,$sql));
                        $nama_layanan = $rowLayanan['nama_layanan'];
                        ?>
                        <h5 class="tanggal"> Layanan Tambahan : <?php echo $nama_layanan ?></h5>

                        <?php
                        $sql = "SELECT * FROM `supir` WHERE `id_supir` = '$row[id_supir]'";
                        $rowSupir = mysqli_fetch_array(mysqli_query($conn,$sql));
                        $nama_supir = $rowSupir['username'];

                        ?>
                        <h5 class="tanggal"> Supir : <?php echo $nama_supir  ?></h5>
                        <br>
                        <h5 class="tanggal">Status : <?php echo $row['status'] ?></h5>

                      </div>
                      
                    </div>
                  </div>
                
      
               

  <?php
  }
  
  ?>    
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