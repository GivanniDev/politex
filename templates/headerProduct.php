
<body class="animsition">
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			
			
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
                        <li>
								<a href="index.php">Главная</a>
							</li>

							<li>
								<a href="products.php">Товары</a>
							</li>
							<li>
								<a href="about.php">О нас</a>
							</li>

							<li>
								<a href="contact.php">Связаться</a>
							</li>
							
						</ul>
					</div>	
					
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m m-r-15">
						<div class="link-icons cl2 hov-cl1 trans-04 p-r-11 p-l-10">
							<a href="order.php">
								
								<i class="zmdi zmdi-shopping-cart">
									<?php 
										$num_items_in_cart = isset($_SESSION['order']) ? count($_SESSION['order']) : 0;
									?>
							<span>
								<?=$num_items_in_cart?>
							</span>
								</i>
							</a>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo.png" alt="IMG-LOGO"></a>
			</div>
		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
						<div class="link-icons cl2 hov-cl1 trans-04 p-r-11 p-l-10">
							<a href="order.php">
								
								<i class="zmdi zmdi-shopping-cart">
									<?php 
										$num_items_in_cart = isset($_SESSION['order']) ? count($_SESSION['order']) : 0;
									?>
							<span>
								<?=$num_items_in_cart?>
							</span>
								</i>
							</a>
						</div>
					</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
            <li>
					<a href="index.php">Главная</a>	
				</li>

				<li>
					<a href="products.php">Каталог</a>
				</li>

				<li>
					<a href="about.php">О нас</a>
				</li>

				<li>
					<a href="contact.php">Связаться</a>
				</li>
				
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				
			</div>
		</div>
	</header>