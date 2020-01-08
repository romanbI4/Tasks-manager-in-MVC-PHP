-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 08 2020 г., 22:18
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

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
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `text_of_task` varchar(300) NOT NULL,
  `status` enum('done','not done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `taskmanager`
--

INSERT INTO `taskmanager` (`id`, `name`, `email`, `text_of_task`, `status`) VALUES
(103, 'ghff', 'vdov.romanoff@yandex.ru', 'alert(‘test’);', 'done'),
(104, 'sad', 'vdov.romanoff@yandex.ru', 'dddddd', 'done'),
(105, 'RomanbI4', 'vdov.romanoff@yandex.ru', 'Начать диплом', 'done'),
(106, 'dmitry', 'vdov.romanoff@gmail.com', 'Закончить курсач', 'not done'),
(107, 'Dragomanov', 'vdov.romanoff@ukr.net', 'Project', 'done'),
(108, 'Dragomanovv', 'vdov.romanoff@ukr.net', 'Project end', 'done');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
