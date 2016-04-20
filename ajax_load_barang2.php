<?php
	session_start();
	require 'connect.php';
	require 'functions.php';
	/*
	$page = $_POST["page"];
	$id_merk = $_POST["id_merk"];
	$id_kategori = $_POST["id_kategori"];
	*/
	
	$id_kat=$_GET["id_paket"];
	//$keyword = $_POST["keyword"];
	
	//$jumlah_data_per_page = 9;
	
	//$query = "select * from barang where id_barang in (SELECT id_barang from detail_paket WHERE id_paket=". $id_kat .")";
	//$resultCount = mysql_query($query);
	//$jumlah_data = mysql_num_rows($resultCount);
	
	
	//$start_limit = $page * $jumlah_data_per_page;
	
	$query = "select barang.*,kategori1.nama as nama_kategori,merk1.nama as nama_merk from barang 
				left join kategori1 on barang.id_kategori=kategori1.id_kategori
				left join merk1 on barang.id_merk=merk1.id_merk
				where barang.id_barang  in (SELECT id_barang from detail_paket WHERE id_paket_barang=". $id_kat .") and barang.jumlah_stock >= '1'
				order by id_barang desc";
	//echo $query;
	//echo $query;
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
						<img src="admin1/<?php echo $gambar; ?>" alt="<?php echo $nama_barang; ?>" />
						<h2>Rp <?php echo number_format($harga,0,",","."); ?></h2>
						<p><?php echo $nama_barang; ?></p>
					</div>
			</div>
		</div>
	</div>
<?php
	}
	?><div style="clear: both"></div><?php
	
	//nav
	?>
	<nav>
			<center>
				<a href="session_shopping_cart.php?tipe=paket&id=<?php echo $id_kat; ?>&jumlah=1" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			</center>
	</nav>
	<?php
	
	
?>