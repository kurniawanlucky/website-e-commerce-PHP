<?php
require '../connect.php';

mysql_query("DELETE FROM `bukti_transfer` WHERE `id_penjualan`='$_GET[id_penjualan]'");


mysql_close($con);
header("location: lihatbukti_transfer.php");
?>