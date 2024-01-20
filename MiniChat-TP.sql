-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 20, 2024 at 10:12 AM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004-log
-- PHP Version: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MiniChat-TP`
--

-- --------------------------------------------------------

--
-- Table structure for table `ChatUsers`
--

CREATE TABLE `ChatUsers` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='here the user table';

--
-- Dumping data for table `ChatUsers`
--

INSERT INTO `ChatUsers` (`id`, `user_name`) VALUES
(1, 'Jorge'),
(2, 'Rabeh'),
(3, 'Orlane'),
(4, 'Yacine'),
(5, 'Romain'),
(15, 'yaccine'),
(16, 'Adam le sage'),
(17, 'Roberto'),
(18, 'hamzaa'),
(19, 'willy'),
(20, 'willo'),
(21, 'ORLANEEEEE'),
(23, 'Lorem Ipsum'),
(24, 'Jacinto'),
(26, 'Robin'),
(27, 'Voyou'),
(28, 'Martin'),
(29, 'Lucas'),
(30, 'Robertou'),
(31, 'Ramon'),
(32, 'Julieta'),
(33, 'javier'),
(34, 'Maria'),
(35, 'Hamza'),
(36, 'Abdel'),
(37, 'lucas1'),
(38, 'Darth Vader'),
(39, 'Jorge v3'),
(40, 'JorgeJoan'),
(41, 'Jorge123'),
(42, 'Jorge5'),
(43, 'El Diablo'),
(44, 'Lucasssss');

-- --------------------------------------------------------

--
-- Table structure for table `UserMessages`
--

CREATE TABLE `UserMessages` (
  `id` int(11) NOT NULL,
  `messages` varchar(256) NOT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `dateHour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserMessages`
--

INSERT INTO `UserMessages` (`id`, `messages`, `user_ip`, `user_id`, `dateHour`) VALUES
(117, 'hola que tal?', '172.16.238.1 ', 1, '12-01-24 01:47:37'),
(118, 'aaaa', '172.16.238.1 ', 1, '12-01-24 01:47:43'),
(119, 'zzzz', '172.16.238.1 ', 1, '12-01-24 01:47:46'),
(120, 'eeeeeee', '172.16.238.1 ', 1, '12-01-24 01:47:51'),
(121, 'tttttt', '172.16.238.1 ', 1, '12-01-24 01:47:54'),
(122, 'yyyyy', '172.16.238.1 ', 1, '12-01-24 01:47:57'),
(123, 'uuuuuu', '172.16.238.1 ', 1, '12-01-24 01:47:59'),
(124, 'iiiiiiii', '172.16.238.1 ', 1, '12-01-24 01:48:04'),
(125, 'oooooooooooooooo', '172.16.238.1 ', 1, '12-01-24 01:48:08'),
(126, 'qqqqqqqqqqqqqqqqqq', '172.16.238.1 ', 1, '12-01-24 01:48:14'),
(127, 'aaaaaaaa', '172.16.238.1 ', 1, '12-01-24 01:52:49'),
(128, 'JorgeJoan', '172.16.238.1 ', 1, '12-01-24 02:33:22'),
(129, 'es mi segundo nombre\r\n', '172.16.238.1 ', 1, '12-01-24 02:33:28'),
(130, 'gghhhhh', '172.16.238.1 ', 1, '12-01-24 03:13:34'),
(131, 'ola', '172.16.238.1 ', 44, '15-01-24 08:56:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ChatUsers`
--
ALTER TABLE `ChatUsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserMessages`
--
ALTER TABLE `UserMessages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_relation` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ChatUsers`
--
ALTER TABLE `ChatUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `UserMessages`
--
ALTER TABLE `UserMessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `UserMessages`
--
ALTER TABLE `UserMessages`
  ADD CONSTRAINT `id_relation` FOREIGN KEY (`user_id`) REFERENCES `ChatUsers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
