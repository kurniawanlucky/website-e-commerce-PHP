<?php 
session_start();
	require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("head.php"); ?>
</head><!--/head-->

<body>
<style>

.nav-pills {
    padding-top: 20px;
}

.nav-pills .active{
    font-color: #ff7300;
    border-radius: 0px;
	color: #ff7300;
}


.nav-pills > li > a {
    font-size: 15px;
    color: #b6b4b3;
    border-radius: 5px 5px 0 0;
    padding: 10px;
}

.nav-pills > li > a:hover {
    background-color: #ff7300;
    color: white;
}

</style>
	<?php include_once("atas1.php"); ?>	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include_once("left_sidebar.php"); ?>
				</div>
				<div class="col-sm-9 padding-right">
				<ul class="nav nav-pills ">
				  <li role="presentation"><a class="active" href="product-details.php">Product Details</a></li>
				  <li role="presentation"><a href="komentar_barang.php">Komentar Barang</a></li>
				</ul>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
						
								<?php
								    $id="";
										  if (isset($_SESSION["idBarang"]))
										  {
										   $id=mysql_real_escape_string($_SESSION["idBarang"]);
										  }
								   $q="SELECT * FROM gambar_barang WHERE id_barang=".$id." LIMIT 1";
								   $res=mysql_query($q);
								   while ($row=mysql_fetch_assoc($res))
								   {
										?>
											  <img src="admin1/<?php echo $row["image"];?>" alt=""/>
										<?php
								   }
							 	?>
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2>
								  <!--Anne Klein Sleeveless Colorblock Scuba
								   -->
								  <?php
								     
									 $data=array();
								     $q="SELECT * FROM barang WHERE id_barang=".$id;
									 $res=mysql_query($q);
									 while ($row=mysql_fetch_assoc($res))
									 {
									   $data=$row;
									 }
								     echo $data["nama"];
								  ?>
								</h2>
								
								<?php $_SESSION["id_barang"]=$data["id_barang"] ?>
								<form method="get" action="session_shopping_cart.php" id="formdata">
									<span>
										<span>
										  <?php
											echo "Rp ".number_format($data["harga"]);
										  ?>
										</span>
										<label>Quantity:</label>
										<input type="hidden" name="id" value="<?php echo $id;?>"/>
										<input type="hidden" name="tipe" value="barang"/>
										<input type="text" name="jumlah" value="1" />
										<button type="button" class="btn btn-fefault cart" id="bt">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
										
									</span>
								</form>
								<a href="insert_wishlist.php">
								<button type="button" class="btn btn-fefault cart" id="bt">
									<i class="fa fa-star"></i>
									Add to Wish List
								</button>
								</a>
								<script>
								 
								</script>
								<p></p>
								<p><b>Availability:</b> <?php echo $data["jumlah_stock"]; ?></p>
								
								<p><b>Brand:</b> <?php 
									$result2=mysql_query("select * from merk1 where `id_merk`=$data[id_merk]");
									$row2=mysql_fetch_array($result2);
									echo $row2["nama"];
								?>
								</p>
								<p><b>Produk Detail:</b> <?php echo $data["keterangan"]; ?></p>
								<p><b>Description:</b> <?php echo $data["deskripsi"]; ?></p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
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
	</section>
	<?php
	
	?>
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script>
	  $(document).ready(function()
	  {
	    $("#bt").click(function()
		{
		  $("#formdata").submit();
		});
	  });
	</script>
</body>
</html>