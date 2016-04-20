
<?php
session_start();
require 'connect.php';

echo $_SESSION['id1'];
echo $_SESSION['idBarang'];
echo $tanggal=date("Y.m.d");

$q="INSERT INTO `komentar`(`id_member`, `id_barang`, `komentar`, `waktu`, `status`) VALUES ($_SESSION[id1],$_SESSION[idBarang],'$_POST[komentar]','$tanggal',0)";
echo $q;
mysql_query($q);


mysql_close($con);
header("location: komentar_barang.php");
?>