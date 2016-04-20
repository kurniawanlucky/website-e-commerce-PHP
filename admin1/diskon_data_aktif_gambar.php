<?php
require 'connect.php';

echo $_GET['id_diskon_gambar'];
$result=mysql_query("select * from diskon_gambar where status=1");
$row=mysql_fetch_array($result);
echo $row['id_diskon_gambar'];

mysql_query("UPDATE `diskon_gambar` SET `status`=1 WHERE `id_diskon_gambar`=$_GET[id_diskon_gambar]");
mysql_query("UPDATE `diskon_gambar` SET `status`=0 WHERE `id_diskon_gambar`=$row[id_diskon_gambar]");

mysql_close($con);
header("location: diskon_select_gambar.php");
?>