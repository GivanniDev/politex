
<!--Подвал сайта-->
<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Категории
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="products.php?category=Канцтовары" class="stext-107 cl7 hov-cl1 trans-04">
								Канцтовары
							</a>
						</li>

						<li class="p-b-10">
							<a href="products.php?category=Одежда" class="stext-107 cl7 hov-cl1 trans-04">
								Одежда
							</a>
						</li>

						<li class="p-b-10">
							<a href="products.php?category=Аксессуары" class="stext-107 cl7 hov-cl1 trans-04">
								Аксессуары
							</a>
						</li>

					</ul>
				</div>

				

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Остались вопросы?
					</h4>

					<p class="stext-107 cl7 size-201">
						Мы находимся по адресу Ул.Политехническая, д.29 Главное здание <br>+7 (931) 221-48-81
					</p>

					<div class="p-t-27">
						<a href="https://vk.com/polytech_store" target="_blank"  class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-vk"></i>
						</a>

						<a href="https://umto.spbstu.ru/polytech_store/" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-rss"></i>
						</a>

					</div>
				</div>

				
				</div>
			</div>

			
<!-- Кнопка на верх -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Create by <i class="fa fa-bolt" aria-hidden="true"></i> <a href="https://t.me/versacegivanni" style="text-decoration: none; color: white;" target="_blank">Givanni</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script>
//---Форма обратной связи ---//

	$(document).ready(function () {
    $("btn_submit").click(function () {
        // Получение ID формы
        var formID = $(this).attr('id');
        // Добавление решётки к имени ID
        var formNm = $('#' + formID);
        $.ajax({
            type: "POST",
            url: '/action.php',
            data: formNm.serialize(),
            beforeSend: function () {
                // Вывод текста в процессе отправки
                $(formNm).html('<p style="text-align:center">Отправка...</p>');
            },
            success: function (data) {
                // Вывод текста результата отправки
                $(formNm).html('<p style="text-align:center">'+data+'</p>');
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                $(formNm).html(error);
            }
        });
        return false;
    });
});
</script>

<!--плагин jQuery для CSS анимированных переходов страниц-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--плагин всплывающих подсказок-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--плагин поиска тегов, изображений в options-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--плагин работы с датами-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--плагин работы со слайдами-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--паралкс эффекты-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--плагин всплывающих окон-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--Плагин для динамического перемещения блоков при изменении разрешения экрана-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--Красивый вывод классического Alert в js-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!--Минималистичная полоса прокуртки страницы-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>


<!--Набор внутренних js функций-->
    
	<script src="js/main.js"></script>

	</body>
</html>