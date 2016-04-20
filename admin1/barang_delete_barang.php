<?php
require 'connect.php';

mysql_query("UPDATE `barang` SET `jumlah_stock`=0 WHERE id_barang='$_GET[id_barang]'");


mysql_close($con);
header("location: barang_select.php");
?>