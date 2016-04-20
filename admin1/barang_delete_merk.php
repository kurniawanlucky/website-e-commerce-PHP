<?php
require '../connect.php';

mysql_query("UPDATE `merk1` SET `ada`=0 WHERE id_merk='$_GET[id_merk]'");


mysql_close($con);
header("location: barang_merk_select.php");
?>