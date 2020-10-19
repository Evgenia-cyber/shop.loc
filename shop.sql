-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 17 2020 г., 10:27
-- Версия сервера: 5.7.29
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `title`) VALUES
(1, 'Механизм'),
(2, 'Стекло'),
(3, 'Ремешок'),
(4, 'Корпус'),
(5, 'Индикация');

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_product`
--

CREATE TABLE `attribute_product` (
  `attr_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_product`
--

INSERT INTO `attribute_product` (`attr_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 47),
(1, 48),
(1, 49),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 82),
(1, 90),
(1, 91),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 106),
(1, 107),
(1, 108),
(2, 4),
(3, 1),
(3, 92),
(3, 93),
(3, 94),
(3, 95),
(3, 96),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 42),
(5, 43),
(5, 45),
(5, 47),
(5, 48),
(5, 49),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 90),
(6, 1),
(7, 44),
(8, 1),
(8, 2),
(8, 3),
(8, 43),
(8, 44),
(8, 45),
(8, 47),
(8, 48),
(8, 49),
(8, 54),
(9, 42),
(10, 1),
(12, 43),
(12, 45),
(12, 47),
(12, 48),
(12, 49),
(13, 42),
(16, 44),
(18, 44),
(18, 45),
(18, 47),
(18, 48),
(18, 49),
(19, 42),
(19, 43);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `attr_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attr_group_id`) VALUES
(1, 'Механика с автоподзаводом', 1),
(2, 'Механика с ручным заводом', 1),
(3, 'Кварцевый от батарейки', 1),
(4, 'Кварцевый от солнечного аккумулятора', 1),
(5, 'Сапфировое', 2),
(6, 'Минеральное', 2),
(7, 'Полимерное', 2),
(8, 'Стальной', 3),
(9, 'Кожаный', 3),
(10, 'Каучуковый', 3),
(11, 'Полимерный', 3),
(12, 'Нержавеющая сталь', 4),
(13, 'Титановый сплав', 4),
(14, 'Латунь', 4),
(15, 'Полимер', 4),
(16, 'Керамика', 4),
(17, 'Алюминий', 4),
(18, 'Аналоговые', 5),
(19, 'Цифровые', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'brand_no_image.jpg',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `title`, `alias`, `img`, `description`) VALUES
(1, 'Casio', 'casio', 'abt-1.jpg', 'In sit amet sapien eros Integer dolore magna aliqua'),
(2, 'Citizen', 'citizen', 'abt-2.jpg', 'In sit amet sapien eros Integer dolore magna aliqua!!!'),
(3, 'Royal London', 'royal-london', 'abt-3.jpg', 'In sit amet sapien eros Integer dolore magna aliqua'),
(4, 'Seiko', 'seiko', 'seiko.png', NULL),
(5, 'Diesel', 'diesel', 'diesel.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`) VALUES
(1, 'Men', 'men', 0, 'Men', 'Men'),
(2, 'Women', 'women', 0, 'Women', 'Women'),
(3, 'Kids', 'kids', 0, 'Kids', 'Kids'),
(4, 'Электронные', 'elektronnye', 1, 'Электронные', 'Электронные'),
(5, 'Механические', 'mehanicheskie', 1, 'mehanicheskie', 'mehanicheskie'),
(6, 'Casio', 'casio', 4, 'Casio', 'Casio'),
(7, 'Citizen', 'citizen', 4, 'Citizen', 'Citizen'),
(8, 'Royal London', 'royal-london', 5, 'Royal London', 'Royal London'),
(9, 'Seiko', 'seiko', 5, 'Seiko', 'Seiko'),
(10, 'Epos', 'epos', 5, 'Epos', 'Epos'),
(11, 'Электронные', 'elektronnye-11', 2, 'Электронные', 'Электронные'),
(12, 'Механические', 'mehanicheskie-12', 2, 'Механические', 'Механические'),
(13, 'Adriatica', 'adriatica', 11, 'Adriatica', 'Adriatica'),
(14, 'Anne Klein', 'anne-klein', 12, 'Anne Klein', 'Anne Klein'),
(15, 'test', 'test', 0, '', ''),
(17, 'test2', 'test2', 15, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol_left` varchar(10) NOT NULL,
  `symbol_right` varchar(10) NOT NULL,
  `value` float(15,2) NOT NULL,
  `base` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `symbol_left`, `symbol_right`, `value`, `base`) VALUES
(1, 'гривна', 'UAH', '', 'грн.', 25.80, '0'),
(2, 'доллар', 'USD', '$', '', 1.00, '1'),
(3, 'Евро', 'EUR', '€', '', 0.88, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `img`) VALUES
(1, 2, 's-1.jpg'),
(2, 2, 's-2.jpg'),
(3, 2, 's-3.jpg'),
(7, 45, '5380240d0a7f62b88ea4750ed78645fc.jpg'),
(8, 45, 'f79c2e010c3b18d99adf96af0d7b00de.jpg'),
(9, 45, '2d85118bc54d0b51516d1eef6ff05cf9.jpg'),
(10, 46, '7acaa8ea14b5e91b62287e74336fd496.jpg'),
(11, 46, '69d4b67defb462878257e75aab7ef301.jpg'),
(12, 47, '511d2fa64baafeb61443a13637975be5.jpg'),
(13, 47, '5864c0026abf2509fa532b31b5f809db.jpg'),
(24, 49, 'd1b198bbeb14047545e777a2dd49dc3e.jpg'),
(26, 49, '86f45497d6797f0e3a35e35aee14eec4.jpg'),
(27, 90, '1467ac87a1c930b18aed2f1734420e79.jpg'),
(28, 90, '71eb7cde566960a7e88cbfbc2cbb807c.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modification`
--

INSERT INTO `modification` (`id`, `product_id`, `title`, `price`) VALUES
(1, 1, 'Silver', 300),
(2, 1, 'Black', 300),
(3, 1, 'Dark Black', 305),
(4, 1, 'Red', 310),
(5, 2, 'Silver', 80),
(6, 2, 'Red', 70),
(9, 82, 'red', 103),
(10, 82, 'green', 105),
(11, 89, 'green', 105),
(12, 90, 'green', 105),
(13, 91, 'red', 105),
(14, 96, 'green', 105),
(15, 99, 'Red', 105),
(16, 100, 'Red', 105),
(17, 101, 'green', 105),
(18, 102, 'green', 105),
(19, 121, 'green', 105);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `date`, `update_at`, `currency`, `note`) VALUES
(12, 1, 1, '2020-09-28 16:02:03', '2020-09-29 10:04:53', 'EUR', '111'),
(13, 20, 0, '2020-09-28 17:45:46', NULL, 'EUR', '222'),
(14, 23, 0, '2020-09-28 17:46:27', '2020-09-29 10:05:41', 'EUR', '333'),
(15, 24, 0, '2020-09-28 17:47:29', NULL, 'EUR', '555'),
(16, 25, 0, '2020-09-28 17:48:42', NULL, 'EUR', ''),
(17, 26, 0, '2020-09-28 17:49:39', NULL, 'USD', '777');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`, `title`, `price`) VALUES
(8, 12, 2, 2, 'Casio MQ-24-7BUL', 61.6),
(9, 13, 3, 1, 'Casio GA-1000-1AER', 352),
(10, 14, 7, 2, 'Q&Q Q956J302Y', 17.6),
(11, 15, 3, 1, 'Casio GA-1000-1AER', 352),
(12, 15, 7, 1, 'Q&Q Q956J302Y', 17.6),
(13, 15, 2, 1, 'Casio MQ-24-7BUL', 61.6),
(14, 16, 4, 1, 'CasioCitizen JP1010-00E', 352),
(15, 16, 7, 1, 'Q&Q Q956J302Y', 17.6),
(16, 16, 2, 2, 'Casio MQ-24-7BUL', 61.6),
(17, 17, 5, 4, 'Citizen BJ2111-08E', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `old_price` float NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `hit` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `alias`, `content`, `price`, `old_price`, `status`, `keywords`, `description`, `img`, `hit`) VALUES
(1, 6, 'Casio MRP-700-1AVEF', 'casio-mrp-700-1avef', NULL, 300, 0, 1, NULL, NULL, 'p-1.png', 0),
(2, 6, 'Casio MQ-24-7BUL', 'casio-mq-24-7bul', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>\n\n                                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>', 70, 80, 1, '111', '222', 'p-2.png', 1),
(3, 6, 'Casio GA-1000-1AER', 'casio-ga-1000-1aer', NULL, 400, 0, 1, NULL, NULL, 'p-3.png', 1),
(4, 6, 'CasioCitizen JP1010-00E', 'citizen-jp1010-00e', NULL, 400, 0, 1, NULL, NULL, 'p-4.png', 1),
(5, 7, 'Citizen BJ2111-08E', 'citizen-bj2111-08e', NULL, 500, 0, 1, NULL, NULL, 'p-5.png', 1),
(6, 7, 'Citizen AT0696-59E', 'citizen-at0696-59e', NULL, 350, 355, 1, NULL, NULL, 'p-6.png', 1),
(7, 6, 'Q&Q Q956J302Y', 'q-and-q-q956j302y', NULL, 20, 0, 1, NULL, NULL, 'p-7.png', 1),
(8, 6, 'Royal London 41040-01', 'royal-london-41040-01', NULL, 90, 0, 1, NULL, NULL, 'p-8.png', 1),
(9, 6, 'Royal London 20034-02', 'royal-london-20034-02', NULL, 110, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(10, 6, 'Royal London 41156-02', 'royal-london-41156-02', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>\n\n                                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>', 100, 0, 1, NULL, NULL, 'no_image.jpg', 1),
(11, 3, 'Тестовый товар', 'testovyy-tovar', 'контент...', 10, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(12, 7, 'Часы 1', 'chasy-1', NULL, 100, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(13, 7, 'Часы 2', 'chasy-2', NULL, 105, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(14, 7, 'Часы 3', 'chasy-3', NULL, 110, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(15, 7, 'Часы 4', 'chasy-4', NULL, 115, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(16, 7, 'Часы 5', 'chasy-5', NULL, 115, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(17, 7, 'Часы 6', 'chasy-6', NULL, 120, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(20, 7, 'Часы 7', 'chasy-7', NULL, 120, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(21, 7, 'Часы 8', 'chasy-8', NULL, 120, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(22, 7, 'Часы 9', 'chasy-9', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(23, 7, 'Часы 10', 'chasy-10', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(24, 7, 'Часы 11', 'chasy-11', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(25, 7, 'Часы 12', 'chasy-12', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(26, 7, 'Часы 13', 'chasy-13', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(27, 7, 'Часы 14', 'chasy-14', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(28, 7, 'Часы 15', 'chasy-15', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(29, 7, 'Часы 16', 'chasy-16', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(30, 7, 'Часы 17', 'chasy-17', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(31, 7, 'Часы 18', 'chasy-18', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(32, 7, 'Часы 19', 'chasy-19', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(33, 7, 'Часы 20', 'chasy-20', NULL, 125, 0, 1, NULL, NULL, 'no_image.jpg', 0),
(37, 15, 'test3', 'test3', '<p><img alt=\"\" src=\"/public/upload/images/1/1d5620853951db8b412afb30e20d8a7d.png\" style=\"height:200px; width:125px\" /></p>\r\n', 303, 0, 1, '333', '333', 'no_image.jpg', 1),
(38, 15, 'test4', 'test4', '<p><img alt=\"\" src=\"/public/upload/images/1/0e4fded87e494838a84e4cd8bf28ebe1.jpg\" style=\"float:left; height:217px; width:150px\" /></p>\r\n', 404, 0, 1, '444', '444', 'no_image.jpg', 1),
(39, 15, 'test4', 'test4-39', '<p><img alt=\"\" src=\"/public/upload/images/1/0e4fded87e494838a84e4cd8bf28ebe1.jpg\" style=\"float:left; height:217px; width:150px\" /></p>\r\n', 404, 0, 0, '444', '444', 'no_image.jpg', 0),
(40, 15, 'test4', 'test4-40', '<p><img alt=\"\" src=\"/public/upload/images/1/0e4fded87e494838a84e4cd8bf28ebe1.jpg\" style=\"float:left; height:217px; width:150px\" /></p>\r\n', 404, 0, 0, '444', '444', 'no_image.jpg', 0),
(41, 15, 'test5', 'test5', '<p><img alt=\"\" src=\"/public/upload/images/1/1d5620853951db8b412afb30e20d8a7d.png\" style=\"height:200px; width:125px\" /></p>\r\n', 505, 555, 1, '555', '555', 'no_image.jpg', 0),
(42, 15, 'test6', 'test6', '<p><img alt=\"\" src=\"/public/upload/images/1/0e4fded87e494838a84e4cd8bf28ebe1.jpg\" style=\"float:left; height:217px; width:150px\" /></p>\r\n', 542, 0, 1, '6', '6', 'no_image.jpg', 0),
(43, 17, 'test10', 'test10', '', 100, 0, 1, '10', '10', 'no_image.jpg', 0),
(44, 15, 'test1', 'test1-44', '<p><img alt=\"\" src=\"/public/upload/images/1/1d5620853951db8b412afb30e20d8a7d.png\" style=\"height:200px; width:125px\" /></p>\r\n', 102, 100, 1, '111', '111', 'no_image.jpg', 0),
(45, 15, 'test11', 'test11', '', 102, 0, 1, '111', '111', 'bfd25446f18e753931cf3e7d385ec859.png', 0),
(46, 15, 'test12', 'test12', '', 102, 0, 1, '111', '111', 'f7702eb9855c713020a79a0d9f45152c.png', 0),
(47, 15, 'test111', 'test111', '<p>111</p>\r\n', 102, 100, 1, '111', '111', 'no_image.jpg', 0),
(49, 15, 'test112', 'test112', '<p>111</p>\r\n', 102, 100, 1, '111', '111', 'no_image.jpg', 1),
(50, 17, 'test', 'test', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(51, 17, 'test', 'test-51', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(52, 17, 'test', 'test-52', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(53, 17, 'test', 'test-53', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(54, 17, 'test', 'test-54', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(55, 15, 'test', 'test-55', '', 102, 0, 1, '444', '111', 'no_image.jpg', 0),
(56, 15, 'test', 'test-56', '', 102, 0, 1, '444', '111', 'no_image.jpg', 0),
(57, 15, 'test', 'test-57', '', 102, 0, 1, '444', '111', 'no_image.jpg', 0),
(58, 15, 'test', 'test-58', '', 102, 0, 1, '444', '111', 'no_image.jpg', 0),
(59, 15, 'test', 'test-59', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(61, 17, 'test', 'test-61', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(62, 17, 'test', 'test-62', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(63, 17, 'test', 'test-63', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(64, 17, 'test', 'test-64', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(65, 17, 'test', 'test-65', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(66, 17, 'test', 'test-66', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(67, 17, 'test', 'test-67', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(68, 17, 'test', 'test-68', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(69, 17, 'test', 'test-69', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(72, 17, 'test', 'test-72', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(73, 17, 'test', 'test-73', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(74, 17, 'test', 'test-74', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(75, 17, 'test', 'test-75', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(76, 17, 'test', 'test-76', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(77, 17, 'test', 'test-77', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(78, 17, 'test', 'test-78', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(79, 17, 'test', 'test-79', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(80, 17, 'test', 'test-80', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(87, 15, 'test', 'test-87', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(88, 15, 'test', 'test-88', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(89, 15, 'test', 'test-89', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(90, 17, 'test', 'test-90', '<p>111</p>\r\n', 102, 0, 1, '111', '111', '2494b0e98f059385874c7458ef5c7075.jpg', 0),
(91, 17, 'test', 'test-91', '', 102, 0, 1, '111', '111', '54687281a2b7da3ac4b7505676e8ff4e.jpg', 0),
(92, 17, 'test', 'test-92', '', 102, 0, 1, '111', '111', '8f8689045922f224b43d89388ff6083b.jpg', 0),
(93, 17, 'test', 'test-93', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(94, 17, 'test', 'test-94', '', 404, 0, 1, '555', '111', 'no_image.jpg', 0),
(95, 17, 'test', 'test-95', '', 404, 0, 1, '555', '111', 'no_image.jpg', 0),
(96, 17, 'test', 'test-96', '', 404, 0, 1, '555', '111', 'no_image.jpg', 0),
(97, 17, 'test', 'test-97', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(98, 17, 'test', 'test-98', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(99, 17, 'test', 'test-99', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(100, 17, 'test', 'test-100', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(101, 17, 'test', 'test-101', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(102, 17, 'test', 'test-102', '', 102, 0, 1, '6', '111', 'no_image.jpg', 0),
(103, 17, 'test', 'test-103', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(104, 17, 'test', 'test-104', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(105, 17, 'test', 'test-105', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(106, 17, 'test', 'test-106', '', 102, 222, 1, '111', '111', 'no_image.jpg', 0),
(107, 17, 'test', 'test-107', '', 542, 0, 1, '333', '6', 'no_image.jpg', 0),
(108, 17, 'test', 'test-108', '', 542, 0, 1, '333', '6', 'no_image.jpg', 0),
(109, 17, 'test', 'test-109', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(110, 17, 'test', 'test-110', '', 102, 0, 1, '222', '555', 'no_image.jpg', 0),
(111, 17, 'test', 'test-111', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(112, 17, 'test', 'test-112', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(113, 17, 'test', 'test-113', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0),
(114, 17, 'test', 'test-114', '', 404, 0, 1, '111', '111', 'no_image.jpg', 0),
(115, 17, 'test', 'test-115', '', 404, 0, 1, '111', '111', 'no_image.jpg', 0),
(116, 17, 'test', 'test-116', '', 404, 0, 1, '111', '111', 'no_image.jpg', 0),
(117, 17, 'test', 'test-117', '', 404, 0, 1, '111', '111', 'no_image.jpg', 0),
(118, 17, 'test', 'test-118', '', 404, 0, 1, '111', '111', 'no_image.jpg', 0),
(119, 17, 'test', 'test-119', '', 404, 0, 1, '111', '111', 'no_image.jpg', 0),
(120, 17, 'test', 'test-120', '', 404, 0, 1, '111', '111', 'no_image.jpg', 0),
(122, 17, 'test', '', '', 102, 0, 1, '111', '111', 'no_image.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `related_product`
--

CREATE TABLE `related_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `related_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `related_product`
--

INSERT INTO `related_product` (`product_id`, `related_id`) VALUES
(1, 2),
(1, 5),
(2, 5),
(2, 10),
(5, 1),
(5, 7),
(5, 8),
(44, 35),
(44, 37),
(44, 43),
(49, 36),
(49, 38),
(49, 43),
(90, 37),
(90, 42);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `address`, `role`) VALUES
(1, '1', '$2y$10$MkwlAwuUY75M1h0sHJ4aSuq5hnY4pGdMDsd6RVodGe8wq/647wRJa', '1@mail.ru', 'Евгения', 'г. Керчь', 'user'),
(20, '2', '$2y$10$ZhJ4.LcVNNnJx5arao8vSO2RCgM8JyT0mDpEphZS0Cgrk9n.Smc42', '2@mail.ru', 'Евгения', 'г. Керчь', 'user'),
(22, 'admin', '$2y$10$TmZdxCWB6kcwTTgwdGhioOroILCRtMGi7l5FdUwKvc2w9TLA8ErCy', 'admin@mail.ru', 'Евгения', 'г. Керчь', 'admin'),
(23, '3', '$2y$10$5Z1STj1NNW8qGExhAN96GuWCrsaxIf9AarNhVwKzgfqE3qaRZJ8hu', '3@mail.ru', 'Ann', 'г. Керчь', 'user'),
(24, '5', '$2y$10$FtOZjiry8oayyjwa.rN8T.ra.9va23PI0G66ZFYn42Yar754J72zC', '5@mail.ru', 'V\'ova', 'г. Керчь', 'user'),
(25, '6', '$2y$10$/0l94Ovq/FvDNMQ2MreK.eAJgikXu.owHcWV40G5DObaLZf1EuMoC', '6@mail.ru', 'Vlad', 'г. Керчь', 'user'),
(26, '7', '$2y$10$BYH8Ord5h4XYFA63Ix9/C.NuxA/UKlVjjdh7Wa5UoPX6Hp4jlMBtW', '7@mail.ru', 'Dave', 'г. Керчь', 'user'),
(27, '10', '$2y$10$kuvsaB2kFXNfO9tswF2fFeQnvhD1DQZ61F/uM1vQVz2Zi6le4BEBi', '10@mail.ru', 'Ann', 'г. Керчь', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`attr_id`,`product_id`);

--
-- Индексы таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`),
  ADD KEY `attr_group_id` (`attr_group_id`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `hit` (`hit`);

--
-- Индексы таблицы `related_product`
--
ALTER TABLE `related_product`
  ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
