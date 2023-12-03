<?php

//Создаем письмо администратору и пользователю

$adminEmail = "versaceGi@yandex.ru";
$adminSubject = "Новый заказ";
$adminMailText = "<p>На сайте был совершен новый заказ</p>";
$adminMailText .= "<p> Товары:" . $_POST['productId'] . "<br>";
$adminMailText .= "<p> Продукт:" . $_POST['productTitle'] . "<br>"; 
$adminMailText .= "<p> Количество:" . $_POST['productQuantity'] . "<br>";                       
$adminMailText .= "<p> Стоимость:" . $_POST['productPrice'] . "</p>";                        

$adminMailText .= "<h2>Данные покупателя</h2>";                 
$adminMailText .="<p> Имя:" . $_POST['name'] . "<br>";
$adminMailText .="<p> Email:" . $_POST['email'] . "<br>";                        
$adminMailText .="<p> Телефон:" . $_POST['phone'] . "<br>";                           
$adminMailText .="<p> Адрес:" . $_POST['adress'] . "</p>";                           
                 

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


mail($adminEmail, $adminSubject, $adminMailText, $headers);



$userEmail = $_POST['email'];
$userSubject = "Ваш заказ успешно получен";
$userMailText = "Спасибо за заказ";

mail($userEmail, $userSubject, $userMailText, $headers);

//Закрываем сессию корзины после сделанного заказа
session_start();

session_destroy();
header('Location: order-success.php');
exit();
?>