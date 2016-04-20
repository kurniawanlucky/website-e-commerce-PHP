<?php
session_start();

$_SESSION['id_merk']= $_GET['id_merk'];
echo $_SESSION['id_merk'];
header("location: barang_kategori_select.php");
?>