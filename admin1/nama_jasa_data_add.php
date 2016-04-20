<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `nama_jasa_pengiriman`(`nama_jasa`,`keterangan`,`status`) VALUES ('$_POST[nama]','$_POST[keterangan]',1)");


mysql_close($con);
header("location: nama_jasa_select.php");
?>