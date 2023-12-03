ymaps.ready(init); 
	var myMap;
	
	function init() {
	
		myMap = new ymaps.Map("map", {
			center: [60.010012, 30.373039], // Координаты центра карты
			zoom: 13 // Маштаб карты
		}); 
	
		myMap.controls.add(
			new ymaps.control.ZoomControl()  // Добавление элемента управления картой
		); 
	
		myPlacemark = new ymaps.Placemark([60.010012, 30.373039], { // Координаты метки объекта
			balloonContentHeader: '<a href = "https://umto.spbstu.ru/polytech_store/">Polytech Store</a><br>' +
            '<span class="description">Магазин подарков и сувениров</span>',
        // Зададим содержимое основной части балуна.
        balloonContentBody:
            '<a href="tel:+7 (931) 221-48-81">' ,           
        // Зададим содержимое нижней части балуна.
        balloonContentFooter: 'Информация предоставлена:<br/>"Polytech Store"',
        // Зададим содержимое всплывающей подсказки.
        hintContent: 'Рога и копыта' // Подсказка метки
		}, {
			preset: "twirl#redStretchyIcon" // Тип метки
		});
		
		myMap.geoObjects.add(myPlacemark); // Добавление метки
		myPlacemark.balloon.open(); // Открытие подсказки метки
		
	};
	
