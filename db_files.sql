-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 02:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--
CREATE DATABASE IF NOT EXISTS `webapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webapp`;

-- --------------------------------------------------------

--
-- Table structure for table `admindb`
--

CREATE TABLE `admindb` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindb`
--

INSERT INTO `admindb` (`id`, `email`, `password`) VALUES
(2, 'stiveckamash@gmail.com', 'stephen');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `stock`) VALUES
(9, 'sukumA', 'ddfbgfv', 34, '3454'),
(10, 'iuwwwwwaefv', '12471385737', 457, '234'),
(11, 'eeegrg', 'efehef', 325, '324'),
(12, '3rfdsfs', 'trhgv', 7654, '987'),
(13, 'sghf', 'hjwbf', 34, '284'),
(14, 'dfhkjnklv', 'hjbdc,hjbv', 35345, '3454'),
(15, 'gffbht', 'uthgf', 54, '78');

-- --------------------------------------------------------

--
-- Table structure for table `regestrationdata`
--

CREATE TABLE `regestrationdata` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regestrationdata`
--

INSERT INTO `regestrationdata` (`id`, `username`, `email`, `phone`, `password`) VALUES
(2, 'THEWE', 'stiveckamash@gmail.com', '', '$2y$10$anBaLHfohLpIzYxqX8d5t.VO/6q4MB6eXlYP3/bhB9EhENemTYK9e'),
(5, 'johndoe', 'a@X.com', '123456789', '$2y$10$4wxkhvVpd0JJ3vc1gcHCA.wyLMovdQOPvpSJOZVwdhT048WtBU4Ee'),
(6, 'johnstef', 'stephen@gmail.com', '234567', '$2y$10$G/vM1jCucSH/ra53b4wGMOKSo/HDiigD.UJX85UQhwdMBJg3CHSfi'),
(7, 'stephenkamau', 'ste@gmail.com', '2347889509', '$2y$10$Cpe8Sg.IFTwVYxDJuZR3fejhDMh9.R.sm5.U9KI/F1MlgPWkhFdVm'),
(8, 'stephenkk', 'dd@gmail.com', '354776', '$2y$10$6VxUeJOn6w51F3mzlmaMnON00wZ/wobDk3aKSlEzuUZlIlBW1aAoq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindb`
--
ALTER TABLE `admindb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regestrationdata`
--
ALTER TABLE `regestrationdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindb`
--
ALTER TABLE `admindb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `regestrationdata`
--
ALTER TABLE `regestrationdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
