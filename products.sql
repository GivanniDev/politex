-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 09 2023 г., 23:23
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `politechstore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `category`, `img`) VALUES
(4, 'Фирменная ручка Политех', 250, 'Пишушая ручка со встроенной флешкой на 32GB', 'Канцтовары', '2kc_wRMehIc.jpg'),
(5, 'Обложка для зачетной книжки ', 250, 'Мягкая красивая фирменная обложка для зачетной книжки с логотипом Политех. Сделанная из высококачественных материалов.  \r\nЦвет синий', 'Аксессуары', 'EHmvX5Etpdk.jpg'),
(6, 'Толстовка фирменная Политех ', 1200, 'Отличная теплая толстовка на все типы погоды. Принт сделан по последним технологиям. ', 'Одежда', 'DNkfgs_qguk.jpg'),
(18, 'Литой значок &quot;Пи&quot;', 250, 'Отличный аксессуар на каждый день, продукт выполнен из лучших материалов. Идеально будет сочетаться с нашими толстовками или на рюкзаке \r\nМатериал: сталь\r\nКрепление: цанговое \r\n', 'Аксессуары', 'CDHBmxc2z90.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
