-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2020 at 09:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `Code`
--

CREATE TABLE `Code` (
  `id` int(250) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `desc` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `testcase` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Code`
--

INSERT INTO `Code` (`id`, `title`, `desc`, `file`, `testcase`) VALUES
(15, 'Thanos Challenge', 'Just take 2 number as input and Add it.', 'Thonesproblem.txt', '6884-key.txt'),
(16, 'Multiply two numbers', 'Just take 2 number and Multiply it', '7536-bubbleSort.txt', '4485-key.txt'),
(17, 'Subtract two numbers', 'Take 2 number as input and subtract it', '7048-bubbleSort.txt', '1103-key.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Code`
--
ALTER TABLE `Code`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Code`
--
ALTER TABLE `Code`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
