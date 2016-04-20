<?php
session_start();
require 'connect.php';

mysql_query("DELETE FROM `gambar_barang` WHERE `id_gambar`='$_GET[id_gambar]'");

mysql_close($con);
header("location: barang_gambar_select.php");
?>