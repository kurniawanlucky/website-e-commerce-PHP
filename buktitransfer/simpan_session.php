<?php
session_start();

//$_SESSION['id_merk']= $_GET['id_merk'];
$_SESSION['id_penjualan']=$_GET['id_penjualan'];
echo $_SESSION['id_merk'];
echo $_SESSION['id_kategori'];
header("location:lihatbukti_transfer.php");
?>