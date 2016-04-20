<?php
session_start();
require 'connect.php';

echo $q="DELETE FROM `komentar` WHERE id_komentar=$_GET[id_komentar]";
mysql_query($q);


mysql_close($con);
header("location: barang_select.php");
?>