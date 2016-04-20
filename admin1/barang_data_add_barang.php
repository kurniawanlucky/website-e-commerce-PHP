<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `barang`( `nama`, `harga`, `deskripsi`, `id_kategori`, `id_merk`,`id_jenis`, `volume`, `berat`, `keterangan`, `jumlah_stock`,`jumlah_belum_kirim`) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[deskripsi]',$_SESSION[id_kategori],$_SESSION[id_merk],'$_POST[jenis]','$_POST[volume]','$_POST[berat]','$_POST[keterangan]','$_POST[stock]','$_POST[stock]')");


mysql_close($con);
header("location: barang_select.php");
?>