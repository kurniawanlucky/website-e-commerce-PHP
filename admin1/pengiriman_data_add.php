<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `pengiriman`( `id_kota`, `id_nama_jasa`, `ekonomi`, `ekspres`, `minimal_berat`, `status`) VALUES ('$_POST[kota]','$_POST[nama_jasa]','$_POST[ekonomi]','$_POST[ekspres]','$_POST[minimal_berat]',1)");


mysql_close($con);
header("location: pengiriman_select.php");
?>