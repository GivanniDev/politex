<?php 
$pageTitle = "Оформления заказа";
include 'functions.php';
$pdo = pdo_connect_mysql();
?>
<?php
// Если пользователь нажал кнопку добавить в корзину на странице товара, мы можем проверить наличие данных формы
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {

// Установливаем переменные post, чтобы было легко их идентифицировать, а также убедится, что они являются целыми числами
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    
// Подготовливаем SQL, проверяем, существует ли продукт в нашей базе данных
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);

// Извлекаем продукт из базы и преобразовываем в массив
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
// Проверка на пустой массив, существует ли продукт
    if ($product && $quantity > 0) {
// Товар существует в базе данных, теперь мы можем создать / обновить переменную сеанса для корзины
        if (isset($_SESSION['order']) && is_array($_SESSION['order'])) {
            if (array_key_exists($product_id, $_SESSION['order'])) {
// Товар есть в корзине, поэтому просто обновляем количество
                $_SESSION['order'][$product_id] += $quantity;
            } else {
// Товара нет в корзине, по этому просто добавляем его
                $_SESSION['order'][$product_id] = $quantity;
            }
        } else {
// В корзине нет товаров, это добавит первый товар в корзину
            $_SESSION['order'] = array($product_id => $quantity);
        }
    }
 // проверяем параметром URI "remove" идентификатор продукта, убеждаемся что это номер, и проверяем, есть ли он в корзине

}
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['order']) && isset($_SESSION['order'][$_GET['remove']])) {
// Удаляем товар из корзины
    unset($_SESSION['order'][$_GET['remove']]);
    
}
// Обновляем количество товаров в корзине, если пользователь нажмет кнопку "Обновить" на странице корзины покупок
if (isset($_POST['update']) && isset($_SESSION['order'])) {
// Смотрим данные по отправке, чтобы можно обновлять количество для каждого товара в корзине
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Всегда выполняем проверку и валидацию
            if (is_numeric($id) && isset($_SESSION['order'][$id]) && $quantity > 0) {
                // Обновляем количество
                $_SESSION['order'][$id] = $quantity;
            }
        }
    }
// Предотвращаем повторную отправку формы...
    header('location: order.php');
    exit;
}
//Отправляем пользователя на страницу оформления заказа, если он нажмет кнопку Оформить заказ, также корзина не должна быть пустой
if (isset($_POST['order-success']) && isset($_SESSION['order']) && !empty($_SESSION['order'])) {
    header('Location: order-success.php');
    exit;
}
//Проверяем переменную сеанса для товаров в корзине
$products_in_cart = isset($_SESSION['order']) ? $_SESSION['order'] : array();
$products = array();
$subtotal = 0.00;
//Если в корзине есть товары
if ($products_in_cart) {
// В корзине есть товары, поэтому нам нужно выбрать эти товары из базы данных
// Товары в массиве корзины в массив строк вопросительного знака, нам нужен оператор SQL для включения IN (?,?,?,...и т.д.)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
// Нам нужны только ключи массива, а не значения, ключи - это идентификаторы продуктов
    $stmt->execute(array_keys($products_in_cart));
// Извлекаем продукты из базы данных и вовращем результат в виде массива
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Вычислить промежуточный итог
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}
?>
<?php
include './templates/head.php';
include './templates/headerProduct.php';
?>

	<!-- Product Detail -->
	<form action="order.php" method="POST" class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div  class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Продукт</th>
									<th class="column-2"></th>
									<th class="column-3">Цена</th>
									<th class="column-4">Количество</th>
									<th class="column-5">Итог</th>
								</tr>

								<tr class="table_row">
									<?php if (empty($products)): ?>
										<td colspan="5" style="text-align:center;">Корзина пуста</td>
										<?php  else: ?>
											<?php foreach ($products as $product): ?>
									<td class="column-1">
										
										<div class="how-itemcart1">
											
										<img src="images/products/<?=$product['img']?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?= $product['title']?>
									<br><a href="order.php?remove=<?=$product['id']?>" class="remove">Удалить</a></td>
									
									<td class="column-3"><?= $product['price']?> рублей</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?=$product['price'] * $products_in_cart[$product['id']]?></td>
								</tr>
								<?php endforeach; ?>
                <?php endif; ?>

								
							</table>
						</div>

<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
	<div class="flex-w flex-m m-r-20 m-tb-5"></div>
		<input class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" type="submit" value="Обновить" name="update">						
						</div>
					</div>
				</div>
				</form> 
<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
	<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 p-b-30 m-lr-0-xl p-lr-15-sm">
		<form method="POST" action="mail.php"> 
			<h4 class="mtext-105 cl2 txt-center p-b-30">Оформить заказ</h4>

				<div class="bor8 m-b-20 how-pos4-parent">
					<input class="stext-111 cl2 plh3 size-116 p-l-12 p-r-30" type="text" id="name" name="name" placeholder="Имя и Фамилия" >
				</div>

				<div class="bor8 m-b-20 how-pos4-parent">
					<input class="stext-111 cl2 plh3 size-116 p-l-12 p-r-30 lnr lnr-phone-handset" type="text" id="phone" name="phone" placeholder="Телефон">
				</div>
                        
                <div class="bor8 m-b-20 how-pos4-parent">
					<input class="stext-111 cl2 plh3 size-116 p-l-12 p-r-30" type="email" id="email" name="email" placeholder="Email">
				</div>
					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">К оплате:</span>
						</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2" id="subtotal" name="subtotal" >
									<?=$subtotal?> рублей
								</span>
							</div>
					</div>
					<button type="submit" class="send-email flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						Подтвердить
					</button>
						<!--Поля для обработки и отправки заказа -->
						<input type="hidden" name="productTitle" value="<?=$products_in_cart[$product['id']]?>">
						<input type="hidden" name="productQuantity" value="<?=$num_items_in_cart?>">
						<input type="hidden" name="productId" value="<?=$products_in_cart?>">
						<input type="hidden" name="productPrice" value="<?=$subtotal?>">
					</form>
                       
                  
						
				</div>
			</div>
		</div>		    
	</div>		



	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		
	</section>
		

<!-- Footer -->
<?php include('./templates/template_footer.php'); ?>