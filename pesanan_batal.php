<?php

include 'conn.php';
$pesanan_BATAL = $_GET['id'];
$sql = "UPDATE `pesanan_user` SET `status` = 'Batal' WHERE `kode_pesanan` = '$pesanan_BATAL'";
$query = mysqli_query($conn, $sql);
header("location:pesanan_user.php");
if(!$query){
    ?>
    <script>
        alert("Gagal Mengubah Status Pesanan");
    </script>
    <?php

}

?>