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
		include_once("slidebar/slidebar_barang.php");
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
                     Data Kategori
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="">Barang</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="barang_kategori_select.php">Kategori</a><span class="divider-last">&nbsp;</span></li>
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
						<a href="barang_add_kategori.php"><button class="btn btn-primary">Add Kategori</button></a>
						<p>
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
									<th>No</th>
									<th>Nama kategori</th>
									<th>Ke Barang</th>
									<th>Hapus</th>
									<th>Edit</th>
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$no=1;
								$result=mysql_query("select * from kategori1 where `ada`=1");
								if (!empty($result)){
									while($row=mysql_fetch_array($result))
									{	
							?>
                                <tr class="odd gradeX">
								<?php
									echo "<td style='text-align:right'>".$no."</td>";
									//echo "<td>".$row['id_merk']."</td>";
									echo "<td>".$row['nama']."</td>";
									//echo "<td>".$row['tags']."</td>";
									//echo "<td>".$row['ada']."</td>";
									echo "<td><a href='barang_simpan_session.php?id_kategori=".$row['id_kategori']."'><button type='button' class='btn-custom6 btn-small'><i class='icon-chevron-right'></i></button></a>.</td>  ";
									echo "<td><a href='barang_delete_kategori.php?id_kategori=".$row['id_kategori']."'><button type='button' class='btn-custom5 btn-small'><i class='icon-trash icon-white'></i></button></a>.</td>  ";
									echo "<td><a href='barang_kategori_edit.php?id_kategori=".$row['id_kategori']."'><button type='button' class='btn-custom7 btn-small'><i class='icon-pencil icon-white'></i></button></a>.</td>";
								?>	
                                </tr>
							<?php
										$no++;
									}
								}
							?>
                            </tbody>
                        </table>
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
