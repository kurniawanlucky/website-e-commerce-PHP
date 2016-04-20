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
.color
{
	font-color:black;
}
</style>
		<div class="container">
			<?php require 'header/atas_profile.php'; ?>
			<h2>Acccount</h2> 
<?php //echo $_SESSION['id1'];?>			
			<section id="atas" class="hero-unit span12">
				<section class="span10">
					<form action="customer/data_update_customer.php" method="post">
						<?php
						$q="select * from member m,kota k,provinsi p where m.id_member=$_SESSION[id1] and m.id_kota=k.id_kota and p.id_provinsi=m.id_provinsi";
						//echo $q;
						$result=mysql_query($q);
						if (!empty($result)){
							while($row=mysql_fetch_array($result))
							{
						?>
						<section class="span3 kanan">Username: </section>
						<section class="span4">
							<input id="username" type="text" name="username" value="<?php echo $row['username'];?>" readonly /><br/>
						</section>
						<section class="span3 kanan">Name: </section>
						<section class="span4">
							<input id="nama" type="text" name="nama" required="required" value="<?php echo $row['nama'];?>"/><br/>
						</section>
						<section class="span3 kanan">Address: </section>
						<section class="span4">
							<input id="alamat" type="text" name="alamat" required="required" value="<?php echo $row['alamat'];?>"/><br/>
						</section>
						<section class="span3 kanan">City: </section>
						<section class="span4">
							<input id="kota" type="text" name="kota" required="required" value="<?php echo $row['kota'];?>"/><br/>
						</section> 
						<section class="span3 kanan">province: </section>
						<section class="span4">
							<input id="prov" type="text" name="provinsi" required="required" value="<?php echo $row['provinsi'];?>"/><br/>
						</section>
						<section class="span3 kanan">Mobile Phone Number: </section>
						<section class="span4">
							<input id="nomor_handphone" type="text" name="nomor_handphone" required="required" value="<?php echo $row['nomor_handphone'];?>"/><br/>
						</section>
						<section class="span3 kanan">Date of birth: </section>
						<section class="span4">
							<input id="tanggal_lahir" type="date" name="tanggal_lahir" required="required" value="<?php echo $row['tanggal_lahir'];?>"/><br/>
						</section>
						<section class="span3 kanan">Email: </section>
						<section class="span4">
							<input id="email" type="text" name="email" required="required" value="<?php echo $row['email'];?>"/><br/>
						</section>
						<section class="span3 kanan"></section>
						<section class="span4">
							<input id="submit" class="btn btn-mini" type="submit" value="Submit"/>
						</section>
						<?php
							}
						}
						mysql_close($con);
						?>	

					</form>
				</section>
				<a href="ubahpassword.php">Change Password</a>
			</section>	
			
		</div>
		<?php
			include_once("footer.php");
		?>
</body>
</html>