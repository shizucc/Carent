<?php

include 'conn.php';
$usr_DELETE = $_GET['id'];
$sql = "DELETE FROM `pesanan_user` WHERE `username` = '$usr_DELETE'";
$query = mysqli_query($conn,$sql);
$sql = "DELETE FROM `user` WHERE `username` = '$usr_DELETE'";
$query = mysqli_query($conn,$sql);
if($query){
    ?>
    <script>
        alert("User Berhasil dihapus");
    </script>
    <?php
} else {
    ?>
    <script>
        alert("Gagal Menghapus User");
    </script>
    <?php
}
header("location:data_user.php");

?>