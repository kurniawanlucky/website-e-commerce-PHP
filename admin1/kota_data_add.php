<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `kota`(`kota`,id_provinsi) VALUES ('$_POST[nama]','$_POST[provinsi]')");


mysql_close($con);
header("location: kota_select.php");
?>