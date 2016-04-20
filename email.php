<?php
echo $email=$_POST['email'];


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
					<div class='container'>
						<p><b>Parfumku.net:</b></p>
						<p>Kami adalah Distributor Resmi dari PT Griff Prima Abadi untuk wilayah Indonesia, kami telah memasarkan parfum original ini sejak tahun 2010, sudah ribuan reseller kami miliki dan jutaan botol parfum telah kami jual keseluruh wilayah di Indonesia.</p>
						<p>kami sengaja memilih bisnis ini dikarenakan parfum sudah menjadi  kebutuhan umum semua orang dan digunakan setiap hari, dan dengan kualitas parfum original serta harga yang sangat murah kami yakin semakin hari usaha kami ini akan semakin maju, apalagi kami dibantu oleh ribuan reseller yang sangat luar biasa.</p>
						<p>Kami sangat berharap bahwa dengan adanya kami disini dapat membuka banyak lapangan pekerjaan baru diindonesia serta banyaknya wirausaha baru ditanah air yang kita cintai ini, sehingga kita bisa bersaing dengan negara-negara tetangga kita.</p>
						<p>Untuk Infor lebih lanjut Hub:</p>
						<p><b>Phone:</b> Khusus SMS : 0878 5257 5258<br/>Khusus Telfon : <br/>Telkomsel-simpati-AS : 0821 3131 6464<br/>CDMA Lokal : 031 – 70 657 658Tree <br/>3 : 0896 6060 6161 <br/>XL : 0877 2400 2500 <br/>Kantor : 031 – 53 49 8 49</p>
						<p><b>PIN BB :</b>  Ditanyakan Lewat sms ke 0878 5257 5258</p>
						<p><b>Email :</b>  csparfum@gmail.com</p>
					</div>
					
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
	
	header("location: login.php");
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}

mysql_close($con);
?>
