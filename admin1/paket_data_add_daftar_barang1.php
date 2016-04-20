<?php
session_start();
require 'connect.php';
echo $_SESSION['id_detail_paket'];
mysql_query("UPDATE `detail_paket` SET `jumlah`='$_POST[jumlah]' WHERE `id_detail_paket`='$_SESSION[id_detail_paket]'");

echo $_POST['jumlah'];
mysql_close($con);
header("location: paket_select_daftar_barang.php");
?>