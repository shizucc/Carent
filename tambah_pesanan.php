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
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-6 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;padding:25px;">
              <div class="row g-0">

                    
                      
                      <?php 
                            $sql = "SELECT * FROM `data_mobil` WHERE `no_plat` = '$_GET[id]'";
                            $query = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($query);
                            if(isset($_POST['insertPesanan'])){
                                if(isset($_POST['jumlah_hari']) && $_POST['tanggal_ambil']){
                                    $username = $_SESSION['username'];
                                    $no_plat = $_GET['id'];
                                    $jumlah_hari = $_POST['jumlah_hari'];                            
                                    $tanggal_ambil = $_POST['tanggal_ambil'];
                                    $tanggal_kembali = $_POST['tanggal_kembali'];
                                    $deposit = 300000;

                                    $status = 'Menunggu';

                                    $id_layanan = $_POST['layanan_tambahan'];
                                    $sql = "SELECT `harga` FROM `layanan_tambahan` WHERE `id_layanan` = '$id_layanan'";
                                    $query = mysqli_query($conn,$sql);
                                    $rowLayanan = mysqli_fetch_array($query);

                                    $harga_layanan = $rowLayanan['harga'];

                                    if($_POST['trueSupir']=='on'){
                                      $sql = "SELECT `id_supir` FROM `supir` WHERE `status` = 'siap' ORDER BY RAND() LIMIT 1";
                                      $query = mysqli_query($conn, $sql);
                                      $idSupirRow = mysqli_fetch_array($query);
                                      $id_supir = $idSupirRow['id_supir'];
                                      $harga_supir = 300000;

                                      $sql = "UPDATE `supir` SET `status` = 'bertugas' WHERE `id_supir` = '$id_supir'";
                                      $query = mysqli_query($conn, $sql);

                                    } else {
                                      $id_supir = '';
                                      $harga_supir = 0;
                                    }
                                    $harga = ($row['harga_sewa'] * $jumlah_hari) + $harga_layanan + ($harga_supir*$jumlah_hari) + $deposit;

                                    $sql = "INSERT INTO `pesanan_user`(`username`, `no_plat`, `jumlah_hari`,`tanggal_ambil`,`tanggal_kembali`,`id_layanan`,`id_supir`,`harga`,`status`) VALUES(
                                        '$username',
                                        '$no_plat',
                                        '$jumlah_hari',
                                        '$tanggal_ambil',
                                        '$tanggal_kembali',
                                        '$id_layanan',
                                        '$id_supir',
                                        '$harga',
                                        '$status'
                                    )";
                                    $query = mysqli_query($conn,$sql);
                                    if($query){
                                        ?>
                                        <script>
                                        alert("Berhasil Menambah pesanan")
                                        document.location = "pesanan.php";
                                        </script>
                                        <?php
                                } 
                                } else {
                                    ?>
                                    <script>
                                        alert("Silahkan Lengkapi data")
                                    </script>
                                    <?php
                            
                            }
                                
                              
                            }
                            ?>

                    

                  <div class="col-md-4 gradient-custom text-center text-black",
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <br><br>
                    <div class='card-body p-4' style="width:300%;">
                        <div class="konten">
                           <div class='text-center'>
                                    <!-- Product name-->
                                    <h5><?php echo $row['merek'] ?></h5>
                                    <!-- Product price-->
                                     <h6><?php echo rupiah($row['harga_sewa']) ?> / Hari</h6>
                                </div>
                            </div>
                            <img class='card-img-top' src='assets/img/car/<?php echo $row['foto']?>' alt='...'>
                            </div> 
                        </div>
                                

                        <br>

                      <form action="tambah_pesanan.php?id=<?php echo $_GET['id'] ?>" method="post" style="padding-left:25px;">

                          <h6>Jumlah Hari</h6> 
                          <div class="row">
                            <div class="col">
                              <select name="jumlah_hari" id="jml_hari">
                                <option value="1">1 hari</option>
                                <option value="2">2 hari</option>
                                <option value="3">3 hari</option>
                                <option value="4">4 hari</option>
                                <option value="5">5 hari</option>
                                <option value="6">6 hari</option>
                                <option value="7">7 hari</option>
                              </select>
                            </div>
                          </div><br>

                          <?php 
                          $sql = "SELECT COUNT(*) AS 'jumlah_supir_tersedia' FROM `supir` WHERE `status` = 'siap'";
                          $query = mysqli_query($conn,$sql);
                          $rowSupir = mysqli_fetch_array($query);
                          ?>

                          <input type="checkbox" class="form-check-input" id="flexCheckDefault" name="trueSupir" 
                          <?php if($rowSupir['jumlah_supir_tersedia']==0){?> disabled <?php } ?>
                          >
                          <label class="form-check-label" for="flexCheckDefault"> Saya Perlu Supir</label>
                          <br><br>

                          
                          <p>Supir Tersedia : <?php echo $rowSupir['jumlah_supir_tersedia'] ?></p>
                         

                          <h6>Layanan Tambahan</h6> 
                          <div class="row">
                            <div class="col">
                              <select name="layanan_tambahan">
                                <option value="ADD00" selected>-</option>
                                <option value="ADD01">Snack</option>
                                <option value="ADD02">Bantal</option>
                              </select>
                            </div>
                          </div><br>

                          <h6>Tanggal Ambil</h6>
                          <input type="date" name="tanggal_ambil"  id="tgl_ambil"><br><br>
                          <h6>Tanggal kembali</h6>
                          <input type="date" name="tanggal_kembali"id="tgl_kembali"><br><br>
                          <h6>Syarat dan Ketentuan :</h6>
                          <ol>
                            <li>Bersedia di survey tempat tinggal/rumah dan kantor Pemohon paling lambat 3 hari sebelum jadwal sewa</li>
                            <li>Melengkapi persyaratan rental kendaraan</li>
                            <li>Bersedia diambil foto/video bersama dengan kendaraan yang direntalkan</li>
                            <li>Melakukan Booking kendaraan sebesar 50% dari harga rental paling lambat H-3 dari jadwal sewa setelah disetujui persyaratannya</li>
                            <li>Hitungan rental kendaraan adalah per hari sama dengan per tanggal</li>
                            <li>Wajib konfirmasi paling lambat 3 hari sebelum masa rental berakhir jika ingin perpanjangan rental</li>
                            <li>Bersedia membayar uang jaminan (deposit) yang akan dikembalikan penuh saat sewa berakhir jika tidak terjadi klaim asuransi atau tambahan biaya sewa</li>
                            <li>Penyewa akan dikenakan denda jika pengembalian melebihi batas waktu rental</li>
                          </ol>
                          <input type="checkbox" >&nbsp;Dengan menekan checkbox berarti anda menyetujui syarat dan ketentuan yang berlaku</input><br>
                        </div>
                        <div class="modal-footer">
                            <div style="padding:10px;">
                                <a href="katalog.php" class="btn btn-secondary">Kembali</a>
                                
                            </div>
                            <div style="padding:10px;">
                                <input type="submit" value="Buat Pesanan" name="insertPesanan" class="btn btn-primary">
                            </div>                         
                        </div>
                      </form>                    
                      </div>
                    </div>
                  </div>
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