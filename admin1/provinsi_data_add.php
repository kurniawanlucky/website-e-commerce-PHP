<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `provinsi`(`provinsi`) VALUES ('$_POST[nama]')");


mysql_close($con);
header("location: provinsi_select.php");
?>