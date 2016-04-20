<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		include_once("head.php"); 
		session_start();
		include_once("connect.php");
		echo $_SESSION["shopping_cart"]=NULL;
		//echo $_SESSION["dis"];
	?>
	<script type="text/javascript">
        var total_berat=0;
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
			
			 $("#kota").change(function(){
                var kota=$("#kota").val();
				
				var n = $("#total_data").val();
				
                var xurl="ajaxdetailkota.php?kota="+kota+"&berat="+total_berat;
				//var xurl="ajaxdetailkota.php?kota="+kota+"&berat="+total_berat;
				console.log(xurl);		
				$.ajax({
                    type:"get",
                    url:xurl,
                    success:function(data){
                        $("#detailkota").html(data);
                    }
                });
            });
        });
    </script>	
</head><!--/head-->

<body>
	
	<?php include_once("atas1.php");
	$id_penjualan=$_GET['id'];
		$berat="select * from penjualan WHERE id_penjualan=$id_penjualan";		// Query to collect data from table 
			$resultberat=mysql_query($berat);
			while($rowberat=mysql_fetch_array($resultberat))
			{
				$total_berat2=$rowberat['total_berat'];
				?>
				  <script>
				    total_berat=<?php echo $total_berat2;?>
				  </script>
				<?php
			}
			
	?>	
	
	<form method="post" action="prosesdata.php">
		<section id="do_action"> 
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="chose_area">
							<ul class="user_info">
							<?php
								//echo $_SESSION['id1'];
								$result=mysql_query("select * from member where id_member=$_SESSION[id1]");
								if (!empty($result)){
									while($row=mysql_fetch_array($result))
									{
								?>
								<input id="id_jual" name="id_jual" type="hidden" value="<?php echo $id_penjualan; ?>"/>
								<input id="nama" name="nama" type="text" placeholder="nama penerima" value=<?php echo $row['nama']; ?>/>
								<input id="alamat" name="alamat" type="text" placeholder="alamat penerima" value=<?php echo $row['alamat']; ?>/>
								<input id="nomor_handphone" name="nomor_handphone" type="text" placeholder="nomor handphone" value=<?php echo $row['nomor_handphone']; ?>/>
								<input id="keterangan" name="keterangan" type="text" placeholder="keterangan" />
								<li class="single_field">
									<label>Provinsi:</label>
									<select id="provinsi" name="provinsi" class="naik">
										<?php
										echo "<option value=''>Select One</option>";
										$provinsi="select * from provinsi"; // Query to collect data from table 
										$resultprov=mysql_query($provinsi);
										while($rowprovinsi=mysql_fetch_array($resultprov))
										{
											echo "<option value=$rowprovinsi[id_provinsi]>$rowprovinsi[provinsi]</option>";
										}
										?>
									</select>
									
								</li>
								<li class="single_field">
									<label>Kota:</label>
									<select name="kota" id="kota" class="naik">
										<option>-select your city-</option>
									</select>
								
								</li>
							<?php
									}
								}
							?>
							</ul>
							
							<ul id="detailkota" class="user_option">
									
							</ul>
							<input class="btn btn-default update" type="submit" value="simpan"/>
						</div>
					</div>
				</div>
			</div>
		</section><!--/#do_action-->
	</form>
	<?php include_once("footer.php");?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>