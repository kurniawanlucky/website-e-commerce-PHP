<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `diskon`(`jumlah_barang`,`diskon`,`waktu`,`waktu_selesai`) VALUES ('$_POST[jumlah]','$_POST[diskon]','$_POST[mulai]','$_POST[selesai]')");


mysql_close($con);
header("location: diskon_select.php");
?>