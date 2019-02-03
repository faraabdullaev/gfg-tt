-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 03 2019 г., 12:15
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `gfg_tt`
--
DROP DATABASE IF EXISTS `gfg_tt`;
CREATE DATABASE IF NOT EXISTS `gfg_tt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gfg_tt`;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1549098529),
('m190202_091108_product_table', 1549099199);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` float DEFAULT '0',
  `stock` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `brand`, `price`, `stock`) VALUES
(1, 'Song of the Little Road (Pather Panchali)', 'Drama', 186.72, 29),
(2, 'Wife vs. Secretary', 'Comedy', 193.58, 30),
(3, 'Angels Crest', 'Drama', 83.58, 28),
(4, 'Blackbeard\'s Ghost', 'Children', 14.31, 30),
(5, 'Angels in America', 'Fantasy', 183.02, 32),
(6, 'Four Eyed Monsters', 'Comedy', 164.86, 14),
(7, 'Friends & Lovers', 'Comedy', 25.42, 38),
(8, 'Lover Come Back', 'Comedy', 190.95, 28),
(9, 'Casting By', 'Documentary', 115.55, 48),
(10, 'Kids for Cash', 'Documentary', 112.89, 9),
(11, 'Spirit, The', 'Action', 106.57, 50),
(12, 'The Gold Spinners', 'Documentary', 195.51, 40),
(13, 'Sympathy for Delicious', 'Drama', 159.93, 31),
(14, 'Stranger Among Us, A', 'Crime', 92.53, 31),
(15, 'Entertaining Angels: The Dorothy Day Story', 'Drama', 62.76, 22),
(16, 'Dark Truth, A (Truth, The)', 'Drama', 152.12, 29),
(17, 'The Disappearance of Eleanor Rigby: Her', 'Drama', 10.77, 46),
(18, 'Emma', 'Comedy', 197.79, 45),
(19, 'River of No Return', 'Adventure', 197.27, 40),
(20, 'Crazy Beautiful You', 'Western', 175.18, 7);
--
-- База данных: `gfg_tt__test`
--
DROP DATABASE IF EXISTS `gfg_tt__test`;
CREATE DATABASE IF NOT EXISTS `gfg_tt__test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gfg_tt__test`;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1549098529),
('m190202_091108_product_table', 1549099199);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` float DEFAULT '0',
  `stock` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;
