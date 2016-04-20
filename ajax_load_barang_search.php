<?php
	session_start();
	require 'connect.php';
	require 'functions.php';
	
	$page = $_POST["page"];
	$keyword = $_POST["keyword"];
	
	$jumlah_data_per_page = 9;
	
	$query = "select * from barang where nama like '%$keyword%'";
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
	$start_limit = $page * $jumlah_data_per_page;
	
	$query = "select barang.*,kategori1.nama as nama_kategori,merk1.nama as nama_merk from barang 
				left join kategori1 on barang.id_kategori=kategori1.id_kategori
				left join merk1 on barang.id_merk=merk1.id_merk
				where barang.nama like '%$keyword%' and barang.jumlah_stock >= '1'
				order by id_barang desc limit $start_limit,$jumlah_data_per_page";
	//echo $query;
	$result = mysql_query($query);
	if(mysql_num_rows($result) <= 0)
	{
		
	}
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
						<a href="product-details.php?id=<?php echo $id_barang; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>product-details</a>
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
	  <ul class="pagination">
		<?php
			if($page > 0)
			{
		?>
		<li>
		  <a style="cursor:pointer;" onclick="gantiPage('<?php echo ($page-1); ?>')" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
		<?php
			}
			else
			{
		?>
		<li class="disabled">
		  <a href="" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
		<?php
			}
		?>
		<?php
			for($i=0; $i<$jumlah_page; $i++)
			{
			?>
			<li <?php if($page == $i) { echo "class=\"active\""; } ?> ><a style="cursor:pointer;" onclick="gantiPage('<?php echo $i; ?>')"><?php echo ($i+1); ?></a></li>
			<?php
			}
		?>
		
		<?php
			if($page < $jumlah_page - 1)
			{
		?>
		<li>
		  <a style="cursor:pointer;" onclick="gantiPage('<?php echo ($page+1); ?>')" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>
		<?php
			}
			else
			{
		?>
		<li class="disabled">
		  <a href="" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>
		<?php
			}
		?>
	  </ul>
	</nav>
	<?php
	
	
?>