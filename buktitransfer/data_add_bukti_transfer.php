<?php
session_start();
require '../connect.php';

if ($_FILES['file_gambar']['error'] > 0){
	echo "Error Uploading File";
} 
else 
{
	if ($_FILES["file_gambar"]["size"] > 1048576) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	}
	else
	{
	if (is_dir("images/".$_SESSION['id_penjualan'])==false)
	{
		mkdir("images/".$_SESSION['id_penjualan']);
	}
	$result=mysql_query("SELECT COUNT(*) FROM bukti_transfer where id_penjualan=$_SESSION[id_penjualan]");
	if (!empty($result)){
		while($row=mysql_fetch_array($result))
		{
			$id=$row['COUNT(*)'];
		}
	}
	$id++;
	$alamat_foto = "images/".$_SESSION['id_penjualan']."/".$id."-".$_FILES['file_gambar']['name'];
	$nama_folder = $_SESSION['id_penjualan'];
	$nama_file = $id."-".$_FILES['file_gambar']['name'];
	move_uploaded_file ($_FILES['file_gambar']['tmp_name'],$target = $alamat_foto);	
	chmod("images/$nama_folder/", 0777);
	chmod("images/$nama_folder/$nama_file", 0777);
	echo $alamat_foto." ".$nama_folder." ".$nama_file;
	$id_gambar=$_SESSION['id_penjualan']*100+$id;
	mysql_query("INSERT INTO bukti_transfer (id,id_penjualan,image) VALUES ($id_gambar,$_SESSION[id_penjualan],'$alamat_foto')");
	$q="UPDATE `penjualan` SET `status`=2 WHERE id_penjualan=$_SESSION[id_penjualan]";
	mysql_query($q);
	echo $q;
	$q="select * from penjualan p,kota k,provinsi v where p.id_kota=k.id_kota and p.id_provinsi=v.id_provinsi and id_penjualan=$_SESSION[id_penjualan]";
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

require_once("../admin1/PHPMailer/PHPMailerAutoload.php");
	
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
				Terima kasih kepada ".$nama." telah membeli di usahakeripik.com
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
	header("location: lihatbukti_transfer.php");
	if(!$mail->Send()) {
		header("location: lihatbukti_transfer.php");
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
		
	} 
	else {
		
		$error = 'Message sent!';
		return true;
		
	}

}
}
//header("location: lihatbukti_transfer.php");
mysql_close($con);
//header("location: lihatbukti_transfer.php");
?>