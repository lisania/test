-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 13 2015 г., 18:26
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `birthyear` int(4) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `isadmin` tinyint(1) DEFAULT NULL,
  `createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Список пользователей' AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthyear`, `login`, `password`, `isadmin`, `createat`, `updateat`) VALUES
(1, 'Maria', 'Sherbakova', 1986, 'root', '$2y$10$f8lpbnUjXdjmaXuLz3pYKerRJ7wrOnsoVvb4jsff3GheR5YYQYemG', 1, '2015-10-10 08:20:08', '2015-10-13 16:24:34'),
(2, 'Вася', 'Иванов', 1980, 'ivanov@email.com', '$2y$10$eHDOZTpjPXuiMdA145imjuJ455QiW5A8BEu2WtKbYzj43CPaCgBou', NULL, '2015-10-10 09:44:05', '2015-10-12 20:05:00'),
(3, 'Катя', 'Симонова', 1990, 'ekaterina@email.com', '$2y$10$zbbo.XymZPSZmMHIUgRwwurirQX3L0Ggz2Z/LmfJ9Y4jkWaj0Q6De', NULL, '2015-10-10 09:45:37', '2015-10-12 20:05:54'),
(4, 'Мария', 'Бочарова', 1982, 'maria@email.com', '$2y$10$cL79onQm0iGWBP//FZ6S2.IZBMrXvSllwPURzFEYQtSdEKEX6Sbue', NULL, '2015-10-11 09:21:56', '2015-10-13 02:32:04'),
(6, 'Илья', 'Коверин', 1987, 'ilya@email.ru', '$2y$10$bBHZrzYYr7fkqbZlh9h0IO6f0GHDEBF4OKUG8tbBbFxGcQA9Y.9KO', NULL, '2015-10-11 09:23:22', '2015-10-13 02:34:16'),
(7, 'Сергей', 'Сергеев', 1970, 'sergeev@email.com', '$2y$10$YYeISDTQcrJ8G4utW06EeulZjs.Pfl3saLNqsissZ3T3yAoEwwCqi', NULL, '2015-10-11 09:41:04', '2015-10-13 02:35:35'),
(8, 'Карина', 'Тихая', 1975, 'karina@email.com', '$2y$10$oU0xMCGadFG8KjKMu82/5.n.7VL3vgb2f2.Ko/R5v9oo9STOTLBhy', NULL, '2015-10-11 09:42:38', '2015-10-13 02:36:39'),
(9, 'Кирилл', 'Климов', 1990, 'klimov@email.com', '$2y$10$rmYbm0uxgrlbpJETZmgO6OfEs2eV2qyzAQZJGtfb5QhSJyYFzwtA2', NULL, '2015-10-11 09:43:36', '2015-10-13 02:37:35'),
(10, 'Пётр', 'Гончаров', 1970, 'petr@yandex.ru', '$2y$10$EnnjTMIZJBrLNRleyZqR1e0vZy8I5giu3q.FM5y92wqa0RxNo6iby', NULL, '2015-10-11 09:45:13', '2015-10-13 02:38:30'),
(11, 'Ирина', 'Семёнова', 1972, 'ira@email.com', '$2y$10$i8IBu6fpXlN7oOiWW3J32eJSx4lVWly.uphEXGuzJLJklWK9EvCu2', NULL, '2015-10-11 09:46:54', '2015-10-13 02:39:43'),
(12, 'Людмила', 'Александрова', 1980, 'luda@email.com', '$2y$10$Q11Ao4FunRQOd5T/1dpVVe27pv8rYpCjgQte5Y/x1VLwSTto8hSnu', NULL, '2015-10-11 09:48:16', '2015-10-13 02:40:38'),
(13, 'Никита', 'Радионов', 1982, 'nikita@email.com', '$2y$10$QM2/BxBsKHg3rE9tZ2owoe3zZF.94EyP4yu8BFdutbSx5e8MEiG0m', NULL, '2015-10-12 16:37:01', '2015-10-13 02:43:04'),
(14, 'Пользователь', 'ДляПроверки', 1970, 'user@user', '$2y$10$JC/mQLfX9A5Hp.rYIR7gP.Oio1IyM6vE9skuoDjaOVlV3pu9ljn9e', NULL, '2015-10-13 16:17:32', '2015-10-13 16:17:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
