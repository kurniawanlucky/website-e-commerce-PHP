<?php
	session_start();
	require 'connect.php';
if(!isset($_SESSION['nama']))
	{
		header("location:login.php");
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'head.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
</head><!--/head-->

<body>
<style>
</style>
		<div class="container">
			<?php require 'atas1.php'; ?>
			<h2>Change Password</h2>  
			<section id="atas" class="hero-unit span12">
				<section class="span10">
						<form class="color" action="data_ubahpassword.php" method="post">
							<section class="span3 kanan">Old Password: </section>
							<section class="span4">
								<input id="passwordlama" type="text" name="passwordlama" /><br/>
							</section>
							<section class="span3 kanan">Enter a new password: </section>
							<section class="span4">
								<input id="passwordbaru" type="text" name="passwordbaru" required="required"/><br/>
							</section>
							<section class="span3 kanan">Re-Enter your password: </section>
							<section class="span4">
								<input id="Ketikulang" type="text" name="ketikulang" required="required"/><br/>
							</section>
							<section class="span4">
								<input id="submit" class="btn btn-warning" type="submit" value="Submit"/>
							</section>
						</form>
				</section>
			</section>	
			
		</div>
</body>
</html>