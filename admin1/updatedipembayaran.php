<?php
session_start();
require 'connect.php';

mysql_query("UPDATE `penjualan` SET `status`=2 WHERE `id_penjualan`=$_GET[id_penjualan]");

$q="select * from penjualan p,kota k,provinsi v where p.id_kota=k.id_kota and p.id_provinsi=v.id_provinsi and id_penjualan=$_GET[id_penjualan]";
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
				Terima kasih kepada ".$nama." telah berbenja di usahakeripik.com
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
								".$totalbayar."
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
	header("location: order.php");
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}

mysql_close($con);

?>