<?php
$pageTitle = "Каталог" ;
include 'functions.php';
include './templates/head.php';
include './templates/headerProduct.php';

$pdo = pdo_connect_mysql();
// Количество товаров, отображаемых на каждой странице
$num_products_on_each_page = 4;
// Текущая страница, в URL-адресе будет отображаться как index.php?page=products&p=1, index.php?page=products&p=2 и т.д...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Выберите товары, заказанные по добавленной дате
$stmt = $pdo->prepare('SELECT * FROM products');
// bindValue позволит нам использовать целое число в инструкции SQL, нам нужно использовать для ОГРАНИЧЕНИЯ
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Извлекает продукты из базы данных и вовращаем результат в виде массива
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Получить общее количество продуктов


?>


	<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<?php include('./templates/categoryProduct.php'); ?>
			</div>
		</div>
				
			<div class="row isotope-grid">
				<?php 
				if (isset($_GET['category'])){
					$sql = "SELECT * FROM products WHERE category = :categoryTitle";
					$stmt = $pdo->prepare($sql); 
					$stmt->bindValue(':categoryTitle', $_GET['category']);
					$stmt->execute();
					$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
				} else {
					$sql = "SELECT * FROM products";
					$result = $pdo->query($sql);
					$products = $result->fetchAll(PDO::FETCH_ASSOC);
				}
				foreach ($products as $product): ?>
        			<div id="goods" class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
	
		    			<div class="block2">
						
                
			    			<div  class="block2-pic hov-img0">
				    			<img src="images/products/<?=$product['img']?>" alt=<?=$product['title']?>">
								
				    				<a href="product-page.php?id=<?=$product['id']?>">
				    					<button class=" block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">Купить</button></a>
			    			</div>

								<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
										
											<a href="product-page.php?id=<?=$product['id']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?=$product['title']?> </a>
											<span class="stext-105 cl3"> 
												<?=$product['price']?> рублей 
													<?php if ($product['rrp'] > 0): ?> 
											<span class="rrp">&#8381;<?=$product['rrp']?></span>
													<?php  endif; ?>
											</span>
										</div>
								</div> 
            			</div>
					</div>
    			<?php endforeach; ?>  	          
        	</div>
    </div>        
</div>			
		
<!-- Footer -->
<?php include('./templates/template_footer.php'); ?>
