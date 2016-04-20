<?php
session_start();
require 'connect.php';

mysql_query("DELETE FROM `diskon` WHERE `id_diskon`='$_GET[id_diskon]'");


mysql_close($con);
header("location: diskon_select.php");
?>