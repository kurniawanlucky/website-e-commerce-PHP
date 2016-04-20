<?php
require 'connect.php';

mysql_query("DELETE FROM `detail_paket` WHERE id_detail_paket='$_GET[id_paket]'");


mysql_close($con);
header("location: paket_select_daftar_barang.php");
?>