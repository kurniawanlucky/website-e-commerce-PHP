<?php
session_start();
require 'connect.php';
echo $id_penjualan=$_POST['id_jual'];
echo " ";

$j="UPDATE `penjualan` SET `diskon`='$_SESSION[dis]' WHERE `id_penjualan`=$id_penjualan";
echo $j;
mysql_query($j);


echo $id=$_SESSION['id1'];
echo " ";
$total_bayar=0;
$jumlah=0;
$pengiriman=$_POST['str'];
$q="select * FROM penjualan where `id_penjualan`=$id_penjualan";
$result=mysql_query($q);
if (!empty($result)){
	while($row=mysql_fetch_array($result))
	{
		$diskon=$row['diskon'];
		$total=$row['total'];
		$berat=$row['total_berat'];
	}
}
$i="UPDATE `penjualan` SET `no_handphone`='$_POST[nomor_handphone]' WHERE `id_penjualan`=$id_penjualan";
echo $i;
mysql_query($i);

$z="select right(no_handphone,3) from penjualan where id_penjualan=$id_penjualan";
$resultz=mysql_query($z);
while($rowz=mysql_fetch_array($resultz))
{
	echo $hp=$rowz['right(no_handphone,3)'];
}

echo '</br>';
echo $hp;
echo '</br>';
echo $jumlah=$jumlah+$hp;
echo '</br>';
echo $berat;
$hasil_berat=$berat/1000;
echo $total_berat=ceil($hasil_berat);
echo '</br>';
echo $pengiriman=$total_berat*$pengiriman;
echo '</br>';
echo " ";
echo $total;
echo "+";
echo $pengiriman;
echo "-";
echo $diskon;
echo "=";
echo $total_bayar=$total+$pengiriman-$diskon+$hp;
echo $jumlah=$total-$diskon;
$p="UPDATE `penjualan` SET `id_nama_jasa`='$_POST[jasa]',`id_member`=$id,`jumlah`=$jumlah,`id_kota`='$_POST[kota]',`id_provinsi`='$_POST[provinsi]',`total_bayar`=$total_bayar,`nama`='$_POST[nama]',`alamat`='$_POST[alamat]',`no_handphone`='$_POST[nomor_handphone]',`harga_pengiriman`=$pengiriman,`keterangan`='$_POST[keterangan]',`ada`=1,`status`=1 WHERE `id_penjualan`=$id_penjualan";
echo $p;
mysql_query($p);

$x="UPDATE `penjualan` SET `jumlah`=$jumlah WHERE `id_penjualan`=$id_penjualan";
echo $x;
mysql_query($x);

$p="select * from member where id_member=$_SESSION[id1]";
$member=mysql_query($p);
if (!empty($member)){
	while($rowmember=mysql_fetch_array($member))
	{
		echo $email=$rowmember['email'];
		echo $nama=$rowmember['nama'];
	}
}

require_once("admin1/PHPMailer/PHPMailerAutoload.php");
	
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
			Terima kasih kepada ".$nama." telah berbelanja di usahakeripik.com
			<div>
				<table >
					<tr>
						<td>
							
						</td>
						<td >
							Harga
						</td>
					</tr>
					<tr>
						<td >
							Total Belanja
						</td>
						<td>
							".$total."
						</td>
					</tr>
					<tr>
						<td >
							Diskon
						</td>
						<td>
							".$diskon."
						</td>
					</tr>
					<tr>
						<td >
							Pengiriman
						</td>
						<td>
							".$pengiriman."
						</td>
					</tr>
					<tr>
						<td >
							Total Pembayaran
						</td>
						<td>
							".$total_bayar."
						</td>
					</tr>
				</table>
			</div>
		
			Terima Kasih.
			
			</p>
			
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
header("location: index.php");
if(!$mail->Send()) {
	header("location: index.php");
	$error = 'Mail error: '.$mail->ErrorInfo; 
	return false;
	
} 
else {
	
	$error = 'Message sent!';
	return true;
	
}

mysql_close($con);

?>