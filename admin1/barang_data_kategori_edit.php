<?php
require '../connect.php';

mysql_query("UPDATE `kategori1` SET `nama`='$_POST[nama]' WHERE id_kategori='$_POST[idkategori]'");


mysql_close($con);
header("location: barang_kategori_select.php");
?>