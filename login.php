
<?php
	require 'connect.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("head.php"); ?>

	<script type="text/javascript">
	   $(document).ready(function(){
		   $("#provinsi").change(function(){
				 var provinsi=$("#provinsi").val();
				 $.ajax({
					type:"post",
					url:"ajaxcity.php",
					data:"provinsi="+provinsi,
					success:function(data){
						  $("#kota").html(data);
					}
				 });
		   });
	   });
	   
	   
  </script>
</head><!--/head-->

<body>
<style>
	.warna
	{
		color:black;
	}
	.naik
	{
		margin-top:-40px;
	}
	.naik1
	{
		margin-top:-20px;
	}
</style>
<?php include_once("header/atas_login.php"); ?>	
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<?php
							if(isset($_SESSION["salah"]))
							{
								echo "<p style='color: red'>";
								echo "your username or password is invalid";
								echo "</p>";
							}
						?>
						<h2>Login to your account</h2>
						<form action="data_login.php" method="post">
							<input id="username" name="username" type="text" placeholder="username" />
							<input id="password" name="password" type="password" placeholder="password" />
							<span>
								<a href="lupa_password.php">forget your password?</a>
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						
						<h2>New User Signup!</h2>
						<?php
							if(isset($_SESSION["passtidak"]))
							{
								echo "<p style='color: red'>";
								echo "password tidak sama";
								echo "</p>";
							}
							if(isset($_SESSION["passkurang"]))
							{
								echo "<p style='color: red'>";
								echo "password kurang dari 8 digit";
								echo "</p>";
							}
						?>
						<form name="form1" action="customer/daftar.php" method="post">
							<input type="username" id="inputusername" name="username" placeholder="Username" required /><br />
							<span id="user-result"></span>
							<input id="password" type="text" name="password" placeholder="Password" required onchange="ValidateSingleInput(this);" />
							<input id="password1" type="text" name="password1" placeholder="ketik ulang Password" required />
							<input type="text" name="nama" placeholder="Name" required />
							<input type="date" name="tgl_lahir" placeholder="Date of birth " required/>
							<input type="text" name="alamat" placeholder="Address" required/>
							<label>Provinsi</label>
							<select id="provinsi" name="provinsi" class="naik" required>
								<?php
								echo "
								<option value=''>Select province</option>";
								$provinsi="select * from provinsi"; // Query to collect data from table 
								$resultprov=mysql_query($provinsi);
								while($rowprovinsi=mysql_fetch_array($resultprov))
								{
									echo "<option value=$rowprovinsi[id_provinsi]>$rowprovinsi[provinsi]</option>";
								}
								?>
							</select>
							<label class="naik2">Kota</label>
							<select name="kota" id="kota" class="naik">
									<option>-select your city-</option>
							</select>
							<input type="text" name="nomorhp" placeholder="Mobile Phone Number" required/>
							<input type="email" name="email" placeholder="Email Address" required/>
							<button type="submit" class="btn btn-default" onclick="CheckPassword(document.form1.password)">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>

	
	<?php
		include_once("footer.php");
	?>
<head>
<?php include_once("head.php"); ?>
<script>
function CheckPassword(inputtxt)   
{   
var passw=  /^[A-Za-z]\w{7,14}$/;  
if(inputtxt.value.match(passw))   
{   
return true;
header("Location: index.php")   
}  
else  
{   
alert('password kurang dari 8 digit...')
header("Location: index.php")  
return false;  
}  
} 
</script>
	<script type="text/javascript">
	   
	   $("#inputusername").keyup(function () { //user types username on inputfiled
		   var username = $("#inputusername").val(); //get the string typed by user
		  // window.alert (username);
		  
			$.ajax({
				type:"post",
				url:"check_username.php",
				data:"username="+username,
				success:function(data){
					  $("#user-result").html(data);
				}
			 });
		   
		});
  </script>

</head><!--/head-->

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>