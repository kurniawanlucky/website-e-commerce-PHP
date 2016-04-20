<?php
session_start();
require 'connect.php';

mysql_query("UPDATE `kota` SET `kota`='$_POST[kota]' WHERE `id_kota`='$_POST[idkota]'");


mysql_close($con);
header("location: kota_select.php");
?>