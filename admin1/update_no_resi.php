<?php
	session_start();
require 'connect.php';


mysql_query("update `penjualan` set `no_resi`='$_POST[noresi]' where `id_penjualan`='$_SESSION[id_jual]'");


$q="select * from penjualan p,kota k,provinsi v,nama_jasa_pengiriman n where p.id_kota=k.id_kota and p.id_provinsi=v.id_provinsi and n.id_nama_jasa=p.id_nama_jasa and p.id_penjualan='$_SESSION[id_jual]'";
$result=mysql_query($q);
if (!empty($result)){
	while($row=mysql_fetch_array($result))
	{
		echo $nama1=$row['nama'];
		echo $id_member=$row['id_member'];
		echo $kota=$row['kota'];
		echo $provinsi=$row['provinsi'];
		echo $alamat=$row['alamat'];
		echo $no_hp=$row['no_handphone'];
		echo $no_resi=$row['no_resi'];
		echo $jasa=$row['nama_jasa'];
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
echo $tgl = date("Y-m-d");
mysql_query("UPDATE `penjualan` SET `waktu_kirim`='$tgl' WHERE `id_penjualan`='$_SESSION[id_jual]'");

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
				
				Barang Pesanan ".$nama." sudah di kirim dengan 
				<br>
				Jasa Pengiriman
				".$jasa." dan nomor Resi ".$no_resi." waktu kirim=".$tgl."
				<br>
				Barang di kirimkan Kepada:<br>
				Nama:".$nama1."<br>
				Alamat:".$alamat."<br>
				Provinsi:".$provinsi."<br>
				Kota:".$kota."<br>
				No Handphone:".$no_hp."<br>
				untuk informasi lebih lanjut dapat melihat di website usahakeripik.com
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
	header("location: dikirim.php");
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}

mysql_close($con);

//header("location: dikirim.php");
?>