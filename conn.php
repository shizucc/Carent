<?php 
error_reporting(E_ALL ^ E_DEPRECATED AND E_NOTICE AND E_WARNING);
$username = 'localhost';
$user = 'root';
$password = '';
$db = 'rental_mobil_ads';

$conn = mysqli_connect($username, $user, $password, $db) or die("Connect failed");
// function rupiah($angka){
	
// 	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
// 	return $hasil_rupiah;
  
// }
?>