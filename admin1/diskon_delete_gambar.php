<?php
session_start();
require 'connect.php';

mysql_query("DELETE FROM `diskon_gambar` WHERE `id_diskon_gambar`='$_GET[id_diskon_gambar]'");

mysql_close($con);
header("location: diskon_select_gambar.php");
?>