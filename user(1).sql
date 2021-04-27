-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2021 at 10:00 AM
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
(19, 'Add Numbers', 'Add list of 5 numbers', '89237-Add_5_no.txt', '93808-Add_5_no_answer.txt');

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
  `user` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`user`, `title`, `date`, `status`) VALUES
('dipak', '', '2021-04-27 07:06:01', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:06:56', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:10:11', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:12:16', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:12:48', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:18:38', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:19:25', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:20:20', '0'),
('dipak', 'Add Numbers', '2021-04-27 07:33:31', ''),
('dipak', 'Add Numbers', '2021-04-27 07:35:48', '1'),
('dipak', 'Add Numbers', '2021-04-27 07:37:09', '1'),
('dipak', 'Add Numbers', '2021-04-27 07:38:38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Code`
--
ALTER TABLE `Code`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
