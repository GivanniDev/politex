<?php 
include './functions.php' ;

//Страница добавления товара

if ( isset($_SESSION['login']) && $_SESSION['login'] == 'on'){

}else {
	header('Location: index.php');
}

$pageTitle = "Админпанель" ?>
<?php include('./templates/head.php');?> 

<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg col-md-8 mx-auto w-full-md">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
							Добавить товар
						</h4>
					<form enctype="multipart/form-data" action="add.php" method="POST" >
						
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="title" placeholder="Название товара">
							<img class="how-pos4 pointer-none" >
						</div>
                        <div class="form-group">
							<select class="form-control" name="category">
								<option value="Канцтовары">Канцтовары</option>
								<option value="Одежда">Одежда</option>
								<option value="Аксессуары">Аксессуары</option> 
								
							</select>
						</div>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="price" placeholder="Цена">
						</div>
                        <div class="m-b-20 pt-3">
							<label for="img">Фото:</label>
							<input name="img" type="file" class="form-control-file" id="img">
						</div>
                        <div>
							<div class="bor8 m-b-30">
								<label for="description"></label>
								<textarea name="description" class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" id="description" rows="3" placeholder="Описание"></textarea>
							</div>
                        </div>
						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                           Добавить
						</button>
                        <br>
                        <p class="text-center"><a href="index.php" class="text-secondary">На главную страницу</a></p>
					</form>
				</div>
            </div>
		</div>
	</section>	
	

	<?php 
include('./templates/template_footer.php');
?>

