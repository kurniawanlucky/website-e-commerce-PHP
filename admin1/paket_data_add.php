<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `paket_barang`( `nama`, `harga`,`berat`, `keterangan`) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[keterangan]')");

$result=mysql_query("SELECT LAST_INSERT_ID()");
	if (!empty($result)){
	$row=mysql_fetch_array($result);
	$id=$row['LAST_INSERT_ID()'];
	$_SESSION['id_paket_barang']=$id;
	}
echo $_SESSION['id_paket_barang'];
mysql_close($con);
header("location: paket_select.php");
?>