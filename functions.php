<?php
function pdo_connect_mysql() {
    // Получаем данные MySQL
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'root';
    $DATABASE_NAME = 'politechstore';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// Если произошла ошибка с подключением, скрипт остановится и отобразит сообщение об ошибке.
    	exit('Failed to connect to database!');
    }
   
}
session_start();


?>