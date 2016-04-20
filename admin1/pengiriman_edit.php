<?php
	session_start();
	require 'connect.php';

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <?php
	include_once("head.php");
   ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <?php
	include_once("atas1.php");
   ?>
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <?php
		include_once("slidebar/slidebar_jasa_pengiriman.php");
	  ?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Edit Pengiriman
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Penjualan</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Order</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            
            
           
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Managed Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
							<form action="pengiriman_data_edit.php" method="post">
							<?php
							$result=mysql_query("select * from pengiriman where id_pengiriman=$_GET[id_pengiriman]");
							if (!empty($result)){
								while($row=mysql_fetch_array($result))
								{
									$result2=mysql_query("select * from kota k,provinsi p where k.id_provinsi=p.id_provinsi and k.id_kota=$row[id_kota]");
									$row2=mysql_fetch_array($result2);
									$result4=mysql_query("select * from nama_jasa_pengiriman where `id_nama_jasa`=$row[id_nama_jasa]");
									$row4=mysql_fetch_array($result4);
							?>
							<section class="span3 kanan">ID Pengiriman: </section>
							<section>
								<input id="idpengiriman" type="text" name="idpengiriman" value="<?php echo $row['id_pengiriman'];?>" readonly /><br/>
							</section>
							<section class="span3 kanan">Nama pengiriman: </section>
							<section>
								<select id="nama" name="nama" class="naik">
									<?php
									echo "
									<option value=''>Select One</option>";
									$pengiriman="select * from nama_jasa_pengiriman"; // Query to collect data from table 
									$resultpengiriman=mysql_query($pengiriman);
										while($rowpengiriman=mysql_fetch_array($resultpengiriman))
										{
											echo "<option value=$rowpengiriman[id_nama_jasa]>$rowpengiriman[nama_jasa]</option>";
										}
									?>
								</select>
							</section>
							<section class="span3 kanan">Pilih Kota: </section>
								<section>
									<select id="kota" name="kota" class="naik">
										<?php
										echo "
										<option value=''>Select One</option>";
										$kota="select * from kota"; // Query to collect data from table 
										$resultprov=mysql_query($kota);
										while($rowprovinsi=mysql_fetch_array($resultprov))
										{
											echo "<option value=$rowprovinsi[id_kota]>$rowprovinsi[kota]</option>";
										}
										?>
									</select>
								</section>
							<section class="span3 kanan">Minimal Berat: </section>
							<section>
								<input id="berat" type="text" name="berat" required="required" value="<?php echo $row['minimal_berat'];?>"/><br/>
							</section>
							<section class="span3 kanan">Ekonomi: </section>
							<section>
								<input id="ekonomi" type="text" name="ekonomi" required="required" value="<?php echo $row['ekonomi'];?>"/><br/>
							</section>
							<section class="span3 kanan">Ekspres: </section>
							<section>
								<input id="ekspress" type="text" name="ekspres" required="required" value="<?php echo $row['ekspres'];?>"/><br/>
							</section>
							<section class="span3 kanan"></section>
							<section>
								<input id="submit" class="btn btn-mini" type="submit" value="Submit"/>
							</section>
							<?php
								}
							}
							mysql_close($con);
							?>	

						</form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>   
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->   
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
</body>
<!-- END BODY -->
</html>
