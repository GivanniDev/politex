<!-- Страница обратнеой связи -->

<?php $pageTitle = "Обратная связь"; ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>

	<!-- Оставляем секцию для отступа -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url();">
		
	</section>	


	<!-- Главный блок -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form id="form">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Напишите нам 
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="name" placeholder="Ваше имя">
							<img class="how-pos4 pointer-none" >
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="email" placeholder="Ваш адрес электронной почты">
							<img class="how-pos4 pointer-none" >
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Чем мы можем вам помочь?"></textarea>
						</div>

						<button id="btn_submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Отправить
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Адрес
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
							Ул.Политехническая, д.29 Главное здание
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Позвонить
							</span>

							<p class="stext-115 cl1 size-213 p-t-18"><a href="tel: +7 (931) 221-48-81 ">+7 (931) 221-48-81</a>
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Написать
							</span>

							<p class="stext-115 cl1 size-213 p-t-18"><a href="mailto:dmts@spbstu.ru">dmts@spbstu.ru</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<!-- Подключение карты Яндекс -->
	<div class="map">
		
	<div class="size-303" id="map" ></div>
	
	</div>
	
	<script src="https://api-maps.yandex.ru/2.1/?apikey=671099f4-246d-4621-b537-6d361dc835b4&lang=ru_RU" type="text/javascript"> </script>    
    <script src="/js/yaMap.js"></script>

	<!-- Footer -->
	<?php include('./templates/template_footer.php'); ?>
	


	</body>