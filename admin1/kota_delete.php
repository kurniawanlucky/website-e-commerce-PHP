<?php
session_start();
require 'connect.php';

mysql_query("DELETE FROM `kota` WHERE `id_kota`='$_GET[id_kota]'");


mysql_close($con);
header("location: kota_select.php");
?>