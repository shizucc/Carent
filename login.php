<?php
session_start();
include 'conn.php';
if(isset($_POST['loginForm'])){
    $inputForm = $_POST['inputForm'];
    $password = $_POST['passwordForm'];

    $sql = "SELECT * FROM `user` WHERE (`username` = '$inputForm' OR `email` = '$inputForm' OR `no_hp` = '$inputForm') AND `password` = '$password'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($query);
    if($row['username']!=""){
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['no_hp'] = $row['no_hp'];
        $_SESSION['foto_ktp'] = $row['foto_ktp'];
        $_SESSION['foto_sim'] = $row['foto_sim'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['foto_profil'] = $row['foto_profil'];

        ?>
        <script>
            alert("Login successful");
            document.location = "index.php"
        </script>
        <?php
    } else
    ?>
    <script>
        alert("Login failed");
        document.location = "login.php";
    </script>
    <?php
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
              margin-top: 150px;
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

        <form style="width: 23rem;" method='POST'>

          <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

          <div class="form-outline mb-4">
            <input type="text" id="form2Example18" class="form-control form-control-lg" name='inputForm' placeholder="Username/Email/Telepon">
            
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="form2Example28" class="form-control form-control-lg" name='passwordForm' placeholder="Password">
            
          </div>

          <div class="pt-1 mb-4">
            <input class="btn btn-info btn-lg btn-block" type="submit" value="Login" name="loginForm">
          </div>

        <p>Belum Mempunyai Akun? <a href="register.php" class="link-info">Daftar disini!</a></p>
        <p>Syarat dan ketentuan dapat dilihat di <a href="bantuan.php" class="link-info">sini</a></p>

      </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block" style="padding:300px;">
        <img src="assets/img/mobil.png"
          alt="Login image" style="object-fit: cover; object-position: left; margin-left: 100px; scale: 1.3;">
      </div>
    </div>
  </div>
</section>
    </body>
</html>

