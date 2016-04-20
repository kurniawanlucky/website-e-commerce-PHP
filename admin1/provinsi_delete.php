<?php
session_start();
require 'connect.php';

mysql_query("DELETE FROM `provinsi` WHERE `id_provinsi`='$_GET[id_provinsi]'");


mysql_close($con);
header("location: provinsi_select.php");
?>