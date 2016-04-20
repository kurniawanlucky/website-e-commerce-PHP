<?php
session_start();
require 'connect.php';

mysql_query("UPDATE `barang` SET `nama`='$_POST[nama]',`harga`='$_POST[harga]',`deskripsi`='$_POST[deskripsi]',`id_kategori`='$_SESSION[id_kategori]',`id_merk`='$_SESSION[id_merk]',`volume`='$_POST[volume]',`berat`='$_POST[berat]',`keterangan`='$_POST[keterangan]',`jumlah_stock`='$_POST[stock]' WHERE `id_barang`='$_POST[idbarang]'");

echo $_SESSION['id_kategori'];
echo $_SESSION['id_merk'];
mysql_close($con);
header("location: barang_select.php");
?>