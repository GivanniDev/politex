
<!--Переход по категориям осуществляется через GET запрос-->

<a href="products.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" > Все товары </a>

<?php if ( isset($_GET['category']) && $_GET['category'] == 'Канцтовары' ): ?>
	<a href="products.php?category=Канцтовары" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".a">Канцтовары</a>
		<?php else: ?>
	<a href="products.php?category=Канцтовары" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">Канцтовары</a>
		<?php endif ?>

<?php if ( isset($_GET['category']) && $_GET['category'] == 'Одежда' ): ?>
	<a href="products.php?category=Одежда" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"data-filter=".b">Одежда</a>
		<?php else: ?>
			<a href="products.php?category=Одежда" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" ">Одежда</a>
		<?php endif ?>

<?php if ( isset($_GET['category']) && $_GET['category'] == 'Аксессуары' ): ?>
	<a  href="products.php?category=Аксессуары" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".c">Аксессуары</a>
		<?php else: ?>
	<a  href="products.php?category=Аксессуары" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">Аксессуары</a>
		<?php endif ?>
		
