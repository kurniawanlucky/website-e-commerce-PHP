<?php
session_start();

//$_SESSION['id_merk']= $_GET['id_merk'];
$id=$_GET['id'];
$jml=$_GET['jumlah'];
$tipe=$_GET['tipe'];
if (!isset($_SESSION["shopping_cart"]))
{
  $dataShopping=array();
  $_SESSION["shopping_cart"]=$dataShopping;
}
$dataShopping=$_SESSION["shopping_cart"];
$dataBarang=array();
$dataBarang["jml"]=$jml;
$dataBarang["tipe"]=$tipe;
$dataShopping[$id]=$dataBarang;
$_SESSION["shopping_cart"]=$dataShopping;
print_r($dataShopping);
//echo $_SESSION['id_barang'];
header("location: cart.php");
?>