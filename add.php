<?php

/*Добавление товара в базу данных */

    require_once './functions.php'; 
    $pdo = pdo_connect_mysql(); /*Подключение к базе данных */
    if ( @$_SESSION['login'] != 'on') { /*Проверка на вход в систему администратора */
        header('Location: index.php');
        
    }

    //Преобразует специальные символы в HTML-сущности
    $title = htmlspecialchars($_POST['title']);
    $price = htmlspecialchars($_POST['price']);
    $description = htmlspecialchars($_POST['description']);
    $category = htmlspecialchars($_POST['category']);
    

 
    //Функция для добавления фото с обработкой move_uploaded_file
    if ( isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
        move_uploaded_file($_FILES['img']['tmp_name'],'images/products/' . $_FILES['img']['name']);
        $fileName = $_FILES['img']['name'];
    } else {
        $fileName = 'nophoto.jpg';
    }
    
    $sql = "INSERT INTO products (title, price, description, img, category) 
            VALUES (:title, :price, :description, :img, :category)";
    
    $stmt = $pdo->prepare($sql);

   

    //Записываем строки в БД
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':price', $price);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':img', $fileName);
    $stmt->bindValue(':category', $category);

    $stmt->execute();

    header('Location: add-success.php');
?>