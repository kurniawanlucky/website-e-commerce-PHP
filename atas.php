<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/usahaparfum.png" alt="" /></a>
						</div>
						<?php
						/*<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>*/
						?>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="customer/profile.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="session_shopping_cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="logout.php"><i class="fa fa-crosshairs"></i> Logout</a></li>
								<?php
									if(!isset($_SESSION['nama']))
									{
										?>
											<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
										<?php	
									}
									else
									{
										//echo "<a href='php_do/logout.php' ><div class='logout-hex'></div></a>";
										
										echo "<li>";
										echo "<div class='warna'>";
										echo "Logged in as <a href='memberpage/profile.php'>";
										echo "</div>";
										echo "</li>";
										echo "<li>";
										echo $_SESSION['nama'];
										echo "</a>";
										echo "</li>";
										
										//echo "</div>";
										
									}
								 ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>