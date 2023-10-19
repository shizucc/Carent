<?php
include 'conn.php';
if(isset($_POST['registerForm'])) {
    $nama = $_POST['namaForm'];
    $username = $_POST['usernameForm'];
    $password = $_POST['passwordForm'];
    $repassword = $_POST['repasswordForm'];
    $email = $_POST['emailForm'];
    $igForm = $_POST['igForm'];
    $no_telepon = $_POST['noTelpForm'];
    $ktp = $_FILES['ktpForm']['name'];
    $sim = $_FILES['simForm']['name'];

    if($password == $repassword){
        $sql = "INSERT INTO `user` (`nama`, `username`, `password`, `email`,`ig_acc`,`no_hp`, `foto_ktp`, `foto_sim`, `role`) VALUES (
            '$nama', 
            '$username', 
            '$password', 
            '$email',
            '$igForm',
            '$no_telepon', 
            '$ktp', 
            '$sim', 
            'user'
        )";
        if(!empty($_FILES)&& isset($_FILES['ktpForm'])&& isset($_FILES['simForm'])){
          $ktp = $_FILES['ktpForm']['name'];
          $sim = $_FILES['simForm']['name'];

          $locKtp = "assets/img/usr/imgktp/".$ktp;
          $locSim = "assets/img/usr/imgsim/".$sim;

          if(move_uploaded_file($_FILES['ktpForm']['tmp_name'], $locKtp)){
            echo "<p>Upload KTP file successfully</p>";
          } else {
            echo "<p>Upload KTP file failed</p>";
          }

          if(move_uploaded_file($_FILES['simForm']['tmp_name'], $locSim)){
            echo "<p>Upload SIM file successfully</p>";
          } else {
            echo "<p>Upload SIM file failed</p>";
          }
        }
        $query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Berhasil Register")
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Ada form yang tidak tepat")
        </script>
        <?php
    }

}

?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
            crossorigin="anonymous">
        </script>
        <style>
            .bg-image-vertical {
                position: relative;
                overflow: hidden;
                background-repeat: no-repeat;
                background-position: right center;
                background-size: auto 100%;
            }

            .btn-info {
                color: #fff;
                background-color: #000000;
            }

            .form{
              margin: auto;
              margin-top: 70px;
              width: 50%;
              padding: 10px;
              align-items: center;
            }

            @media (min-width: 1025px) {
                .h-custom-2 {
                height: 100%;
            }
            }
        </style>
    </head>
    <body>
    <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Carent</span>
        </div>

        <div class="form">

          <form style="width: 23rem;" method='POST' enctype="multipart/form-data">

            <h3 class="mb-3 pb-3" style="letter-spacing: 1px; text-align: center;">Register</h3>


            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name='namaForm' placeholder="Nama">
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name='usernameForm' placeholder="Username">
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name='passwordForm' placeholder="Password">
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name='repasswordForm' placeholder="Ketik Ulang Password">
            </div>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example18" class="form-control form-control-lg" name='emailForm' placeholder="Email (Opsional)">
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name='igForm' placeholder="Akun Instagram (Opsional)">
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name='noTelpForm' placeholder="Nomor Telepon">
            </div>

          
            <div class="form-outline mb-4">
            <label class="form-label" for="customFile">Foto KTP</label>
            <input type="file" class="form-control" id="ktpForm" name="ktpForm" />
            </div>

            <div class="form-outline mb-4">
            <label class="form-label" for="customFile">Foto SIM</label>
            <input type="file" class="form-control" id="simForm" name="simForm" />
            </div>



            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg btn-block" type="submit" value="Register" name="registerForm">
            </div>


            <p>Sudah punya akun? <a href="login.php" class="link-info">Login</a></p>
            <p>Syarat dan ketentuan dapat dilihat di <a href="bantuan.php" class="link-info">sini</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block" style="padding:300px;">
        <img src="assets/img/mobil.png"
          alt="Login image" style="object-fit: cover; object-position: left; margin-top: 100px; margin-left: 100px; scale: 1.3;">
      </div>
    </div>
  </div>
</section>
    </body>
</html>
