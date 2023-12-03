<?php 
//Подключение к базе данных MySQL
include 'functions.php';
$pdo = pdo_connect_mysql();
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$pageTitle = "Главная страница" ;

	?>
	<!--Подключение метаданных->
	<?php include('./templates/head.php'); ?>


	<!-- Подключение шапки сайта -->
	<?php include('./templates/header.php'); ?>
	

	<!-- Подключение слайдера -->
	<?php include('./templates/slider.php'); ?>


	<!-- Подключение банера-->
	<?php include('./templates/banner.php'); ?>
	


	

	<!-- Вывод товаров  -->
<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10"> 
			<h3 class="ltext-103 cl5">Новинки</h3>
		</div>
			
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10"></div>
            </div>
            <div class="row isotope-grid">
                <?php foreach ($recently_added_products as $product): ?>
        <div id="goods" class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
	
		    <div class="block2">
                
			    <div  class="block2-pic hov-img0">
				    <img src="images/products/<?=$product['img']?>" alt=<?=$product['title']?>">
				    <a href="product-page.php?id=<?php echo $product['id']?>">
				    <button class=" block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">Купить</button></a>
			    </div>

		        <div class="block2-txt flex-w flex-t p-t-14">
			        <div class="block2-txt-child1 flex-col-l ">
					    <a href="product-page.php?id=<?php echo $product['id']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
					
						<?=$product['title']?> 
					</a>
						<span class="stext-105 cl3"> 
						    <?=$product['price']?> рублей 
                                <?php if ($product['rrp'] > 0): ?> 
                        <span class="stext-105 cl3">&#8381;<?=$product['rrp']?></span>
                                <?php  endif; ?>
					    </span>
                    
                    </div>
                </div> 
            </div>
              
        </div>
            
			
	<?php endforeach; ?>  		
    </div>
</section>
	
<!-- Подключение подвала сайта -->
<?php include('./templates/template_footer.php'); ?>
