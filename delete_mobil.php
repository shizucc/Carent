<?php
include 'conn.php';
$no_plat_DELETE = $_GET['id'];

$sql = "DELETE FROM `data_mobil` WHERE `no_plat` = '$no_plat_DELETE'";
$query = mysqli_query($conn,$sql);
if($query){
    ?>
    <script>
        alert("Data Mobil berhasil dihapus");
        document.location = "katalog_admin.php";
    </script>

<?php
}

?>