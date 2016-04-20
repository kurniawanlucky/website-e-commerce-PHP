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
mysql_query("update `penjualan` set `status`=3 where `id_penjualan`=$_GET[id_penjualan]");
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
			echo $jumlah_stock=$rowa['jumlah_stock'];
			echo "-";
			echo $jual=$row3['jumlah_barang'];
			echo "=";
			echo $total=$jumlah_stock-$jual;
			$x="UPDATE `barang` SET `jumlah_stock`=$total WHERE id_barang=$row3[id_barang]";
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
					echo $jumlah_stock_paket=$rowb['jumlah_stock'];
					echo "-";
					echo $jual_paket;
					echo "=";
					echo $total_paket=$jumlah_stock_paket-$jual_paket;
					echo '<br/>';
					echo "-------------------";
					echo '<br/>';
					$y="UPDATE `barang` SET `jumlah_stock`=$total_paket WHERE id_barang=$rowpaket_update[id_barang]";
					mysql_query($y);
				}
			}
		}
	}
}

$q="select * from penjualan p,kota k,provinsi v where p.id_kota=k.id_kota and p.id_provinsi=v.id_provinsi and id_penjualan=$idPenjualan";
$result=mysql_query($q);
if (!empty($result)){
	while($row=mysql_fetch_array($result))
	{
		echo $id_member=$row['id_member'];
		echo $kota=$row['kota'];
		echo $provinsi=$row['provinsi'];
		echo $total=$row['total'];
		echo $diskon=$row['diskon'];
		echo $pengiriman=$row['harga_pengiriman'];
		echo $totalbayar=$row['total_bayar'];
	}
}

$p="select * from member where id_member=$id_member";
$member=mysql_query($p);
if (!empty($member)){
	while($rowmember=mysql_fetch_array($member))
	{
		echo $email=$rowmember['email'];
		echo $nama=$rowmember['nama'];
	}
}

require_once("PHPMailer/PHPMailerAutoload.php");
	
	$subject = "Order di usahakeripik.com";
	$message = "<!DOCTYPE html>
                <html>
                <head>
                <!-- Latest compiled and minified CSS -->
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

                <!-- Optional theme -->
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css'>

                <!-- Latest compiled and minified JavaScript -->
                <script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>

                </head>
                
                <body>
                <img src='../images/home/usahaparfum.png'></img>
                <br><br>
					pemesanan
				".$nama."
				Barang pesanan sedang dikemas....
				
                Terima Kasih.
                
                
                </body>
                
                </html>";
	$to = $email;
	
	$mail = new PHPMailer();  // create a new object
	$mail->IsHTML(true);
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = "pio.pio.s88@gmail.com";  
	$mail->Password = "m5320291";           
	$mail->SetFrom("pio.pio.s88@gmail.com", "usahakeripik.com");
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
			
		header("location: pembayaran.php");
		return false;
	} else {
		
		header("location: pembayaran.php");
		$error = 'Message sent!';
		return true;
	}


mysql_close($con);

header("location: pembayaran.php");
?>