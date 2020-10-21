-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 22 2020 г., 01:03
-- Версия сервера: 8.0.21-0ubuntu0.20.04.4
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskmanager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adminka`
--

CREATE TABLE `adminka` (
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adminka`
--

INSERT INTO `adminka` (`login`, `password`) VALUES
('admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Структура таблицы `taskmanager`
--

CREATE TABLE `taskmanager` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `text_of_task` varchar(300) NOT NULL,
  `status` enum('done','not done') NOT NULL,
  `admin` varchar(50) NOT NULL DEFAULT 'Отредактировано пользователем'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `taskmanager`
--

INSERT INTO `taskmanager` (`id`, `name`, `email`, `text_of_task`, `status`, `admin`) VALUES
(103, 'ghff', 'vdov.romanoff@yandex.ru', 'alert(1)', 'not done', 'Отредактировано администратором'),
(104, 'sad', 'vdov.romanoff@yandex.ru', 'alert(1)', 'not done', 'Отредактировано администратором'),
(105, 'RomanbI4', 'vdov.romanoff@yandex.ru', 'Начать диплом', 'done', 'Отредактировано пользователем'),
(106, 'dmitry', 'vdov.romanoff@gmail.com', 'Закончить курсач', 'done', 'Отредактировано администратором'),
(107, 'Dragomanov', 'vdov.romanoff@ukr.net', 'Project', 'done', 'Отредактировано пользователем'),
(108, 'Dragomanovv', 'vdov.romanoff@ukr.net', 'Project end', 'done', 'Отредактировано пользователем'),
(109, 'Mizon ', 'vdov.romanoff@gmail.com', 'asdasda', 'done', 'Отредактировано пользователем'),
(110, 'Mizon ', 'vdov.romanoff@gmail.com', 'asdasda', 'done', 'Отредактировано пользователем'),
(111, 'Mizon2', 'vdov.romanoff@gmail.com', 'asdasda', 'done', 'Отредактировано пользователем'),
(112, 'test', 'test@test.com', 'test job', 'not done', 'Отредактировано пользователем'),
(113, 'No solutions', 'vdov.romanoff@gmail.com', 'alert(11)', 'done', 'Отредактировано администратором');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `taskmanager`
--
ALTER TABLE `taskmanager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `taskmanager`
--
ALTER TABLE `taskmanager`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
