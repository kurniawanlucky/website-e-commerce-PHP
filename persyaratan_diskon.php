<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	include_once("head.php"); 
	include_once("connect.php");
?>
</head><!--/head-->

<body>
	<?php include_once("atas_home.php"); ?>		
	<section>
		<div class="container">
		<b>Promo Diskon:</b>
		<p>
		<?php
			$hasil=mysql_query("select *,DATE_FORMAT(waktu,'%d') AS tanggal1,DATE_FORMAT(waktu,'%m') AS bulan1,DATE_FORMAT(waktu,'%y') AS tahun1,
				DATE_FORMAT(waktu_selesai,'%d') AS tanggal2,DATE_FORMAT(waktu_selesai,'%m') AS bulan2,DATE_FORMAT(waktu_selesai,'%y') AS tahun2 
					from diskon where SYSDATE()<=waktu_selesai");
			if (!empty($hasil))
			{
				while($rowie=mysql_fetch_array($hasil))
				{
					$bln1=$rowie['bulan1'];
					$bln2=$rowie['bulan2'];
					if($bln1==01)
					{
						$blnh="Januari";
					}
					elseif($bln1==02)
					{
						$blnh="Februari";
					}
					elseif($bln1==03)
					{
						$blnh="Maret";
					}
					elseif($bln1==04)
					{
						$blnh="April";
					}
					elseif($bln1==05)
					{
						$blnh="Mei";
					}
					elseif($bln1==06)
					{
						$blnh="Juni";
					}
					elseif($bln1==07)
					{
						$blnh="Juli";
					}
					elseif($bln1==08)
					{
						$blnh="Agustus";
					}
					elseif($bln1==09)
					{
						$blnh="September";
					}
					elseif($bln1==10)
					{
						$blnh="Oktober";
					}
					elseif($bln1==11)
					{
						$blnh="November";
					}
					elseif($bln1==12)
					{
						$blnh="Desember";
					}
					
					if($bln2==01)
					{
						$blnh1="Januari";
					}
					elseif($bln2==02)
					{
						$blnh1="Februari";
					}
					elseif($bln2==03)
					{
						$blnh1="Maret";
					}
					elseif($bln2==04)
					{
						$blnh1="April";
					}
					elseif($bln2==05)
					{
						$blnh1="Mei";
					}
					elseif($bln2==06)
					{
						$blnh1="Juni";
					}
					elseif($bln2==07)
					{
						$blnh1="Juli";
					}
					elseif($bln2==08)
					{
						$blnh1="Agustus";
					}
					elseif($bln2==09)
					{
						$blnh1="September";
					}
					elseif($bln2==10)
					{
						$blnh1="Oktober";
					}
					elseif($bln2==11)
					{
						$blnh1="November";
					}
					elseif($bln2==12)
					{
						$blnh1="Desember";
					}
					
					echo "Promo mulai tanggal ".$rowie['tanggal1'];
					echo $blnh;
					echo "20".$rowie['tahun1']." sampai dengan ".$rowie['tanggal2'];
					echo $blnh1;
					echo "20".$rowie['tahun2'];
					
					echo '<br/>';
					echo "Mendapat Diskon:";
					echo $rowie['diskon']."% setiap pembelian dengan jumlah ".$rowie['jumlah_barang']." botol";
					echo '<br/>';
				}
			}
		?>
		<p>
		<b>Promo Paket:</b>
		<p>
		<?php
			$hasil1=mysql_query("select * from paket_barang");
			if (!empty($hasil1))
			{
				while($rowie1=mysql_fetch_array($hasil1))
				{
					echo "Nama Paket:" .$rowie1['nama'];
					echo '<br/>';
					echo "Berat:".$rowie1['berat']." gram";
					echo '<br/>';
					echo "Harga:".number_format($rowie1['harga']);
					echo '<br/>';
					echo "Keterangan:".$rowie1['keterangan'];
					echo '<br/>';
					$hasil2=mysql_query("select * from detail_paket where id_paket_barang=$rowie1[id_paket_barang]");
					if (!empty($hasil2))
					{
						echo "Isi Paket";
						echo '<br/>';
						while($rowie2=mysql_fetch_array($hasil2))
						{
							$barang=mysql_query("select * from barang where id_barang=$rowie2[id_barang]");
							$rowiebarang=mysql_fetch_array($barang);
							echo $rowiebarang['nama'];
							echo '<br/>';
							echo " dengan jumlah: ".$rowie2['jumlah'];
							echo " biji";
							echo '<br/>';
						}
					}
					echo '<br/>';
				}
			}
		?>
			
		</div>
	</section>
	
	<?php
		include_once("footer.php"); 
	?>
	

</body>
</html>