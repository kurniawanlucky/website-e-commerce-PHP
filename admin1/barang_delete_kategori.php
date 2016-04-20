<?php
require 'connect.php';

mysql_query("UPDATE `kategori1` SET `ada`=0 WHERE id_kategori='$_GET[id_kategori]'");


mysql_close($con);
header("location: barang_kategori_select.php");
?>