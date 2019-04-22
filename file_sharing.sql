-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2019 г., 23:33
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `file_sharing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_key` varchar(50) NOT NULL,
  `file_link` varchar(250) NOT NULL,
  `extension` varchar(20) NOT NULL,
  `creation_date` int(10) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `user_id`, `file_key`, `file_link`, `extension`, `creation_date`, `comment`) VALUES
(1, 1, 'ngm', 'E:\\OpenServer\\OSPanel\\domains\\fileSharing\\file_dump', '', 1555766878, 'no'),
(2, 1, 'ngp', 'E:\\OpenServer\\OSPanel\\domains\\fileSharing\\file_dump', '', 1555766978, ''),
(3, 1, 'ngp', 'E:\\OpenServer\\OSPanel\\domains\\fileSharing\\file_dump', '', 1555766878, ''),
(4, 0, 'ngh', 'E:\\OpenServer\\OSPanel\\domains\\fileSharing\\file_dump', '', 1555766878, ''),
(5, 0, 'E:OpenServerOSPaneldomainsfileSharingapplicationco', 'e47062a2', '', 1555871997, ''),
(6, 0, 'E:OpenServerOSPaneldomainsfileSharingapplicationco', 'b4664610', '', 1555871999, ''),
(7, 0, 'E:OpenServerOSPaneldomainsfileSharingapplicationco', 'f3d703aa', '', 1555872014, ''),
(8, 0, 'f802e038', 'E:OpenServerOSPaneldomainsfileSharingapplicationcontrollers/../file_dump/f/8f802e038c4e5c1b3176a4fd5298d7eb2', '', 1555872081, ''),
(9, 0, '4da0aff1', 'E:OpenServerOSPaneldomainsfileSharingapplicationcontrollers/../file_dump/4/d4da0aff1ad9e2b42b2cc917d3234b082', '', 1555873352, ''),
(10, 0, '2304cb60', 'E:OpenServerOSPaneldomainsfileSharingapplicationcontrollers/../file_dump/2/32304cb602c16614e74065f5f07d3a1ce', '', 1555873358, ''),
(11, 0, '32304cb', 'E:OpenServerOSPaneldomainsfileSharingapplicationcontrollers/../file_dump/2/32304cb602c16614e74065f5f07d3a1ce', '', 2147483647, 'comment'),
(12, 0, '32304cb', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/2/32304cb602c16614e74065f5f07d3a1ce', '', 2147483647, 'comment'),
(13, 0, '5c7fd9a7', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/5/c5c7fd9a760e4ffed2db8b53cbc5b98a4', '', 1555882642, ''),
(14, 0, 'bd2d0dd8', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/b/dbd2d0dd8fa463a3d4af37873c897ee44', '', 1555882649, ''),
(15, 0, '5ede0657', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/5/e5ede0657a7669162ce4662f9736f27d3', '', 1555884863, 'No'),
(16, 0, 'a7b3edc8', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/a/7a7b3edc899d553d7736a4ae117b66114', 'jpg', 1555944990, 'No'),
(17, 0, '20fd6fa2', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/2/020fd6fa20cfdeed0556bcb7cd764bae6', 'php', 1555944996, 'No'),
(18, 0, '1e7077e0', 'E:/OpenServer/OSPanel/domains/fileSharing/application/file_dump/1/e1e7077e05f1066d28d4c9a9f5d86bbed.png', 'PNG', 1555945083, 'No'),
(19, 0, '6b8ea88e', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/6/b6b8ea88e26675ba70a033920485549a3', 'jpg', 1555957286, 'No'),
(20, 0, '54d85537', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/5/454d85537d41d59629b1b21d30fb89a2b.jpg', 'jpg', 1555964171, 'No'),
(21, 0, '5c33ec51', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/5/c/5c33ec510277c72647484a92d96fb1e8.jpg', 'jpg', 1555964288, 'No'),
(22, 0, '20242c65', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/2/0/20242c65a9628e027558fd8562b57beb.jpg', 'jpg', 1555964422, 'No'),
(23, 0, '8494a86b', 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/8/4/8494a86bb8207169db39ca5ad4cf83d9.PNG', 'PNG', 1555964723, 'No');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `first_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
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
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
