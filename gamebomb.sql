-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 28 2019 г., 16:49
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
(23, 'Комментарий', '2019-02-06 14:20:51', 10, 49),
(24, 'Новый комментарий)', '2019-02-20 19:31:40', 30, 48);

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
  `pub_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `news_name`, `news_body`, `image_puth`, `user_id`, `pub_date`, `views`) VALUES
(35, 'В предверии выхода Metro Exodus российские школьники начали клянчить деньги на новый компьютер', 'Как сообщает Gamebomb, школьники просто в край охренели. Они имея довольно мощные машины (ПК) требуют от своих родителей покупки новых, более мощных комплектуюших, чтобы насладиться игрой на высоких прессетах графоуни.', 'image/Penguins.jpg', 27, '2019-02-01 19:47:50', 29),
(36, 'Большая новость', 'Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...', 'image/Hydrangeas.jpg', 10, '2019-02-02 08:29:59', 146),
(37, 'Новость', 'Первые две строчки интересные, потом вода...', 'image/Tulips.jpg', 10, '2019-02-03 08:55:08', 0),
(38, 'Еще новость', 'Первые две строчки интересные, потом вода...', 'image/Jellyfish.jpg', 10, '2019-02-03 08:55:18', 0),
(39, 'Еще новость', 'Первые две строчки интересные, потом вода...', 'image/Koala.jpg', 10, '2019-02-03 08:55:31', 1),
(40, 'Новость', 'Первые две строчки интересные, потом вода...', 'image/Penguins.jpg', 10, '2019-02-03 08:55:39', 1),
(41, 'Одна ность', 'Первые две строчки интересные, потом вода...', 'image/Lighthouse.jpg', 10, '2019-02-03 08:55:48', 2),
(42, 'Еще новость)))', 'Первые две строчки интересные, потом вода...', 'image/Lighthouse.jpg', 10, '2019-02-03 08:56:00', 0),
(43, 'Новостищеее', 'Первые две строчки интересные, потом вода...', 'image/Desert.jpg', 10, '2019-02-03 08:56:13', 0),
(44, 'И еще новость', 'Первые две строчки интересные, потом вода...', 'image/Tulips.jpg', 10, '2019-02-03 08:56:25', 0),
(45, 'Чтобы было)', 'Первые две строчки интересные, потом вода...', 'image/Hydrangeas.jpg', 10, '2019-02-03 08:56:37', 1),
(46, 'И еще', 'Первые две строчки интересные, потом вода...', 'image/Penguins.jpg', 10, '2019-02-03 08:56:48', 0),
(47, 'Еще новость', 'Первые две строчки интересные, потом вода...', 'image/Tulips.jpg', 10, '2019-02-03 09:20:46', 13),
(48, 'asdsa', 'Первые две строчки интересные, потом вода...', 'image/Tulips.jpg', 10, '2019-02-03 14:18:14', 10),
(49, 'Очень интересная новость', 'Новость про пингвинов', 'image/Penguins.jpg', 10, '2019-02-06 14:20:32', 20),
(50, 'Новость от космоса746, она очень интресная', 'Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...Первые две строчки интересные, потом вода...', 'image/Hydrangeas.jpg', 30, '2019-02-20 19:32:45', 3);

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
(2, 'image/Tulips.jpg', 11),
(13, 'image/avtomobili-virtualnyj-tyuning-2015-nigth-912485.jpg', 23),
(14, 'image/avtomobili-virtualnyj-tyuning-2015-nigth-912485.jpg', 24),
(15, 'image/image.jpg', 25),
(16, 'image/avtomobili-virtualnyj-tyuning-2015-nigth-912485.jpg', 26),
(17, 'image/Chrysanthemum.jpg', 27),
(18, 'image/Jellyfish.jpg', 28),
(19, 'image/no-user-image.gif', 29),
(20, 'image/no-user-image.gif', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `tems`
--

CREATE TABLE `tems` (
  `id` int(11) NOT NULL,
  `tema` set('Спорт','Животные','Политика','Технологии') DEFAULT NULL,
  `tmp_news_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tems`
--

INSERT INTO `tems` (`id`, `tema`, `tmp_news_id`, `news_id`) VALUES
(17, 'Животные', NULL, 33),
(18, 'Политика', NULL, 34),
(19, 'Технологии', NULL, 35),
(20, 'Спорт', NULL, 36),
(21, 'Технологии', NULL, NULL),
(22, 'Животные', NULL, 37),
(23, 'Спорт', NULL, 38),
(24, 'Животные', NULL, 39),
(25, 'Спорт', NULL, 40),
(26, 'Спорт', NULL, 41),
(27, 'Технологии', NULL, 42),
(28, 'Политика', NULL, 43),
(29, 'Животные', NULL, 44),
(30, 'Спорт', NULL, 45),
(31, 'Спорт', NULL, 46),
(32, 'Спорт', NULL, 47),
(33, 'Спорт', NULL, 48),
(34, 'Животные', NULL, 49),
(35, 'Технологии', NULL, 50);

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
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `otchestvo` varchar(150) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `confirm_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `reg_date`, `firstname`, `lastname`, `otchestvo`, `date_of_birth`, `confirm_id`) VALUES
(10, 'admin', '$2y$10$39Jeqcm/dfZ2QQfUeotGDeXwT8iXRMN/bZf7ly0Z5NvmApFg4FdaK', 'admin@mail.com', '2019-01-10 14:32:25', NULL, NULL, NULL, NULL, '1'),
(11, 'kosmas', '$2y$10$mZZ9pCnTa2EJAd5AlDDiD.zafjpA9eg6yFbbap47uVcfxMva.UDum', 'kosmas@mail.com', '2019-01-10 14:33:30', 'asd', 'asd', 'asd', '1999-11-16', '1'),
(23, 'edik', '$2y$10$oOdW4Ukp3T7rgvHWrhkAGuzzWJzn9m/cU8hUNJV/gLrRIkd1GesIy', 'eduard.evdokimov@inbox.ru', '2019-01-31 11:44:04', NULL, NULL, NULL, '2019-11-23', '5c52df84775b0'),
(24, 'edik123', '$2y$10$ct7HwLjKx7LVTuRuD5MpHut2hbuCwmLLZDQ3gqM5qTDnPCGCjGrv.', 'eduard123.evdokimov@inbox.ru', '2019-01-31 11:44:42', NULL, NULL, NULL, NULL, '5c52dfaa2750b'),
(25, 'edik312', '$2y$10$uPpusukDUnQ2haaV1K.IaOJx4iKORhT6MyDd5flM2gBXJWAK/YhJO', 'eduard321.evdokimov@inbox.ru', '2019-01-31 11:45:44', NULL, NULL, NULL, NULL, '5c52dfe84e066'),
(26, 'edik3121', '$2y$10$dtsaczY7WMXWxUwY9rAvSO0WFF0zId4GTSUqAs1wywTPiuOsHtRJK', 'eduard3211.evdokimov@inbox.ru', '2019-01-31 11:46:35', NULL, NULL, NULL, NULL, '1'),
(27, 'Эдуард', '$2y$10$KyaTF4WUT/Obc9BDYatfbO5qJfiOqnlDIhctd9TIS6dmk4P2sco3S', 'eduard@mail.com', '2019-02-01 19:42:07', NULL, NULL, NULL, NULL, '1'),
(28, 'sniper', '$2y$10$j.zogcyaVNiW42KXNdM6U.lRiANtwpmPZmwFSGOSxyzPdkT.PSEpS', 'sniper@mail.com', '2019-02-05 18:04:13', 'Константин', NULL, NULL, '1970-01-01', '1'),
(29, '123', '$2y$10$VXYAV17Vq8IDi0.nV7AOVOGzp5.qsHntpsIgDfGuQWPLiqqmpV/nq', '123@mail.com', '2019-02-05 18:15:22', NULL, NULL, NULL, NULL, '5c59d2ba82a9d'),
(30, 'kosmas746', '$2y$10$T.WGf2gIUIgnw.9ObrljGOK9YDxk.gc0ft6N.2OFuczhtCt1akQGi', 'kosmas@inbox.ru', '2019-02-20 19:30:10', NULL, NULL, NULL, NULL, '1');

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
-- Индексы таблицы `tems`
--
ALTER TABLE `tems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tmp_news_id` (`tmp_news_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `photo_users`
--
ALTER TABLE `photo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `tems`
--
ALTER TABLE `tems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `tmp_news`
--
ALTER TABLE `tmp_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- Ограничения внешнего ключа таблицы `tems`
--
ALTER TABLE `tems`
  ADD CONSTRAINT `tems_ibfk_1` FOREIGN KEY (`tmp_news_id`) REFERENCES `tmp_news` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `tmp_news`
--
ALTER TABLE `tmp_news`
  ADD CONSTRAINT `tmp_news_ibfk_1` FOREIGN KEY (`offer_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
