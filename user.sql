-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2021 at 04:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
  `id` int(250) NOT NULL COMMENT 'File id',
  `title` varchar(250) DEFAULT NULL,
  `desc` varchar(250) NOT NULL,
  `descfile` varchar(250) NOT NULL COMMENT 'Description File',
  `testcase` varchar(250) NOT NULL COMMENT 'TestCase file',
  `inputfile` varchar(100) NOT NULL COMMENT 'Input file'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Code`
--

INSERT INTO `Code` (`id`, `title`, `desc`, `descfile`, `testcase`, `inputfile`) VALUES
(23, 'Substraction of Numbers', 'Substraction of 2 numbers', '29284-sub_2_no.txt', '91796-sub_2_no_answer.txt', '28407-sub_2_no_input.txt');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `contestname` varchar(30) NOT NULL,
  `startdate` date NOT NULL DEFAULT current_timestamp(),
  `starttime` timestamp NOT NULL DEFAULT current_timestamp(),
  `enddate` date NOT NULL DEFAULT current_timestamp(),
  `endtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `organizationname` varchar(30) NOT NULL,
  `organizationtype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`contestname`, `startdate`, `starttime`, `enddate`, `endtime`, `organizationname`, `organizationtype`) VALUES
('vcet', '2020-01-26', '2020-01-17 20:29:00', '2020-01-26', '2020-01-24 20:29:00', 'vcetname', 'vcettype'),
('Parth hackathon', '2020-11-19', '2020-11-20 14:09:00', '2020-11-19', '2020-11-23 14:10:00', 'vcet college', 'Vcet'),
('Parth hackathon vcet', '2020-11-20', '2020-11-20 07:13:00', '2020-11-20', '2020-11-27 07:13:00', 'vcet college thane', 'Vcet college'),
('Rishi hackathon1', '2020-11-20', '2020-11-20 07:42:00', '2020-11-20', '2020-11-28 07:42:00', 'vcet college thane', 'Vcet college');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `user` varchar(30) NOT NULL COMMENT 'User ID taken from user.name',
  `title` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(1) NOT NULL COMMENT '1-AnswerCorrect and 0-WrongAnswer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`user`, `title`, `date`, `status`) VALUES
('dipak', 'Add Numbers', '2021-04-28 06:55:15', '1'),
('dipak', 'Add Numbers', '2021-04-28 06:57:59', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL COMMENT 'Unique User ID',
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL COMMENT 'Password',
  `status` varchar(30) NOT NULL COMMENT 'Profession'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `pass`, `status`) VALUES
('dipak', 'dipak717gautam@gmail.com', 'dipak', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Code`
--
ALTER TABLE `Code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Code`
--
ALTER TABLE `Code`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT COMMENT 'File id', AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
