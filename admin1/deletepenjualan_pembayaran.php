<?php
require 'connect.php';

mysql_query("update `penjualan` set `ada`=0 where `id_penjualan`=$_GET[id_penjualan]");
mysql_close($con);
header("location: pembayaran.php");
?>