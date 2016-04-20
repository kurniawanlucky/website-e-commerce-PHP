<?php
require 'connect.php';
session_start();
echo $_SESSION["id_barang"];
echo "<br/>";
$z="SELECT * FROM `barang` WHERE id_barang=$_SESSION[id_barang]";
$resultbarang=mysql_query($z);
$rowbarang=mysql_fetch_array($resultbarang);
echo $rowbarang['jumlah_stock'];
echo "<br/>";
echo $_POST['stocklama'];
echo "<br/>";
echo $_POST['tambah'];
echo "<br/>";
echo $jumlahstock=$rowbarang['jumlah_stock']+$_POST['tambah'];
echo "<br/>";
echo $jumlahstockbelum=$_POST['stocklama']+$_POST['tambah'];
mysql_query("UPDATE `barang` SET `jumlah_stock`=$jumlahstock,`jumlah_belum_kirim`=$jumlahstockbelum WHERE id_barang=$_SESSION[id_barang]");

mysql_close($con);
header("location: index.php");
?>