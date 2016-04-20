<?php
	session_start();
	require 'connect.php';
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
			<h2>Lupa kata sandi</h2>  
			<section id="atas" class="hero-unit span12">
				<section class="span10">
						<form class="color" action="data_lupapassword.php" method="post">
							<section class="span3 kanan">Username: </section>
							<section class="span4">
								<input id="username" type="text" name="username" /><br/>
							</section>
							<section class="span3 kanan">Nomor Handphone: </section>
							<section class="span4">
								<input id="no_handphone" type="text" name="no_handphone" required="required"/><br/>
							</section>
							<section class="span3 kanan">Email: </section>
							<section class="span4">
								<input id="email" type="text" name="email" required="required"/><br/>
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