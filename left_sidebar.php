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
													echo "<ul>";
													echo "<li><a style=\"cursor:pointer;\" href=\"index.php?id_merk=".$rowie2['id_merk']."&id_kategori=".$rowie['id_kategori']."\"   ><span>".$rowie2['nama']."</span></a></li>";
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
											
											$hasil2=mysql_query("select * from kategori1");
											if (!empty($hasil2))
											{
												while($rowie2=mysql_fetch_array($hasil2))
												{
													echo "<ul>";
													echo "<li><a style=\"cursor:pointer;\" href=\"index.php?id_merk=".$rowie['id_merk']."&id_kategori=".$rowie2['id_kategori']."\"><span>".$rowie2['nama']."</span></a></li>";
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
							<h2>Paket</h2>
							<div class="panel panel-default">				
								<?php
									$hasil=mysql_query("select * from paket_barang");
									if (!empty($hasil))
									{
										while($rowie=mysql_fetch_array($hasil))
										{
											echo "<div class='panel-heading'>";
												echo "<h4 class='panel-title'>";
													echo "<a  href='paket.php?id_paket_barang=".$rowie['id_paket_barang']."'>";
														echo "".$rowie['nama']."";
													echo "</a>";
												echo "</h4>";
											echo "</div>";		
										}
									}
								?>
							</div>
						</div><!--/brands_products-->

					
					</div>