<?php
include 'conn.php';

$tempUsername = $_POST['username'];
$nama = $_POST['namaForm'];
$username = $_POST['usernameForm'];
$email = $_POST['emailForm'];
$nohp = $_POST['nohpForm'];
$password = $_POST['passwordForm'];

if($password == $_SESSION['password']){
  $sql = "UPDATE `user` SET 
  `nama` = '$nama' , 
  `username` = '$username' , 
  `email` = '$email' , 
  `no_hp` = '$nohp' 
  WHERE `username` = '$tempUsername";

  $query = mysqli_query($conn,$sql);
}

if(isset($_POST['updateForm'])){
   
  }

?>