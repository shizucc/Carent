<?php
include 'conn.php';
$filterMPV = $_GET['filterjenisMPV'];
$filterPickup = $_GET['filterjenisPickup'];
$filterSUV = $_GET['filterjenisSUV'];
$filterSedan = $_GET['filterjenisSedan'];
$filterJeep = $_GET['filterjenisJeep'];
$filterHatchback = $_GET['filterjenisHatchback'];

$filterTransmisiMatic = $_GET['filterTransmisiMatic'];
$filterTransmisiManual = $_GET['filterTransmisiManual'];
header('location:katalog.php')
?>