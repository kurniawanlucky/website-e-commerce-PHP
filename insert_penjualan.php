<?php
	include "connect.php";
	//insert headernya data kota, propinsi
	$id_header="";
	
	$arData=$_SESSION["shopping_cart"];
	foreach ($arData as $key => $val) 
	{
	  $id_barang=$key;
	  $jml=$val;
	  $harga=0;
	   $q="SELECT * FROM barang WHERE id_barang='$key'";
				 //echo $q;
				 $res=mysql_query($q);
				 while ($row=mysql_fetch_assoc($res))
				 {
				   $harga=$row["harga"];
				 }
				 $subtotal=$jml*$harga;
	  $q="INSERT INTO detail_penjualan (id_penjualan,id_barang,jumlah_barang,harga_barang,subtotal) ".
	     "VALUES ($id_header,$id_barang,$jml,$harga,$subtotal)";
	   mysql_query($q);
	}
	
	$_SESSION["shopping_cart"]=array();
	//header("location:bukti_pembayaran.php");
?>