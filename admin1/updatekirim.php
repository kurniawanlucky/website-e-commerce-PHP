<?php
require 'connect.php';

mysql_query("update `penjualan` set `status`=4 where `id_penjualan`=$_GET[id_penjualan]");

mysql_close($con);
header("location: dikemas.php");
?>