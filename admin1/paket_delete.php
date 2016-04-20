<?php
require 'connect.php';

mysql_query("DELETE FROM `paket_barang` WHERE id_paket_barang='$_GET[id_paket]'");

echo $_GET['id_paket'];
mysql_close($con);
header("location: paket_select.php");
?>