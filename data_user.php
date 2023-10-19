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
      <div style="padding:5%;">
      <h1 align="center">Data User</h1>
      <table class="table table-bordered" style="width:80%;margin-top: 5%;" align="center">
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Foto SIM</th>
                        <th scope="col">Foto KTP</th>
                        <th scope="col">Foto Profil</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Hapus</th>
                <?php 
                $sql = "SELECT * FROM `user` WHERE `role` != 'owner' ORDER BY `nama` ASC";
                $query = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['no_hp'] ?></td>
                        <td><img height="100px" src="assets/img/usr/imgsim/<?php echo $row['foto_sim'] ?>" alt="Belum disetel"></td>
                        <td><img height="100px" src="assets/img/usr/imgktp/<?php if($row['foto_ktp']!=""){echo $row['foto_ktp']; } else { ?> person-4-512.png <?php }  ?>" alt="Belum disetel"></td>
                        <td><img height="100px" src="assets/img/usr/imgprfl/<?php echo $row['foto_profil'] ?>" alt="Belum disetel"></td>
                        <td><a href="edit_data_user.php?id=<?php echo $row['username'] ?>"><button type="button" class="btn btn-primary" name="edit">Edit</button></a></td>
                        <td><button type="button" class="btn btn-danger" name="edit" data-bs-target="#hapus<?php echo $row['username'] ?>" data-bs-toggle="modal">Hapus</button></td>

                    </tr>

                    <!-- modal hapus -->
                    <div class="modal fade" id="hapus<?php echo $row['username'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Anda yakin ingin menghapus data user <?php echo $row['nama'] ?>?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a type="button" href="delete_user.php?id=<?php echo $row['username'] ?>"  class="btn btn-primary">Yakin</a>
                          </div>
                        </div>
                      </div>
                    </div>
                      <!-- end modal hapus -->
                    <?php
                }
                ?> 
                </table>
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