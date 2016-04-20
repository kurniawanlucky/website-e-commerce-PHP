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
@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

.detailBox {
    width:500px;
    border:1px solid #bbb;
    margin:50px;
}
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
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
				  <li role="presentation" ><a href="product-details.php">Product Details</a></li>
				  <li role="presentation" ><a class="active" href="komentar_barang.php">Komentar Barang</a></li>
				</ul>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
						
								<?php
								
								   $id=$_SESSION["idBarang"];
								   $q="SELECT * FROM gambar_barang WHERE id_barang=".$id." LIMIT 1";
								   $res=mysql_query($q);
								   while ($row=mysql_fetch_assoc($res))
								   {
										?>
											  <img src="admin/gambar/<?php echo $row["image"];?>" alt=""/>
										<?php
								   }
							 	?>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<?php
										 
										  $q="SELECT * FROM gambar_barang WHERE id_barang=".$id;
										  $res=mysql_query($q);
										  ?>
										    <div class="item active">
										  <?php
										  while ($row=mysql_fetch_assoc($res))
										  {
										    ?>
											  <a href=""><img style="max-height:100px" src="admin/gambar/<?php echo $row["image"];?>" alt=""></a>
											<?php
										  }
										  ?>
										    </div>
										  <?php
										?>
		
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
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
								<p>ID Barang:<?php echo $data["id_barang"]; ?></p>
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
									Tambahkan ke wishlist
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
						//echo $kategori;
					?>
					
					<div class="recommended_items"><!--komentar-->
					<h2 class="title text-center">Komentar</h2>
					<div class="detailBox">
						<div class="commentBox">
							<p class="taskDescription">Silahkan Masukkan Komentar...</p>
						</div>
						<div class="actionBox">
							<ul class="commentList">
							<?php
								$result=mysql_query("select * from komentar k,member m where m.id_member=k.id_member and k.id_barang=$id and k.status=1");
								if (!empty($result)){
									while($row=mysql_fetch_array($result))
									{
							?>
								<li>
									<div class="commentText">
										<span class="date sub-text"><?php echo $row['nama'];?>  <?php echo $row['waktu']; ?></span>
										<p class=""><?php echo $row['komentar']; ?></p> 

									</div>
								</li>
							<?php
									}
								}
								mysql_close($con);
								?>
							</ul>
							<form method="post" class="form-inline" role="form" action="data_add_komentar.php">
								<div class="form-group">
									<input name="komentar" class="form-control" type="text" placeholder="Your comments" />
								</div>
								<div class="form-group">
									<button class="btn btn-default">Add</button>
								</div>
							</form>
						</div><!--/komentar-->
					</div>
		</div>
	</section>
	
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