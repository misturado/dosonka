-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 15 2016 г., 10:58
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `dos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dos_categories`
--

CREATE TABLE IF NOT EXISTS `dos_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `dos_categories`
--

INSERT INTO `dos_categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Транспорт', 0),
(2, 'Интернет', 0),
(3, 'Дом', 0),
(4, 'Сад, огород', 0),
(5, 'Автомобили', 1),
(6, 'Мото', 1),
(7, 'Компьютеры', 2),
(8, 'Игры', 2),
(9, 'Мебель', 3),
(10, 'Сантехника', 3),
(11, 'Инструмент', 4),
(12, 'Стройматериалы', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `dos_post`
--

CREATE TABLE IF NOT EXISTS `dos_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_categories` tinyint(4) NOT NULL,
  `id_razd` tinyint(4) NOT NULL COMMENT 'спрос или предложение',
  `town` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `confirm` enum('0','1') NOT NULL DEFAULT '0',
  `time_over` int(11) NOT NULL,
  `is_actual` enum('0','1') NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `img_s` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `dos_priv`
--

CREATE TABLE IF NOT EXISTS `dos_priv` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `dos_priv`
--

INSERT INTO `dos_priv` (`id`, `name`) VALUES
(1, 'ADD_MESS'),
(2, 'MODER_MESS'),
(3, 'DEL_MESS'),
(4, 'RETIME_MESS'),
(5, 'EDIT_MESS'),
(6, 'ADD_CAT'),
(7, 'VIEW_ADMIN');

-- --------------------------------------------------------

--
-- Структура таблицы `dos_razd`
--

CREATE TABLE IF NOT EXISTS `dos_razd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `dos_razd`
--

INSERT INTO `dos_razd` (`id`, `name`) VALUES
(1, 'Предложение'),
(2, 'Спрос');

-- --------------------------------------------------------

--
-- Структура таблицы `dos_role`
--

CREATE TABLE IF NOT EXISTS `dos_role` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `dos_role`
--

INSERT INTO `dos_role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user'),
(4, 'ban');

-- --------------------------------------------------------

--
-- Структура таблицы `dos_role_priv`
--

CREATE TABLE IF NOT EXISTS `dos_role_priv` (
  `id_role` tinyint(4) NOT NULL,
  `id_priv` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `dos_role_priv`
--

INSERT INTO `dos_role_priv` (`id_role`, `id_priv`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `dos_users`
--

CREATE TABLE IF NOT EXISTS `dos_users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `confirm` enum('0','1') NOT NULL DEFAULT '0',
  `sess` varchar(32) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id_role` tinyint(4) NOT NULL DEFAULT '3',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `dos_users`
--

INSERT INTO `dos_users` (`user_id`, `login`, `password`, `name`, `hash`, `confirm`, `sess`, `email`, `id_role`) VALUES
(1, 'misturado', '843370383ceee09e844c9f2a089e69f3', 'ALex', '7f12938c162d12ceadf2a0ba107d881c', '0', NULL, 'rzr@inbox.ru', 3),
(2, 'razor', '843370383ceee09e844c9f2a089e69f3', 'Alex', 'a09a45a2b05abe8396640ffb53154b68', '1', NULL, 'rzr@inbox.ru', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
