<?php
	session_start();
	require 'connect.php';
	require 'functions.php';
	$id_merk = "";
	$id_kategori = "";
	$keyword = "";
	if(isset($_GET["keyword"]))
	{
		$keyword = $_GET["keyword"];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("head.php"); ?>
	
	
	<!--<script src="source/itemjs.js"></script>-->
	
	<script>
	
	
	
	var page = 0;
	
	$(document).ready(function(){
		getBarang = function(){
			keyword = $("#keyword").val();
			$.post("ajax_load_barang_search.php", {"keyword" : keyword, "page" : page},function(data){
				$("#barang").html(data);
			});
		
		}
		
		
		
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
					<?php include_once("left_sidebar.php"); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Hasil Pencarian Barang '%<?php echo $keyword; ?>%'</h2>
							<input type="hidden" id="keyword" name="keyword" value="<?php echo $keyword; ?>" />
							<div id="barang"></div>
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