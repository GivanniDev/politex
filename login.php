<?php
$pageTitle = "Вход" ;
include './templates/head.php';
?>

<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		
	</section>	

 

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="bor10 p-lr-70 p-t-55 p-b-70 mx-auto w-full-md">
					<form action="check.php" method="POST" >
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Вход
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="password" name="password" placeholder="Пароль">
							<img class="how-pos4 pointer-none" >
						</div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Войти
						</button>
                        <br>
                        <p class="text-center"><a href="index.php" class="text-secondary">На главную страницу</a></p>
					</form>
				</div>
                </div>
		</div>
	</section>	



<?php include('./templates/template_footer.php'); ?>

