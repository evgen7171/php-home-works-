-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 30 2019 г., 16:34
-- Версия сервера: 5.6.43-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_data`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(45) DEFAULT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `product_img` varchar(45) DEFAULT NULL,
  `product_price` varchar(45) DEFAULT NULL,
  `product_count` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `text`) VALUES
(1, 2, 'Нормальные продукты!'),
(2, 2, 'Доволен всем. Рекомендую!'),
(3, 1, ':((((((((((((((( что здесь писать???');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `price`, `image`, `desc`) VALUES
(1, 'bike', 'Велотренажер', 100, 'bike.jpg', 'Велосипед для дома'),
(2, 'elliptic', 'Эллепитческий тренажер', 200, 'elliptic.jpg', 'Ходьба дома'),
(3, 'ems', 'EMS-тренажер', 150, 'ems.jpg', 'Прокачка групп мышц эл.током'),
(4, 'bank', 'Скамья со штангой', 280, 'plane_with_barbell.jpg', 'Прокачай все группы мышц'),
(5, 'trampoline', 'Батут', 90, 'trampoline.jpg', 'Укрпеите ноги весело'),
(6, 'wall', 'Шведская стенка', 100, 'wall.jpg', 'Дети будут довольны');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pass` text,
  `avatar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `avatar`) VALUES
(1, 'Вася', 'vasya@mail.com', '$2y$12$xurxASy1n5cxXmai45SAqeYt1YYOplam0bHQ1tzJgg9nS3.hJ3xv6', 'Koala.jpg'),
(2, 'Иван', 'ivan@ivan.ru', '$2y$12$7IueToGlZ8hxnGYEUacPnebAeL.9K.JoAlwQNiiI3CnnLEh4E8ftG', 'Ivan.jpg'),
(3, 'Птолемей', 'fire@olimp.com', '$2y$12$t9fr3aVA70VOQsk2sDZTwe/4dzmFjWbKxcGM1lCDbYJMSE0W5heBi', NULL),
(22, 'asda', 'sdf@dsfg.ru', '$2y$10$E5.zdRc1VlTriyDdfw4wYeT0/SzQr/7t.VJMqwvFPy8mVZunDzim2', NULL),
(23, 'ggg', 'sdf@dsfg.ru', '$2y$10$y3yBKfVa5JyJuL/eAYlPQeTSNHfeDntkNSmGHamy3X9HZoFlAfAWe', NULL),
(24, 'ggg1', 'sdf@dsfg.ru', '$2y$10$zCwVKqCpr35si4V0kodlHeMvHK0nwCtjUJzEcvs/pKCsGC/fs7P1u', NULL),
(25, 'dddsss', 'ttts333@yandex.ru', '$2y$10$b0ST2Vh1.hiKk9QSxHw34OsI.Uur9KB7we0WQnXiN3NGaY8zIydZC', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
