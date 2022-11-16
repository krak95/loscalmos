-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2022 às 06:38
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `demojoin`
--
CREATE DATABASE IF NOT EXISTS `demojoin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `demojoin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `order_number`, `quantity`, `item_name`) VALUES
(1, 1, 1, NULL, NULL, '123'),
(2, 1, 1, NULL, NULL, '123'),
(3, 5, 1, NULL, NULL, '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `price`) VALUES
(1, '123', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `pwd`, `email`) VALUES
(1, 'jose', 'amorim', 'jose', 'jose', 'jose'),
(3, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL),
(5, 'jose1', 'jose1', 'jose1', 'jose1', 'jose1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
--
-- Banco de dados: `mypoket`
--
CREATE DATABASE IF NOT EXISTS `mypoket` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mypoket`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `poketbattle`
--

CREATE TABLE `poketbattle` (
  `pb_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `stage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `poketmoves`
--

CREATE TABLE `poketmoves` (
  `move_id` int(11) NOT NULL,
  `move_name` varchar(255) DEFAULT NULL,
  `move_val` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `poketmoves`
--

INSERT INTO `poketmoves` (`move_id`, `move_name`, `move_val`) VALUES
(1, 'splassh', '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pokets`
--

CREATE TABLE `pokets` (
  `poket_id` int(11) NOT NULL,
  `poket_name` varchar(255) DEFAULT NULL,
  `poket_points` varchar(255) DEFAULT NULL,
  `move_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pokets`
--

INSERT INTO `pokets` (`poket_id`, `poket_name`, `poket_points`, `move_id`) VALUES
(1, 'poket1', '100', '1'),
(2, 'poket2', '100', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `poket_chat`
--

CREATE TABLE `poket_chat` (
  `user_from_id` varchar(255) DEFAULT NULL,
  `user_to_id` varchar(255) DEFAULT NULL,
  `chat_msg` varchar(255) DEFAULT NULL,
  `chat_id` int(11) NOT NULL,
  `data` datetime DEFAULT current_timestamp(),
  `msg_seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `poket_chat`
--

INSERT INTO `poket_chat` (`user_from_id`, `user_to_id`, `chat_msg`, `chat_id`, `data`, `msg_seen`) VALUES
('ubuntu', 'jose', NULL, 389, '2022-10-27 03:32:42', 1),
('qwe', 'jose', NULL, 390, '2022-10-27 03:32:42', 1),
('user', 'jose', NULL, 391, '2022-10-27 03:32:44', 1),
('karalho', 'jose', NULL, 392, '2022-10-27 03:32:44', 1),
('jose', NULL, 'awdawd', 393, '2022-10-27 03:52:28', 0),
('jose', NULL, 'awdawd', 394, '2022-10-27 03:52:28', 0),
('jose', NULL, 'awdawd', 395, '2022-10-27 03:52:28', 0),
('jose', NULL, 'awdawd', 396, '2022-10-27 03:52:28', 0),
('jose', NULL, 'awdawd', 397, '2022-10-27 03:52:29', 0),
('jose', 'user', 'awdaw', 398, '2022-10-27 03:52:45', 1),
('jose', 'user', 'olá', 399, '2022-10-27 03:52:51', 1),
('jose', 'user', 'olá', 400, '2022-10-27 03:52:54', 1),
('jose', 'ubuntu', 'olá', 401, '2022-10-27 03:53:00', 0),
('jose', 'user', 'asdfasdf', 402, '2022-10-27 03:53:08', 1),
('jose', 'user', 'asdfasdf', 403, '2022-10-27 03:53:09', 1),
('jose', 'user', 'asdfasdf', 404, '2022-10-27 03:53:09', 1),
('jose', 'user', 'asdfasdf', 405, '2022-10-27 03:53:09', 1),
('jose', 'user', 'asdfasdf', 406, '2022-10-27 03:53:09', 1),
('jose', 'user', 'asdfasdf', 407, '2022-10-27 03:53:09', 1),
('jose', 'user', 'asdfasdf', 408, '2022-10-27 03:53:09', 1),
('jose', 'user', 'asdfasdf', 409, '2022-10-27 03:53:10', 1),
('jose', 'user', 'asdfasdf', 410, '2022-10-27 03:53:10', 1),
('jose', 'user', 'olá', 411, '2022-10-27 03:53:37', 1),
('jose', 'user', 'olá', 412, '2022-10-27 03:53:38', 1),
('jose', 'user', 'olá', 413, '2022-10-27 03:53:39', 1),
('jose', 'user', 'olá', 414, '2022-10-27 03:53:39', 1),
('jose', 'user', 'olá', 415, '2022-10-27 03:53:39', 1),
('jose', 'karalho', 'wdawad', 416, '2022-10-27 03:53:42', 1),
('jose', 'karalho', 'wdawad', 417, '2022-10-27 03:53:42', 1),
('jose', 'karalho', 'wdawad', 418, '2022-10-27 03:53:43', 1),
('jose', 'karalho', 'wdawad', 419, '2022-10-27 03:53:43', 1),
('ubuntu', 'user', NULL, 420, '2022-10-27 05:27:23', 1),
('karalho', 'user', NULL, 421, '2022-10-27 05:27:23', 1),
('qwe', 'user', NULL, 422, '2022-10-27 05:27:23', 1),
('jose', 'user', 'oi', 423, '2022-10-27 05:27:33', 1),
('user', 'jose', 'oi', 424, '2022-10-27 05:27:36', 1),
('jose', 'user', 'oi ', 425, '2022-10-27 05:27:47', 1),
('jose', 'user', 'ooioi', 426, '2022-10-27 05:27:51', 1),
('jose', 'user', 'a', 427, '2022-10-27 05:27:53', 1),
('jose', 'user', ' ', 428, '2022-10-27 05:27:55', 1),
('jose', 'ubuntu', 'oi', 429, '2022-10-27 05:29:12', 0),
('user', 'jose', 'wad', 430, '2022-10-27 05:32:08', 1),
('user', 'ubuntu', 'awd', 431, '2022-10-27 05:32:10', 0),
('jose', 'user', 'awdawd', 432, '2022-10-27 05:33:07', 1),
('user', 'jose', 'awdawd', 433, '2022-10-27 05:36:07', 1),
('user', 'ubuntu', 'awdawd', 434, '2022-10-27 05:36:09', 0),
('user', 'ubuntu', 'awdawd', 435, '2022-10-27 05:36:09', 0),
('user', 'ubuntu', 'awdawd', 436, '2022-10-27 05:36:09', 0),
('user', 'ubuntu', 'awdawd', 437, '2022-10-27 05:36:09', 0),
('user', 'karalho', NULL, 438, '2022-10-28 02:32:18', 1),
('ubuntu', 'karalho', NULL, 439, '2022-10-28 02:32:18', 1),
('qwe', 'karalho', NULL, 440, '2022-10-28 02:32:18', 1),
('karalho', 'jose', 'olá josé', 441, '2022-10-28 02:32:35', 1),
('jose', 'karalho', 'olá karalho', 442, '2022-10-28 02:32:38', 1),
('jose', 'karalho', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 443, '2022-10-28 02:32:46', 1),
('jose', 'karalho', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaàsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaàsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaàsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaàsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaàsaaaaaaaaaaaaaaaaaaaa', 444, '2022-10-28 02:39:51', 1),
('jose', 'karalho', 'refreshchat', 445, '2022-10-28 02:40:41', 1),
('jose', 'karalho', 'refreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchat', 446, '2022-10-28 02:40:43', 1),
('jose', 'karalho', 'refreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchatrefreshchat', 447, '2022-10-28 02:40:45', 1),
('jose', '', NULL, 448, '2022-10-29 16:20:38', 1),
('user', '', NULL, 449, '2022-10-29 16:20:38', 1),
('ubuntu', '', NULL, 450, '2022-10-29 16:20:38', 1),
('karalho', '', NULL, 451, '2022-10-29 16:20:38', 1),
('qwe', '', NULL, 452, '2022-10-29 16:20:38', 1),
('', 'jose', NULL, 453, '2022-10-29 20:47:34', 1),
('', 'user', NULL, 454, '2022-10-29 21:54:21', 1),
('jose', 'user', 'olá', 455, '2022-10-30 00:46:39', 1),
('jose', 'user', 'sasd', 456, '2022-10-30 01:13:13', 1),
('jose', 'ubuntu', 'awdawd', 457, '2022-10-30 01:15:00', 0),
('jose', 'qwe', 'a', 458, '2022-10-30 01:16:30', 0),
('jose', 'karalho', 'a', 459, '2022-10-30 01:16:39', 1),
('', 'karalho', NULL, 460, '2022-10-31 01:39:00', 1),
('user', 'jose', 'oi', 461, '2022-10-31 02:07:32', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `user_pwd` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `poket_id` varchar(255) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_pwd`, `user_email`, `poket_id`, `user_status`) VALUES
(4, 'jose', 'jose', 'jose', '1', 0),
(6, 'user', 'user', 'user', NULL, 0),
(9, 'ubuntu', 'ubuntu', 'ubnutu', NULL, 0),
(10, 'karalho', 'karalho', 'karalho', NULL, 0),
(11, 'qwe', 'qwe', 'qwe', NULL, 0),
(12, '', '', '', NULL, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `poketbattle`
--
ALTER TABLE `poketbattle`
  ADD PRIMARY KEY (`pb_id`);

--
-- Índices para tabela `poketmoves`
--
ALTER TABLE `poketmoves`
  ADD PRIMARY KEY (`move_id`);

--
-- Índices para tabela `pokets`
--
ALTER TABLE `pokets`
  ADD PRIMARY KEY (`poket_id`),
  ADD UNIQUE KEY `poket_name` (`poket_name`),
  ADD UNIQUE KEY `move_id` (`move_id`);

--
-- Índices para tabela `poket_chat`
--
ALTER TABLE `poket_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `poketbattle`
--
ALTER TABLE `poketbattle`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `poketmoves`
--
ALTER TABLE `poketmoves`
  MODIFY `move_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pokets`
--
ALTER TABLE `pokets`
  MODIFY `poket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `poket_chat`
--
ALTER TABLE `poket_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Banco de dados: `onlineshop`
--
CREATE DATABASE IF NOT EXISTS `onlineshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `onlineshop`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `price_final` varchar(333) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(333) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` varchar(333) COLLATE utf8_unicode_ci DEFAULT '1',
  `item_id` varchar(333) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(55,2) DEFAULT NULL,
  `stock` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `price`, `stock`, `img`) VALUES
(5, 'Apple', '7.50', '1', 'sbb.PNG'),
(8, 'Toshiba', '10.00', '3', 'hu5.jpg'),
(45, 'HP', '100.00', '1', NULL),
(46, 'karalho', '11.00', '1', NULL),
(47, 'aaa', '123.00', '1', NULL),
(48, 'bbb', '123.00', '1', NULL),
(49, 'ccc', '123.00', '1', NULL),
(50, 'ddd', '123.00', '1', NULL),
(51, 'eee', '123.00', '1', NULL),
(52, 'fff', '123.00', '1', NULL),
(53, 'ggg', '123.00', '1', NULL),
(54, 'qqq', '123.00', '1', NULL),
(55, 'www', '123.00', '1', NULL),
(56, 'trtt', '123.00', '1', NULL),
(57, 'yyy', '123.00', '1', NULL),
(58, 'uuu', '123.00', '1', NULL),
(59, 'jjj', '123.00', '1', NULL),
(60, 'wadaw', '123.00', '1', NULL),
(61, 'awd', '123.00', '1', NULL),
(62, 'lol', '11.00', '1', NULL),
(63, 'lol1', '33.00', '1', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recordorder`
--

CREATE TABLE `recordorder` (
  `order_id` int(11) NOT NULL,
  `price_final` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `recordorder`
--

INSERT INTO `recordorder` (`order_id`, `price_final`, `username`, `quantity`, `item_name`, `time`) VALUES
(314, '10.00', 'user', '1', 'Toshiba', '2022-11-06 23:41:06'),
(315, '15.00', 'user', '2', 'Apple', '2022-11-06 23:41:06'),
(316, '100.00', 'user', '1', 'HP', '2022-11-06 23:41:07'),
(317, '11.00', 'user', '1', 'karalho', '2022-11-06 23:41:07'),
(318, '123.00', 'user', '1', 'aaa', '2022-11-06 23:41:07'),
(319, '123.00', 'user', '1', 'bbb', '2022-11-06 23:41:07'),
(320, '10.00', 'user', '1', 'Toshiba', '2022-11-06 23:41:34'),
(321, '15.00', 'user', '2', 'Apple', '2022-11-06 23:41:34'),
(322, '100.00', 'user', '1', 'HP', '2022-11-06 23:41:34'),
(323, '11.00', 'user', '1', 'karalho', '2022-11-06 23:41:34'),
(324, '123.00', 'user', '1', 'aaa', '2022-11-06 23:41:34'),
(325, '123.00', 'user', '1', 'bbb', '2022-11-06 23:41:34'),
(326, '7.50', 'user', '1', 'Apple', '2022-11-06 23:57:38'),
(327, '10.00', 'user', '1', 'Toshiba', '2022-11-06 23:57:38'),
(328, '7.50', 'user', '1', 'Apple', '2022-11-07 00:17:37'),
(329, '55.00', 'user', '5', 'karalho', '2022-11-07 00:17:53'),
(330, '123.00', 'user', '1', 'aaa', '2022-11-07 00:20:34'),
(331, '7.50', 'jose', '1', 'Apple', '2022-11-07 15:11:29'),
(332, '7.50', 'jose', '1', 'Apple', '2022-11-07 15:12:11'),
(333, '7.50', 'jose', '1', 'Apple', '2022-11-07 15:12:48'),
(334, '10.00', 'jose', '1', 'Toshiba', '2022-11-07 15:14:38'),
(335, '10.00', 'jose', '1', 'Toshiba', '2022-11-07 15:17:51'),
(336, '7.50', 'jose', '1', 'Apple', '2022-11-07 15:31:31'),
(337, '7.50', 'jose', '1', 'Apple', '2022-11-07 15:31:57'),
(338, '10.00', 'jose', '1', 'Toshiba', '2022-11-07 15:32:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temp`
--

CREATE TABLE `temp` (
  `item_id` int(11) NOT NULL,
  `item_idss` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `temp`
--

INSERT INTO `temp` (`item_id`, `item_idss`) VALUES
(1, '5'),
(2, '8'),
(3, '8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `avatar` mediumblob DEFAULT NULL,
  `reset_pass` varchar(333) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`, `admin`, `avatar`, `reset_pass`, `time`) VALUES
(6, 'user', 'user@gmail.com', '$2y$10$E1sA7X/DHe9ZD0cMsGORTuVyWDR1KkVsHWtVm8wP0zxE4My0GIMWW', 'user', NULL, 0x4361707475726120646520656372c3a35f32303232313032335f3037303131312e706e67, NULL, NULL),
(21, 'jose', 'jpoa95@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VjFEOWJGZUJCMURKMWM0MA$A1ajkSK1AzxsVIjs5sw2UYIXdklG3fqtWpoHTC/CUqI', 'jose', 1, 0x4361707475726120646520656372c3a35f32303232313032365f3034353933372e706e67, NULL, NULL),
(141, 'reac', 'reac', 'reac', 'reac', NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `username` (`username`);

--
-- Índices para tabela `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_name` (`item_name`);

--
-- Índices para tabela `recordorder`
--
ALTER TABLE `recordorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `username` (`username`,`item_name`);

--
-- Índices para tabela `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`item_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de tabela `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `recordorder`
--
ALTER TABLE `recordorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT de tabela `temp`
--
ALTER TABLE `temp`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- Banco de dados: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Extraindo dados da tabela `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'db', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"demojoin\",\"mypoket\",\"onlineshop\",\"phpmyadmin\",\"sistemas\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"estructura da tabela @TABLE@\",\"latex_structure_continued_caption\":\"estructura da tabela @TABLE@ (continuação)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Conteúdo da tabela @TABLE@\",\"latex_data_continued_caption\":\"Conteúdo da tabela @TABLE@ (continuação)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"onlineshop\",\"table\":\"users\"},{\"db\":\"onlineshop\",\"table\":\"cart\"},{\"db\":\"onlineshop\",\"table\":\"recordorder\"},{\"db\":\"mypoket\",\"table\":\"users\"},{\"db\":\"mypoket\",\"table\":\"poket_chat\"},{\"db\":\"mypoket\",\"table\":\"poket_users\"},{\"db\":\"onlineshop\",\"table\":\"items\"},{\"db\":\"mypoket\",\"table\":\"poketbattle\"},{\"db\":\"mypoket\",\"table\":\"poketmoves\"},{\"db\":\"mypoket\",\"table\":\"pokets\"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

--
-- Extraindo dados da tabela `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('mypoket', 'poket_chat', 'user_from_id', 'mypoket', 'users', 'username'),
('mypoket', 'poket_chat', 'user_to_id', 'mypoket', 'users', 'username'),
('mypoket', 'pokets', 'move_id', 'mypoket', 'poketmoves', 'move_id'),
('mypoket', 'users', 'poket_id', 'mypoket', 'pokets', 'poket_id'),
('onlineshop', 'carrinho', 'user_id', 'onlineshop', 'users', 'user_id'),
('onlineshop', 'cart', 'item_id', 'onlineshop', 'items', 'item_id'),
('onlineshop', 'cart', 'username', 'onlineshop', 'users', 'user_id'),
('onlineshop', 'recordorder', 'item_name', 'onlineshop', 'items', 'item_name'),
('onlineshop', 'recordorder', 'username', 'onlineshop', 'cart', 'username');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('mypoket', 'poket_chat', 'user_from_id'),
('mypoket', 'pokets', 'poket_name'),
('mypoket', 'users', 'username'),
('onlineshop', 'carrinho', 'item'),
('onlineshop', 'cart', 'price_final'),
('onlineshop', 'recordorder', 'price_final'),
('onlineshop', 'users', 'username');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'mypoket', 'poket_chat', '{\"sorted_col\":\"`poket_chat`.`msg_seen` DESC\"}', '2022-10-25 23:26:46'),
('root', 'mypoket', 'users', '{\"CREATE_TIME\":\"2022-10-22 06:07:59\",\"col_order\":[0,1,2,4,3,5],\"col_visib\":[1,1,1,1,1,1]}', '2022-10-26 03:08:37'),
('root', 'onlineshop', 'recordorder', '{\"sorted_col\":\"`recordorder`.`quantidade` ASC\"}', '2022-11-06 23:09:47'),
('root', 'onlineshop', 'users', '{\"sorted_col\":\"`users`.`user_id` ASC\"}', '2022-10-16 22:03:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-11-11 05:37:55', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"pt\",\"NavigationWidth\":211}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices para tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices para tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices para tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices para tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices para tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices para tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices para tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices para tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices para tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices para tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices para tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `sistemas`
--
CREATE DATABASE IF NOT EXISTS `sistemas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistemas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fac`
--

CREATE TABLE `fac` (
  `id` int(11) NOT NULL,
  `entrega` varchar(99) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fac`
--

INSERT INTO `fac` (`id`, `entrega`, `data`) VALUES
(5, 'Mini-teste 3', '2022-12-02 00:40:15'),
(6, 'Mini-teste 4', '2023-01-06 00:40:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `psp`
--

CREATE TABLE `psp` (
  `id` int(99) NOT NULL,
  `entrega` varchar(99) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `psp`
--

INSERT INTO `psp` (`id`, `entrega`, `data`) VALUES
(9, '', '2022-11-08 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pti`
--

CREATE TABLE `pti` (
  `id` int(99) NOT NULL,
  `entrega` varchar(999) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pti`
--

INSERT INTO `pti` (`id`, `entrega`, `data`) VALUES
(0, 'Relatórios', '2022-11-28 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rsp`
--

CREATE TABLE `rsp` (
  `id` int(99) NOT NULL,
  `entrega` varchar(999) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `rsp`
--

INSERT INTO `rsp` (`id`, `entrega`, `data`) VALUES
(10, 'Teste 1', '2022-11-17 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sap`
--

CREATE TABLE `sap` (
  `id` int(99) NOT NULL,
  `entrega` varchar(999) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fac`
--
ALTER TABLE `fac`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `psp`
--
ALTER TABLE `psp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `rsp`
--
ALTER TABLE `rsp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sap`
--
ALTER TABLE `sap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fac`
--
ALTER TABLE `fac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `psp`
--
ALTER TABLE `psp`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `rsp`
--
ALTER TABLE `rsp`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `sap`
--
ALTER TABLE `sap`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Banco de dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
