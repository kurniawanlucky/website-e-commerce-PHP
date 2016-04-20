<?php
session_start();
require 'connect.php';

mysql_query("UPDATE `nama_jasa_pengiriman` SET `nama_jasa`='$_POST[nama_jasa]',`keterangan`='$_POST[keterangan]' WHERE `id_nama_jasa`='$_POST[idnama_jasa]'");


mysql_close($con);
header("location: nama_jasa_select.php");
?>