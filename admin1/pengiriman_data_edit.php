<?php
session_start();
require 'connect.php';
echo $q="UPDATE `pengiriman` SET `id_kota`='$_POST[kota]',`id_nama_jasa`='$_POST[nama]',`ekonomi`='$_POST[ekonomi]',`ekspres`='$_POST[ekspres]',`minimal_berat`='$_POST[berat]',`status`=1 WHERE `id_pengiriman`='$_POST[idpengiriman]'";
mysql_query($q);


mysql_close($con);
header("location: pengiriman_select.php");
?>