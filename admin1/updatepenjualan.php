<?php
require 'connect.php';

$idPenjualan=$_GET['id_penjualan'];
echo $idPenjualan;
echo '<br/>';
$q1="SELECT count(*) FROM `detail_penjualan` where `id_penjualan`=$idPenjualan and tipe_barang='barang'";
$result1=mysql_query($q1);
if (!empty($result1)){
	while($row1=mysql_fetch_array($result1))
	{
		echo $barang=$row1[0];
	}
}
//echo $barang;
if($barang>0)
{
	echo '<br/>';
	$p1="SELECT id_barang,jumlah_barang FROM `detail_penjualan` where `id_penjualan`=$idPenjualan and tipe_barang='barang'";
	//echo $p1;
	$result3=mysql_query($p1);
	if (!empty($result3)){
		while($row3=mysql_fetch_array($result3))
		{
			$a="SELECT * FROM `barang` WHERE id_barang=$row3[id_barang]";
			$resulta=mysql_query($a);
			$rowa=mysql_fetch_array($resulta);
			echo $jumlah_stock=$rowa['jumlah_belum_kirim'];
			echo "-";
			echo $jual=$row3['jumlah_barang'];
			echo "=";
			echo $total=$jumlah_stock-$jual;
			$x="UPDATE `barang` SET `jumlah_belum_kirim`=$total WHERE id_barang=$row3[id_barang]";
			mysql_query($x);
		}
	}
}
echo '<br/>';
$q2="SELECT count(*) FROM `detail_penjualan` where `id_penjualan`=$idPenjualan and tipe_barang='paket'";
$result2=mysql_query($q2);
if (!empty($result2)){
	while($row2=mysql_fetch_array($result2))
	{
		echo $paket=$row2[0];
	}
}
if($paket>0)
{
	echo '<br/>';
	echo "88888";
	echo '<br/>';
	$paket1="SELECT id_barang,jumlah_barang FROM `detail_penjualan` where `id_penjualan`=$idPenjualan and tipe_barang='paket'";
	$resultpaket=mysql_query($paket1);
	
	if (!empty($resultpaket)){
		while($rowpaket=mysql_fetch_array($resultpaket))
		{
			$update_paket="SELECT id_barang,jumlah FROM `detail_paket` where `id_paket_barang`=$rowpaket[id_barang]";
			echo $update_paket;
			$update_resultpaket=mysql_query($update_paket);
			if (!empty($update_resultpaket)){
				while($rowpaket_update=mysql_fetch_array($update_resultpaket))
				{
					echo '<br/>';
					echo "jumlah paket yang dibeli=";
					echo $rowpaket['jumlah_barang'];
					echo '<br/>';
					echo "id barang=";
					echo $rowpaket_update['id_barang'];
					echo "-jumlah barang dalam paket=";
					echo $rowpaket_update['jumlah'];
					echo '<br/>';
					echo $jual_paket=$rowpaket_update['jumlah']*$rowpaket['jumlah_barang'];
					
					$b="SELECT * FROM `barang` WHERE id_barang=$rowpaket_update[id_barang]";
					$resultb=mysql_query($b);
					$rowb=mysql_fetch_array($resultb);
					echo '<br/>';
					echo $jumlah_stock_paket=$rowb['jumlah_belum_kirim'];
					echo "-";
					echo $jual_paket;
					echo "=";
					echo $total_paket=$jumlah_stock_paket-$jual_paket;
					echo '<br/>';
					echo "-------------------";
					echo '<br/>';
					$y="UPDATE `barang` SET `jumlah_belum_kirim`=$total_paket WHERE id_barang=$rowpaket_update[id_barang]";
					mysql_query($y);
				}
			}
		}
	}
}

mysql_query("update `penjualan` set `status`=5 where `id_penjualan`=$_GET[id_penjualan]");
mysql_close($con);
header("location: dikirim.php");
?>