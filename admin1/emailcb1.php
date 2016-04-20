<?php
	require_once("connect.php");
	require_once("PHPMailer/PHPMailerAutoload.php");
	
	$subject = "Test";
	$message = "Test test <b>test</b>";
	$to = "pio.pio.s88@gmail.com";
	
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
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
?>