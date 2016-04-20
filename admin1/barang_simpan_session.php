<?php
session_start();

//$_SESSION['id_merk']= $_GET['id_merk'];
$_SESSION['id_kategori']=$_GET['id_kategori'];
echo $_SESSION['id_merk'];
echo $_SESSION['id_kategori'];
header("location: barang_select.php");
?>