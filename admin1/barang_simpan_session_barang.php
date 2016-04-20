<?php
session_start();

//$_SESSION['id_merk']= $_GET['id_merk'];
$_SESSION['id_barang']=$_GET['id_barang'];
echo $_SESSION['id_barang'];
header("location: barang_gambar_select.php");
?>