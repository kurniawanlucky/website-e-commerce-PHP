<?php
  include "connect.php";
  session_start();
  $totalDiskon=0;
  $subtotal=0;
  $totaljml=0;
  $diskon=0;
  $totalHarga1=0;
 $arData=$_SESSION["shopping_cart"];
  foreach ($arData as $key => $val) 
	  {
	   
	    //$arrD=$arData[$key];
	    //print_r($val);
		if (isset($val["tipe"]))
		{
			if ($val["tipe"]=="barang")
			{
				$totaljml=$totaljml+$val["jml"];
			  $minBarang=0;
			  $diskon=0;
			  $q="SELECT * FROM diskon WHERE jumlah_barang<='".$totaljml ."' AND SYSDATE()>=waktu AND SYSDATE()<=waktu_selesai ORDER BY jumlah_barang DESC LIMIT 1";
			  $res=mysql_query($q);
			  
			  while ($row=mysql_fetch_assoc($res))
			  {
				$diskon=$row["diskon"];
			  }
			  if ($diskon>0)
			  {
				$subtotal=0;
				$q="SELECT * FROM barang WHERE id_barang='$key'";
				$res=mysql_query($q);
				while ($row=mysql_fetch_assoc($res))
				{
				  $subtotal=(($row["harga"]*$val["jml"])*$diskon)/100;
				}
				
				foreach ($arData as $key => $val) 
				  {
					$arrD=$arData[$key];
					if (isset($arrD["tipe"]))
					{
						if ($arrD["tipe"]=="barang")
						{
						   
						   $qx="SELECT * FROM barang WHERE id_barang=$key";
						   $resx=mysql_query($qx);
						   while ($rowx=mysql_fetch_assoc($resx))
						   {
							 $totalHarga1=$totalHarga1+($rowx["harga"]*$arrD["jml"]);
						   }
						   
						}
					}
				  }
				$totalDiskon=($totalHarga1*$diskon)/100;
			  }
			}
		}
		
	  }
	  
  if ($_POST)
  {
    $action=$_POST["btnsubmit"];
	if ($action=="Save" || $action=="Checkout")
	{
	  $arData=$_SESSION["shopping_cart"];
	  foreach ($arData as $key => $val) 
	  {
	    $arrD=$arData[$key];
		if (isset($_POST["quantity".$key]))
		{
			$arrD["jml"]=$_POST["quantity".$key];
			$arData[$key]=$arrD;
		}
		
	  }
	  $_SESSION["shopping_cart"]=$arData;
	}
	if ($action=="Checkout")
	{
	  $id="";
		    $totalHarga=0;
			$totalBerat=0;
	  foreach ($arData as $key => $val) 
	  {
	    $arrD=$arData[$key];
		if (isset($arrD["tipe"]))
		{
			if ($arrD["tipe"]=="barang")
			{
			   
			   $q="SELECT * FROM barang WHERE id_barang=$key";
			   $res=mysql_query($q);
			   while ($row=mysql_fetch_assoc($res))
			   {
			     $totalHarga=$totalHarga+($row["harga"]*$arrD["jml"]);
				 $totalBerat=$totalBerat+($row["berat"]*$arrD["jml"]);
			   }
			   
			}
			else if ($arrD["tipe"]=="paket")
			{
				
			   $q="SELECT * FROM paket_barang WHERE id_paket_barang=$key";
			   $res=mysql_query($q);
			   while ($row=mysql_fetch_assoc($res))
			   {
			     $totalHarga=$totalHarga+($row["harga"]*$arrD["jml"]);
				 $totalBerat=$totalBerat+($row["berat"]*$arrD["jml"]);
			   }
			}
			
		
			
		}
			
		
	  }
	  $q="INSERT INTO penjualan (waktu,total_berat,total,diskon) VALUES (SYSDATE(),$totalBerat,$totalHarga,$totalDiskon)";
			mysql_query($q);	
			$id=mysql_insert_id();
			
			 foreach ($arData as $key => $val) 
	  {
	    $arrD=$arData[$key];
		if (isset($arrD["tipe"]))
		{
		    $totalHarga=0;
			$totalBerat=0;
			$harga=0;
			if ($arrD["tipe"]=="barang")
			{
			   
			   $q="SELECT * FROM barang WHERE id_barang=$key";
			   $res=mysql_query($q);
			   while ($row=mysql_fetch_assoc($res))
			   {
			     $harga=$row["harga"];
			     $totalHarga=$totalHarga+($row["harga"]*$arrD["jml"]);
				 $totalBerat=$totalBerat+($row["berat"]*$arrD["jml"]);
			   }
			   $q="INSERT INTO detail_penjualan (id_penjualan,id_barang,jumlah_barang,harga_barang,subtotal,tipe_barang) ".
			      "VALUES ($id,$key,". $arrD["jml"] .",$harga,$totalHarga,'barang')";
			   mysql_query($q);
			}
			else if ($arrD["tipe"]=="paket")
			{
				
			   $q="SELECT * FROM paket_barang WHERE id_paket_barang=$key";
			   $res=mysql_query($q);
			   while ($row=mysql_fetch_assoc($res))
			   {
			     $harga=$row["harga"];
				 $totalHarga=$totalHarga+($row["harga"]*$arrD["jml"]);
				 $totalBerat=$totalBerat+($row["berat"]*$arrD["jml"]);
			   }
			   
			   $q="INSERT INTO detail_penjualan (id_penjualan,id_barang,jumlah_barang,harga_barang,subtotal,tipe_barang) ".
			      "VALUES ($id,$key,". $arrD["jml"] .",$harga,$totalHarga,'paket')";
			   mysql_query($q);
			}
			
		
			
		}
			
		
	  }
	  //$q="INSERT INTO penjualan ()";
	  header("location:isidetailpenjualan.php?id=".$id);
	}
  }
  
	  $_SESSION["diskon"]=$totalDiskon;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once("head.php"); ?>
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
				var total_berat2 = 0;
				var n = $("#total_data").val();
				for(i=0; i<n; i++)
				{
					id_barang = $("#id_barang"+i.toString()).val();
					total_berat2 += parseInt( $("#subberat"+id_barang.toString()).html());
				}
                var xurl="ajaxdetailkota.php?kota="+kota+"&berat="+total_berat2;
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
	<style>
	.cclass {
	margin:0px;padding:0px;
	width:100%;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.cclass table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.cclass tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.cclass table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.cclass table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.cclass tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.cclass tr:hover td{
	
}
.cclass tr:nth-child(odd){ background-color:#ffaa56; }
.cclass tr:nth-child(even)    { background-color:#ffffff; }.cclass td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:17px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.cclass tr:last-child td{
	border-width:0px 1px 0px 0px;
}.cclass tr td:last-child{
	border-width:0px 0px 1px 0px;
}.cclass tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.cclass tr:first-child td{
		background:-o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00) );
	background:-moz-linear-gradient( center top, #ff7f00 5%, #bf5f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");	background: -o-linear-gradient(top,#ff7f00,bf5f00);

	background-color:#ff7f00;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:16px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.cclass tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00) );
	background:-moz-linear-gradient( center top, #ff7f00 5%, #bf5f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");	background: -o-linear-gradient(top,#ff7f00,bf5f00);

	background-color:#ff7f00;
}
.cclass tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.cclass tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
body{
  font-family: "Arial";
  font-size: 16px;
}
	</style>
		<?php include_once("header/atas_cart.php"); ?>	
	<form class="body" method="post">
	<section id="cart_items">
		<div class="container">

		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
		</div>
		
				  <div class="cclass" style="margin-bottom:10px">
					  
						  <table>
							<tr>
							  <td>Name</td>
							  <td>Weight</td>
							  <td>Price</td>
							  <td>Quantity</td>
							  <td>Sub-total</td>
							  <td></td>
							</tr>
							<?php
								$total=0;
								$total_berat=0;
							   $arData=$_SESSION["shopping_cart"];
							   $i = 0;
							   foreach ($arData as $key => $val) 
							   {
								 $key=mysql_real_escape_string($key);
								 if (isset($val["tipe"]))
								 {
									 if ($val["tipe"]=="barang")
									 {
										 $q="SELECT * FROM barang WHERE id_barang='$key'";
										 //echo $q;
										 $res=mysql_query($q);
										 while ($row=mysql_fetch_assoc($res))
										 {
										   $val2=$val["jml"];
										   $subtotal=$val2*$row["harga"];
										   $subberat=$val2*$row["berat"];
										   $total=$total+$subtotal;
										   $total_berat=$total_berat+$subberat;
										   ?>
											 <tr>
										   <?php
											 
											 echo "<td style='font-size: 16px'>".$row["nama"]."<input type='hidden' id='id_barang".$i."' value='".$row["id_barang"]."' /></td>";
											 echo "<td style='font-size: 16px' id='subberat". $row["id_barang"] ."'>".$subberat." gram"."</td>";
											 echo "<td style='text-align:right'>Rp". number_format($row["harga"]) ."</td>"; 
											 echo "<td class='cart_quantity'>";
											 echo 			"<div class='cart_quantity_button'>";
											 echo				"<a style='cursor:pointer' onclick=plus('". $row["id_barang"] ."',". $row["harga"] .",". $row["berat"] .")> + </a>";
											 echo 				"<input class='cart_quantity_input' type='text' id='quantity". $row["id_barang"] ."' name='quantity". $row["id_barang"] ."' value=$val2 autocomplete='off' size='2'>";
											 echo 				"<a style='cursor:pointer' onclick=minus('". $row["id_barang"] ."',". $row["harga"] .",". $row["berat"] .")> - </a>";
											 echo			"</div>";
											 echo "</td>";
											 echo "<td style='text-align:right' id='subtotal". $row["id_barang"] ."'>Rp". number_format($subtotal) ."</td>";
											 echo "<td class='cart_delete'>"."<a class='cart_quantity_delete' href='delete_cart.php?key=". $row["id_barang"] ."'><i class='fa fa-times'></i></a>"."</td>";
										   ?>
											 </tr>
										   <?php
										   $i++;
										 }
									 }
									 else {
										 $q="SELECT * FROM paket_barang WHERE id_paket_barang='$key'";
										 //echo $q;
										 $res=mysql_query($q);
										 while ($row=mysql_fetch_assoc($res))
										 {
										   $val2=$val["jml"];
										   $subtotal=$val2*$row["harga"];
										   
										   $subberat=$val2*$row["berat"];
										   $total=$total+$subtotal;
										   $total_berat=$total_berat+$subberat;
										   ?>
											 <tr>
										   <?php
											 
											 echo "<td>".$row["nama"]."<input type='hidden' id='id_barang".$i."' value='".$row["id_paket_barang"]."' /></td>";
											 echo "<td id='subberat". $row["id_paket_barang"] ."'>".$subberat." gram"."</td>";
											 echo "<td style='text-align:right'>Rp". number_format($row["harga"]) ."</td>"; 
											 echo "<td class='cart_quantity'>";
											 echo 			"<div class='cart_quantity_button'>";
											 echo				"<a style='cursor:pointer' onclick=plus('". $row["id_paket_barang"] ."',". $row["harga"] .",". $row["berat"].")> + </a>";
											 echo 				"<input class='cart_quantity_input' type='text' id='quantity". $row["id_paket_barang"] ."' name='quantity". $row["id_paket_barang"] ."' value=$val2 autocomplete='off' size='2'>";
											 echo 				"<a style='cursor:pointer' onclick=minus('". $row["id_paket_barang"] ."',". $row["harga"] .",". $row["berat"].")> - </a>";
											 echo			"</div>";
											 echo "</td>";
											 echo "<td style='text-align:right' id='subtotal". $row["id_paket_barang"] ."'>Rp". number_format($subtotal) ."</td>";
											 echo "<td class='cart_delete'>"."<a class='cart_quantity_delete' href='delete_cart.php?key=". $row["id_paket_barang"] ."'><i class='fa fa-times'></i></a>"."</td>";
										   ?>
											 </tr>
										   <?php
										   $i++;
										 }
									 }
								 }
								 
								 
								 //echo $key .";".$arData[$key];
							   }
							?>
						</table>
						<input type="hidden" id="total_data" value="<?php echo $i; ?>" />
					
					
				</div>
		
		</div>
	</section> <!--/#cart_items-->
	<script>
	  function formatDollar(num) {
			var p = num.toFixed(2).split(".");
			return "Rp" + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
				return  num + (i && !(i % 3) ? "," : "") + acc;
			}, "");
	  } 
	  function plus(id,harga,berat)
	  {
	    var nilai=(($("#quantity"+id).val())*1)+1;
		$("#quantity"+id).val(nilai);
		var subtotal=nilai*harga;
		var subberat=nilai*berat;
		$("#subtotal"+id).html(formatDollar(subtotal));
		$("#subberat"+id).html(subberat);
	  }
	  function minus(id,harga,berat)
	  {
	    var nilai=(($("#quantity"+id).val())*1)-1;
		$("#quantity"+id).val(nilai);
		var subtotal=nilai*harga;
		var subberat=nilai*berat;
		$("#subtotal"+id).html(formatDollar(subtotal));
		$("#subberat"+id).html(subberat);
	  }
	  <?php
	    echo "total_berat=$total_berat";
	  ?>
	</script>
	<section id="do_action">
		<div class="container">
			<div class="row">
				<!--<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_info">
							<input id="nama" name="nama" type="text" placeholder="nama penerima" />
							<input id="alamat" name="alamat" type="text" placeholder="alamat penerima" />
							<input id="nomor_handphone" name="nomor_handphone" type="text" placeholder="nomor handphone" />
							<li class="single_field">
								<label>Provinsi:</label>
								<select id="provinsi" name="provinsi" class="naik">
									<?php
									/*echo "<option value=''>Select One</option>";
									$provinsi="select * from provinsi"; // Query to collect data from table 
									$resultprov=mysql_query($provinsi);
									while($rowprovinsi=mysql_fetch_array($resultprov))
									{
										echo "<option value=$rowprovinsi[id_provinsi]>$rowprovinsi[provinsi]</option>";
									}*/
									?>
								</select>
								
							</li>
							<li class="single_field">
								<label>Kota:</label>
								<select name="kota" id="kota" class="naik">
									<option>-select your city-</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						
						<ul id="detailkota" class="user_option">
							
								
						</ul>
						
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>-->
					
				</div>
				<?php
				
					//echo $total;
					//$totalDiskon=($total*$diskon)/100;
					$setelahdis=$total-$totalDiskon;
					$_SESSION["dis"]=$totalDiskon;
				?>
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Total <span><?php echo number_format($total);?></span></li>
							<li>Diskon<span><?php echo number_format($totalDiskon);?></span></li>
							<li>Total <span><?php echo number_format($setelahdis);?></span></li>
						</ul>
							<a class="btn btn-default update"><input type="submit" name="btnsubmit" value="Save"/></a>
							<a class="btn btn-default check_out"><input name="btnsubmit" type="submit" value="Checkout"/></a>
					</div>
				</div>
				
			</div>
		</div>
	</section><!--/#do_action-->
	</form>
	<?php 
		include_once("footer.php");
	?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>