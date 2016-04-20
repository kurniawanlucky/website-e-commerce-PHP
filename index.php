<?php
	session_start();
	require 'connect.php';
	require 'functions.php';
	$id_merk = "";
	$id_kategori = "";
	if(isset($_GET["id_merk"]))
	{
		$id_merk = $_GET["id_merk"];
		
	}
	if(isset($_GET["id_kategori"]))
	{
		$id_kategori = $_GET["id_kategori"];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("head.php"); ?>
	
	
	<!--<script src="source/itemjs.js"></script>-->
	
	<script>
	/*var flag=1;
	var idsearch=0;

	var pilihan=0;
	var total=0;
	idsort=0;
	max=0;
	*/
	
	var page = 0;
	var id_merk = 1;
	var id_kategori = 1;
	
	<?php
		if($id_merk != "")
		{
			?>id_merk = <?php echo $id_merk; ?>;
			<?php
		}
		if($id_kategori != "")
		{
			?>id_kategori = <?php echo $id_kategori; ?>;
			<?php
		}
	?>
	
	function gantiPaket(idpaket)
	{
	        var xurl="ajax_load_barang2.php?id_paket="+idpaket;
			console.log(xurl);
			$.get(xurl,function(data){
				$("#barang").html(data);
			});
	}
	
	function gantiJenis(idjenis)
	{
	        var xurl="ajax_load_barang3.php?id_jenis="+idjenis;
			console.log(xurl);
			$.get(xurl,function(data){
				$("#barang").html(data);
			});
	}
	
	$(document).ready(function(){
		getBarang = function(){
			$.post("ajax_load_barang.php", {"id_merk" : id_merk, "id_kategori" : id_kategori, "page" : page},function(data){
				$("#barang").html(data);
			});
		}
		
		gantiMerk = function(idm,idk){
			id_merk = idm;
			id_kategori = idk;
			getBarang();
		}
		/*
		gantiPaket = function(idp){
			id_paket_barang = idp;
			getPaket();
		}*/
		
		gantiPage = function(pg){
			page = pg;
			getBarang();
		}

		getBarang();
	});	
			
	</script>
</head><!--/head-->

<body>
	<?php include_once("atas_home.php"); ?>		
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="brands_products"><!--brands_products-->
							<h2>Category</h2>
							<div class="panel panel-default">				
								<?php
									$hasil=mysql_query("select * from kategori1 where ada=1");
									if (!empty($hasil))
									{
										while($rowie=mysql_fetch_array($hasil))
										{
											if($id_kategori == "")
											{
												$id_kategori=$rowie["id_kategori"];
												?><script>id_kategori=<?php echo $id_kategori; ?></script><?php
												
											}
											echo "<div class='panel-heading'>";
												echo "<h4 class='panel-title'>";
													echo "<a  data-toggle='collapse' data-parent='#accordian' href='#kategori_".$rowie['id_kategori']."'>";
														echo "<span class='badge pull-right'><i class='fa fa-plus'></i></span>";
														echo "".$rowie['nama']."";
													echo "</a>";
												echo "</h4>";
											echo "</div>";
											echo "<div id='kategori_".$rowie['id_kategori']."' class='panel-collapse collapse'>";
											echo "<div class='panel-body'>";
											
											$hasil2=mysql_query("SELECT distinct b.id_merk,m.nama FROM barang b,merk1 m WHERE b.id_merk=m.id_merk and b.id_kategori=".$rowie['id_kategori']."");
											if (!empty($hasil2))
											{
												while($rowie2=mysql_fetch_array($hasil2))
												{
													if($id_merk == "")
													{
														$id_merk = $rowie2["id_merk"];
														?><script>id_merk=<?php echo $id_merk; ?></script><?php
													}
													echo "<ul>";
													echo "<li><a style=\"cursor:pointer;\" onclick=\"gantiMerk('".$rowie2['id_merk']."','".$rowie['id_kategori']."');\"><span>".$rowie2['nama']."</span></a></li>";
													echo "</ul>";
												}
											}
											
											echo "</div>";
											echo "</div>";				
										}
									}
								?>
							</div>
						</div><!--/brands_products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="panel panel-default">				
								<?php
									$hasil=mysql_query("select * from merk1 where ada=1");
									if (!empty($hasil))
									{
										while($rowie=mysql_fetch_array($hasil))
										{
											echo "<div class='panel-heading'>";
												echo "<h4 class='panel-title'>";
													echo "<a  data-toggle='collapse' data-parent='#accordian' href='#merk_".$rowie['id_merk']."'>";
														echo "<span class='badge pull-right'><i class='fa fa-plus'></i></span>";
														echo "".$rowie['nama']."";
													echo "</a>";
												echo "</h4>";
											echo "</div>";
											echo "<div id='merk_".$rowie['id_merk']."' class='panel-collapse collapse'>";
											echo "<div class='panel-body'>";
											
											$hasil2=mysql_query("SELECT distinct b.id_kategori,m.nama FROM barang b,kategori1 m WHERE b.id_kategori=m.id_kategori and b.id_merk=".$rowie['id_merk']."");
											if (!empty($hasil2))
											{
												while($rowie2=mysql_fetch_array($hasil2))
												{
													echo "<ul>";
													echo "<li><a style=\"cursor:pointer;\" onclick=\"gantiMerk('".$rowie['id_merk']."','".$rowie2['id_kategori']."');\"><span>".$rowie2['nama']."</span></a></li>";
													echo "</ul>";
												}
											}
											
											echo "</div>";
											echo "</div>";				
										}
									}
								?>
							</div>
						</div><!--/brands_products-->
						
						<div class="brands_products"><!--brands_products-->
							<h2>Type</h2>
							<div class="panel panel-default">				
								<?php
									$hasil_jenis=mysql_query("select * from jenis");
									if (!empty($hasil_jenis))
									{
										while($rowie_jenis=mysql_fetch_array($hasil_jenis))
										{
											echo "<div class='panel-heading'>";
												echo "<h4 class='panel-title'>";
													echo "<a  data-toggle='collapse' data-parent='#accordian' href='#jenis_".$rowie_jenis['id_jenis']."'>";
														echo "<li><a style=\"cursor:pointer;\" onclick=\"gantiJenis('".$rowie_jenis['id_jenis']."');\"><span>".$rowie_jenis['jenis']." ".$rowie_jenis['kepanjangan']."</span></a></li>";
													echo "</a>";
												echo "</h4>";
											echo "</div>";
										}
									}
								?>
							</div>
						</div><!--/brands_products-->
						
						<div class="brands_products"><!--brands_products-->
							<h2>Package</h2>
							<div class="panel panel-default">				
								<?php
									$hasil=mysql_query("select * from paket_barang");
									if (!empty($hasil))
									{
										while($rowie3=mysql_fetch_array($hasil))
										{
											echo "<div class='panel-heading'>";
												echo "<h4 class='panel-title'>";
													echo "<a  data-toggle='collapse' data-parent='#accordian' href='#paket_".$rowie3['id_paket_barang']."'>";
														echo "<li><a style=\"cursor:pointer;\" onclick=\"gantiPaket('".$rowie3['id_paket_barang']."');\"><span>".$rowie3['nama']."</span></a></li>";
													echo "</a>";
												echo "</h4>";
											echo "</div>";
										}
									}
								?>
							</div>
						</div><!--/brands_products-->

					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					
					<div class="features_items"><!--features_items-->
					<?php
						$x1="select * from diskon_gambar where status=1";
						//echo $x1;
						$hasil1=mysql_query($x1);
						$row1=mysql_fetch_array($hasil1);
						?>
						<a href="persyaratan_diskon.php"><img src="admin1/<?php echo $row1['image']; ?>" alt="Mountain View" style="width:800px;height:160px;"></img></a>
					
						<h2 class="title text-center"></h2>
							<div id="barang"></div>
							
						
						
					</div><!--features_items-->
					
					<?php
					$merk=0;
					$kategori=0;
						if(!isset($_SESSION['id1']))
						{
							$id_recom=10;
						}
						else
						{
							$id_recom=$_SESSION["id1"];
						}
						$q="SELECT distinct b.id_merk,b.id_kategori FROM member m, detail_penjualan d,penjualan p,barang b WHERE p.id_member=m.id_member and p.id_penjualan=p.id_penjualan and b.id_barang=d.id_barang and m.id_member=$id_recom";
						//echo $q;
						$result=mysql_query($q);
						if (!empty($result)){
							while($row=mysql_fetch_array($result))
							{
								$merk=$row['id_merk'];
								$kategori=$row['id_kategori'];
							}
						}
						if(($kategori==0) and ($merk==0))
						{
								$kategori=2;
								$merk=10;
						}
					?>
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php
								$q="select * from gambar_barang g,barang b where b.id_barang=g.id_barang and b.id_merk=$merk";
								//echo $q;
								$hasil=mysql_query($q);
								if (!empty($hasil))
								{	
									for($i = 1; $i <= 3; $i++)
									{
										$rowie3=mysql_fetch_array($hasil)
								?>
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="admin1/<?php echo $rowie3['image']; ?>" alt="" />
															<h2>Rp <?php echo number_format($rowie3['harga'],0,",",".");;?></h2>
															<p><?php echo $rowie3['nama']; ?></p>
															<a href="product-details.php?id=<?php echo $rowie3['id_barang']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Produk Detail</a>
														</div>
													</div>
												</div>
											</div>
								<?php
									}
								}
								?>
								</div>
								<div class="item">	
									<?php
									$p="select * from gambar_barang g,barang b where b.id_barang=g.id_barang and b.id_kategori=$kategori";
									//echo $p;
									$hasil=mysql_query($p);
									if (!empty($hasil))
									{	
										for($i = 1; $i <= 3; $i++)
										{
											$rowie3=mysql_fetch_array($hasil)
									?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin1/<?php echo $rowie3['image']; ?>" alt="" />
													<h2>Rp <?php echo number_format($rowie3['harga'],0,",",".");;?></h2>
													<p><?php echo $rowie3['nama']; ?></p>
													<a href="product-details.php?id=<?php echo $rowie3['id_barang']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Produk Detail</a>
												</div>
											</div>
										</div>
									</div>
									<?php
										}
									}
									?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php
		include_once("footer.php"); 
	?>
	

</body>
</html>