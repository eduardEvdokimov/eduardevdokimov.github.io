-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 25 2019 г., 11:53
-- Версия сервера: 8.0.12
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
-- База данных: `gamebomb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `pub_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_news` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `pub_date`, `id_user`, `id_news`) VALUES
(5, 'Красивая картинка)))', '2019-01-10 14:41:42', 11, 9),
(7, 'Новый комментарий в новом стиле)))', '2019-01-17 14:00:38', 11, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_name` varchar(100) NOT NULL,
  `news_body` text NOT NULL,
  `image_puth` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pub_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `news_name`, `news_body`, `image_puth`, `user_id`, `pub_date`) VALUES
(9, 'Броское название новости', 'Первые две строчки интересные, потом вода...', 'image/Desert.jpg', 11, '2019-01-10 14:34:19'),
(10, 'В Сибири русские мужики изнасиловали медведя', 'Невероятно, но факт! Как говорит нам Gamebomb в Сибири (что в России) русские мужики увидев медведя не долго думая решили надругаться над косолапым. Медведь встречу с нашими мужиками никогда не забудет.', 'image/Tulips.jpg', 11, '2019-01-10 15:15:57');

-- --------------------------------------------------------

--
-- Структура таблицы `photo_users`
--

CREATE TABLE `photo_users` (
  `id` int(11) NOT NULL,
  `photo_user` varchar(150) NOT NULL,
  `vnesh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo_users`
--

INSERT INTO `photo_users` (`id`, `photo_user`, `vnesh_id`) VALUES
(1, 'image/no-user-image.gif', 10),
(2, 'image/image.jpg', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `tmp_news`
--

CREATE TABLE `tmp_news` (
  `id` int(11) NOT NULL,
  `name_news` varchar(100) NOT NULL,
  `body_news` text NOT NULL,
  `image_puth` varchar(150) NOT NULL,
  `offer_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `offer_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `confirm_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `reg_date`, `confirm_id`) VALUES
(10, 'admin', '$2y$10$39Jeqcm/dfZ2QQfUeotGDeXwT8iXRMN/bZf7ly0Z5NvmApFg4FdaK', 'admin@mail.com', '2019-01-10 14:32:25', '1'),
(11, 'kosmas', '$2y$10$xd69oiq8zR93c2lJWYjKLOctanjV.85n91KMMHMjI67zcZJ8yme72', 'kosmas@mail.com', '2019-01-10 14:33:30', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_news` (`id_news`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `photo_users`
--
ALTER TABLE `photo_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnesh_id` (`vnesh_id`);

--
-- Индексы таблицы `tmp_news`
--
ALTER TABLE `tmp_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_user_id` (`offer_user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `photo_users`
--
ALTER TABLE `photo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `tmp_news`
--
ALTER TABLE `tmp_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `photo_users`
--
ALTER TABLE `photo_users`
  ADD CONSTRAINT `photo_users_ibfk_1` FOREIGN KEY (`vnesh_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tmp_news`
--
ALTER TABLE `tmp_news`
  ADD CONSTRAINT `tmp_news_ibfk_1` FOREIGN KEY (`offer_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
