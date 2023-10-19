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
  
  <!-- Filter : Jenis, Transmisi, Kapasitas -->

            <div class="container px-4 px-lg-5 mt-5">
              <h2 class="judul">Katalog Mobil</h2>
              <div align="center">
                <form action="katalog_admin.php" method="GET" name="formFilter">
                    <div class="filter">
                      <h3>Jenis</h3>
                      <input type="checkbox" class="btn-check" name="filterjenisSemua" id="filterSemua" value="Semua">
                      <label class="btn btn-secondary" for="filterSemua">Semua</label>

                      <input type="checkbox" class="btn-check"  name="filterjenisMPV" id="filterMPV" value="MPV">
                      <label class="btn btn-secondary"  for="filterMPV">MPV</label>

                      <input type="checkbox" class="btn-check"  name="filterjenisPickup" id="filterPickup" value="Pick Up">
                      <label class="btn btn-secondary"  for="filterPickup">PickUp</label>

                      <input type="checkbox" class="btn-check"  name="filterjenisSUV" id="filterSUV" value="SUV">
                      <label class="btn btn-secondary"  for="filterSUV">SUV</label>

                      <input type="checkbox" class="btn-check"  name="filterjenisSedan" id="filterSedan" value="Sedan">
                      <label class="btn btn-secondary"  for="filterSedan">Sedan</label>

                      <input type="checkbox" class="btn-check"  name="filterjenisJeep" id="filterJeep" value="Jeep">
                      <label class="btn btn-secondary"  for="filterJeep">Jeep</label>

                      <input type="checkbox" class="btn-check"  name="filterjenisHatchback" id="filterHatchback" value="Hatchback">
                      <label class="btn btn-secondary"  for="filterHatchback">Hatchback</label>
          

                    </div>
                    
                  </div>
                <input class= "btn btn-primary mb-2" type="submit" name='submitFilter' value = "Filter">
                <a href="tambah_mobil.php" class= "btn btn-primary mb-2">Tambah Mobil</a>
                </form>
                

              <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
                <?php 
                $filterMPV = '';
                $filterPickup = '';
                $filterSUV = '';
                $filterSedan = '';
                $filterJeep = '';
                $filterHatchback = '';
                $filterTransmisiMatic = '';
                $filterTransmisiManual ='';
                $filterKapasitas4 = '';
                $filterKapasitas5 = '';
                $filterKapasitas6 = '';
                $filterKapasitas7 = '';

                $sql_plus_kapasitas = '';
                $sql_plus_transmisi = '';
                $sql_plus_jenis = "WHERE `jenis` != ''";;

                $sql = "SELECT * FROM `data_mobil` ";

                if(isset($_GET['submitFilter'])){
                  if(!isset($_GET['filterjenisSemua'])){
                    if(isset($_GET['filterjenisMPV'])){
                      $filterMPV = $_GET['filterjenisMPV'];
                    }
                    if(isset($_GET['filterjenisPickup'])){
                      $filterPickup = $_GET['filterjenisPickup'];
                    }
                    if(isset($_GET['filterjenisSUV'])){
                      $filterSUV = $_GET['filterjenisSUV'];
                    }
                    if(isset($_GET['filterjenisSedan'])){
                      $filterSedan = $_GET['filterjenisSedan'];
                    }
                    if(isset($_GET['filterjenisJeep'])){
                      $filterJeep = $_GET['filterjenisJeep'];
                    }
                    if(isset($_GET['filterjenisHatchback'])){
                      $filterHatchback = $_GET['filterjenisHatchback'];
                    }
                    $sql_plus_jenis = "WHERE (
                      `jenis` = '$filterMPV' OR 
                      `jenis` = '$filterPickup' OR 
                      `jenis` = '$filterJeep' OR 
                      `jenis` = '$filterHatchback' OR 
                      `jenis`= '$filterSedan' OR 
                      `jenis` = '$filterSUV'
                      ) ";
                  } else {
                    $sql_plus_jenis = "WHERE `jenis` != ''";
                  }

                  
                  
                
                  $sql_complete = $sql . $sql_plus_jenis;
                } 
                $sql_complete = $sql . $sql_plus_jenis;
                $query = mysqli_query($conn,$sql_complete);
                while($row = mysqli_fetch_array($query)){

                  ?>
                  <div class='col mb-5'>
                        <div class='card h-100'>
                            <!-- Product image-->
                            <img class='card-img-top' src='assets/img/car/<?php echo $row['foto']?>' alt='...' width='50px' />
                            <!-- Product details-->
                            <div class='card-body p-4'>
                                <div class='text-center'>
                                    <!-- Product name-->
                                    <h5 class='fw-bolder'><?php echo $row['merek'] ?></h5>
                                    <!-- Product price-->
                                    <?php echo rupiah($row['harga_sewa']) ?> / Hari
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                <div class='text-center'>
                                <a class='btn btn-outline-dark mt-auto' 
                                href="" data-bs-target="#staticBackdrop<?php echo $row['no_plat'] ?>" data-bs-toggle="modal">Lihat</a></div>
                            </div>
                        </div>
                    </div>



                    
                    <div class="modal fade" id="staticBackdrop<?php echo $row['no_plat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $row['merek'] ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
                          </div>
                          <div class="modal-body">
                          <div class="container-fluid">
                              <div class="row">
                                <div class="col">
                                  <div class="card">
                                  <img src="assets/img/car/<?php echo $row['foto']?>" class="card-img-top" width="100%">
                                  <div class="card-body">
                                  <div class="d-flex flex-row justify-content-between mb-0 px-3">
                                    <small class="text-muted mt-1">Harga Sewa</small>
                                    <h6><?php echo rupiah($row['harga_sewa']) ?> / Hari</h6>
                                  </div>
                                  <hr class="mt-2 mx-3">
                                  <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                    <div class="d-flex flex-column"><span class="text-muted">Kapasitas Penumpang</span><small class="text-muted">Tidak Termasuk Supir&ast;</small></div>
                                    <div class="d-flex flex-column"><h5 class="mb-0"><?php echo $row['kapasitas_penumpang'] ?></h5><small class="text-muted text-right">(Dewasa)</small></div>
                                  </div>
                                  <div class="d-flex flex-row justify-content-between p-3 mid">
                                    <div class="d-flex flex-column"><span class="text-muted mb-1">Jenis Mobil</small><div class="d-flex flex-row"><div class="d-flex flex-column ml-1"><h5 class="mb-0"><?php echo $row['jenis'] ?></h5></div></div></div>
                                    <div class="d-flex flex-column"><span class="text-muted mb-1">Transmisi</small><div class="d-flex flex-row"><h5 class="mb-0"><?php echo $row['transmisi'] ?></h5></div></div>
                                  </div>
                                  
                                </div>
                                
                              </div>
                              <br>
                                  <p align="justify" class="text-justify"><?php echo $row['deskripsi'] ?></p>
                                </div>
                                
                              </div>
                              
                            </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $row['no_plat'] ?>">Hapus</button>
                            <a type="button" href="edit_mobil.php?id=<?php echo $row['no_plat'] ?>" class="btn btn-primary">Edit Data</a>
                          </div>
                        

                        </div>
                      </div>
                    </div> 
                    
                                    <!-- modal hapus -->
                      <div class="modal fade" id="hapus<?php echo $row['no_plat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Anda yakin ingin menghapus data mobil ini?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a type="button" href="delete_mobil.php?id=<?php echo $row['no_plat'] ?>"  class="btn btn-primary">Yakin</a>
                          </div>
                        </div>
                      </div>
                    </div>
                      <!-- end modal hapus -->



                  <?php
                }  ?>

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