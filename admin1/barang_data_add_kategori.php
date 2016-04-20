<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `kategori1`(`nama`, `ada`) VALUES ('$_POST[nama]',1)");


mysql_close($con);
header("location: barang_kategori_select.php");
?>