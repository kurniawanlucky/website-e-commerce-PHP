<?php
session_start();
require 'connect.php';

mysql_query("UPDATE `provinsi` SET `provinsi`='$_POST[provinsi]' WHERE `id_provinsi`='$_POST[idprovinsi]'");


mysql_close($con);
header("location: provinsi_select.php");
?>