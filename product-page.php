<?php 
//Страница определенного товара
$pageTitle = "Страница товара";
include 'functions.php';
$pdo = pdo_connect_mysql();
include './templates/head.php';
include './templates/headerProduct.php';

	
    // Извлекаем продукт из базы данных и возвращаем результат в виде массива
    // Проверяем, существует ли продукт (массив не пуст)

?>
<?php 
if (isset($_GET['id'])) {
    // Подготовливаем инструкцию и выполняем внедрение SQL
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Извлекаем продукт из базы данных и возвращаем результат в виде массива
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Проверяем, существует ли продукт (массив не пуст)
    if (!$product) {
        //Простая ошибка, отображаемая, если идентификатор продукта не существует (массив пуст)
        exit('Product does not exist!');
    }
} else {
    // Простая ошибка для отображения, если идентификатор не был указан
    exit('Product does not exist!');
}
?>
	



<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">

	
		
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="images/products/<?= $product['img']?>">
									<div class="wrap-pic-w pos-relative">
										<img src="images/products/<?= $product['img']?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/products/<?= $product['img']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<?= $product['title']?>
						</h4>

						<span class="mtext-106 cl2">
						<?= $product['price']?> рублей
						<?php if ($product['rrp'] > 0): ?> 
                        <span class="stext-105 cl3">&#8381;<?=$product['rrp']?></span>
                                <?php  endif; ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?= $product['description']?>
						</p>

						<form action="order.php" method="POST">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
								<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" required>

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									<div class="m-tb-10">
										<input type="hidden" name="product_id" value="<?=$product['id']?>">
									<input type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-tb-10 pointer" value="Купить">	
									</div>
									
								</div>
						</form>
							</div>	
						</div>

						
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" id="bookmarkme" rel="sidebar" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Добавить в избранное">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>
					
							<a href="https://vkontakte.ru/share.php?url=order.php?id=<?php echo $product['id'] ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="vk">
								<i class="fa fa-vk"></i>
							</a>

							<a href="https://telegram.me/share/url?url=order.php?id=<?php echo $product['id'] ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="telegram">
								<i class="fa fa-telegram"></i>
							</a>

						</div>
					</div>
				</div>
			</div>

			
				
	</section>



	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		
	</section>
		

	<!-- Footer -->
	<?php include('./templates/template_footer.php'); ?>