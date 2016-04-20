<?php
session_start();
require 'connect.php';

mysql_query("UPDATE `nama_jasa_pengiriman` SET `status`=0 WHERE `id_nama_jasa`='$_GET[id_nama_jasa]'");


mysql_close($con);
header("location: nama_jasa_select.php");
?>