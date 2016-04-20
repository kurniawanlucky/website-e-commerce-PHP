<?php
session_start();
require 'connect.php';

echo $q="UPDATE `komentar` SET `status`=1 WHERE id_komentar=$_GET[id_komentar]";
mysql_query($q);


mysql_close($con);
header("location: barang_select.php");
?>