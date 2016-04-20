<!DOCTYPE html>
<html lang="en">
<head>
	
<?php 
	include_once("connect.php"); 
	session_start();
	include_once("head.php"); 
	if(!isset($_SESSION['nama']))
	{
		header("location:login.php");
	}
?>
</head><!--/head-->

<body>
<style>
.warna
{
	color:black;
}
</style>
	<?php 
		include_once("header/atas_wishlist.php"); 
		$id_member=$_SESSION['id1'];	
	?>	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Wishlist</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						$result=mysql_query("select * from wishlist w,barang b,gambar_barang g where b.id_barang=g.id_barang and w.id_barang=b.id_barang and w.id_member=$id_member");
						if (!empty($result)){
							while($row=mysql_fetch_array($result))
							{
							echo "<tr>";
								echo "<td class='cart_product'>";
									echo "<a ><img class='select' src='admin/gambar/".$row['image']."' /></a>";
								echo "</td>";
								echo "<td class='cart_description'>";
									echo "<h4 class='warna'>".$row['nama']."</h4>";
									//echo "<p>". $row['id_barang'] ."</p>";
								echo "</td>";
								echo "<td class='cart_price'>";
									echo "<p>". $row['harga'] ."</p>";
								echo "</td>";
								echo "<td>";
								$_SESSION["wish"]=1;
								?>
								<?php echo "<a href='beli_wishlist.php?id=".$row['id_barang']."&id_wish=".$row['id_wishlist']."'"; ?> class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy Now</a>
								<?php
								echo "</td>";
								echo "<td class='cart_delete'>";
									echo "<a href='delete_wishlist.php?id_wishlist=".$row['id_wishlist']."' class='cart_quantity_delete'>"."<i class='fa fa-times'>"."</i>"."</a>";
								echo "</td>";
							echo "</tr>";
							}
						}
					?>		
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<?php
	include_once("footer.php");
?>
</body>
</html>