-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2018 at 01:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crickquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE `tbl_answer` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `queNo` int(11) NOT NULL,
  `ans` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_que`
--

CREATE TABLE `tbl_que` (
  `qNo` bigint(5) NOT NULL,
  `que` varchar(500) NOT NULL,
  `optA` varchar(50) NOT NULL,
  `optB` varchar(50) NOT NULL,
  `optC` varchar(50) NOT NULL,
  `optD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_que`
--

INSERT INTO `tbl_que` (`qNo`, `que`, `optA`, `optB`, `optC`, `optD`) VALUES
(2, 'Which brand bat you like most?', 'GS', 'MRF', 'SS', 'SI'),
(3, 'Which brand pad you like most?', 'SG', 'Spartan', 'SS', 'SI'),
(4, 'Which company ball your like to use?', 'GS', 'Kookaburra', 'SS', 'SF'),
(5, 'At which level you are playing now', 'State', 'National', 'Club', 'Local/College'),
(6, 'Which brand spiker you like most?', 'Adidas', 'Nike', 'Puma', 'CCS'),
(7, 'Which website you prefer to buy cricket kit?', 'Flipkart', 'Amazon', 'Snapdeal', 'Khelmart'),
(8, 'Which brand gloves you like most?', 'SG', 'SS', 'BAS', 'Other'),
(9, 'Which team you like most in IPL?', 'CSK', 'KKR', 'Hayderabad', 'Other'),
(10, 'Which cricketer you like most?', 'Viart Kohli', 'M S Dhoni', 'Chris Gayle', 'Steve Smith'),
(11, 'Whick bowler you like most?', 'Zaheer Khan', 'Bhuvaneshwar Kumar', 'Anil Kumble', 'Ravichandran Ashwin'),
(12, 'Which brand you like most', 'Adidas', 'Nike', 'SS', 'SG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `playerName` varchar(50) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userque`
--

CREATE TABLE `tbl_userque` (
  `id` bigint(5) NOT NULL,
  `userId` bigint(5) NOT NULL,
  `queNo` bigint(5) NOT NULL,
  `ans` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_que`
--
ALTER TABLE `tbl_que`
  ADD PRIMARY KEY (`qNo`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`uId`);

--
-- Indexes for table `tbl_userque`
--
ALTER TABLE `tbl_userque`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_que`
--
ALTER TABLE `tbl_que`
  MODIFY `qNo` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_userque`
--
ALTER TABLE `tbl_userque`
  MODIFY `id` bigint(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
