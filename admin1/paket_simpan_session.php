<?php
session_start();

//$_SESSION['id_merk']= $_GET['id_merk'];
$_SESSION['id_paket_barang']=$_GET['id_paket'];
echo $_SESSION['id_paket_barang'];
header("location: paket_select_daftar_barang.php");
?>	