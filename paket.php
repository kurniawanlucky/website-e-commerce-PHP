<?php
	session_start();
	require 'connect.php';
	require 'functions.php';
	
	//$page = $_GET["page"];
	$nama_paket = "";
	if(isset($_GET["id_paket_barang"]))
	{
		$id_paket_barang = $_GET["id_paket_barang"];
		$query = "select * from paket_barang where id_paket_barang='$id_paket_barang'";
		$resultPaket  = mysql_query($query);
		if($rowPaket = mysql_fetch_array($resultPaket)){
			$nama_paket = $rowPaket["nama"];
		}
	}
	else
	{
		?><script>alert('Paket tidak ditemukan')</script><?php
		?><script>document.location.href='index.php';</script><?php
	}
	//$keyword = $_POST["keyword"];
	
	/*$jumlah_data_per_page = 9;
	
	$query = "select * from detail_paket d, paket_barang p where d.id_paket_barang='$id_paket_barang' and d.id_paket_barang=p.id_paket_barang";
	$resultCount = mysql_query($query);
	$jumlah_data = mysql_num_rows($resultCount);
	
	$jumlah_page = ceil($jumlah_data / $jumlah_data_per_page);
	if($jumlah_page <= 0)
	{
		$jumlah_page = 1;
	}
	if($page > $jumlah_page - 1)
	{
		$page = $jumlah_page - 1;
	}
	if($page < 0)
	{
		$page = 0;
	}
	$start_limit = $page * $jumlah_data_p<?php*/
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("head.php"); ?>
	
	
	<!--<script src="source/itemjs.js"></script>-->
	
	<script>
	
	
	
	var page = 0;
	
	$(document).ready(function(){
		
	});	
			
	</script>
</head><!--/head-->

<body>
	<?php include_once("atas_home.php"); ?>		
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include_once("left_sidebar.php"); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Paket <?php echo $nama_paket; ?></h2>
						<a href="session_shopping_cart.php.php?id=<?php echo $id_paket; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												
							<div id="barang">
							<?php
								$query = "select * from detail_paket a left join barang b on a.id_barang=b.id_barang
											where a.id_paket_barang='$id_paket_barang'";
											
								echo $query;
								$result = mysql_query($query);
								while($row = mysql_fetch_array($result))
								{
									$gambar = "images/no-picture.jpg";	//default no picture
									$id_barang = $row["id_barang"];
									$nama_barang = $row["nama"];
									$harga = $row["harga"];
									
									$query = "select * from gambar_barang where id_barang='$id_barang' limit 1";
									$resultGambar = mysql_query($query);
									if($rowGambar = mysql_fetch_array($resultGambar))
									{
										$gambar = $rowGambar["image"];
									}
									
							?>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/gambar/<?php echo $gambar; ?>" alt="<?php echo $nama_barang; ?>" />
													<h2>Rp <?php echo number_format($harga,0,",","."); ?></h2>
													<p><?php echo $nama_barang; ?></p>
													</div>
										</div>
									</div>
								</div>
							<?php
								}
								?><div style="clear: both"></div><?php
								
							?>
							</div>
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>
	

	<?php
		include_once("footer.php"); 
	?>
	

</body>
</html>