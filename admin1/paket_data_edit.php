<?php
session_start();
require 'connect.php';

mysql_query("UPDATE `paket_barang` SET `nama`='$_POST[nama]',`harga`='$_POST[harga]',`berat`='$_POST[berat]',`keterangan`='$_POST[keterangan]' WHERE `id_paket_barang`='$_POST[idpaket]'");

mysql_close($con);
header("location: paket_select.php");
?>