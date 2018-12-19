-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 10:57 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `date` varchar(10) NOT NULL DEFAULT '0',
  `e_id` int(20) NOT NULL,
  `attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `date`, `e_id`, `attendance`) VALUES
(1, '2017-07-19', 100, 1),
(2, '2017-07-19', 200, 0),
(133, '2017-07-19', 202, 0);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `ID` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobi_no` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `confirmation` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `salary_flag` int(1) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_of_join` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `age` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`ID`, `e_id`, `firstname`, `lastname`, `mobi_no`, `email`, `address`, `gender`, `designation`, `created`, `confirmation`, `admin`, `salary_flag`, `password`, `date_of_join`, `age`) VALUES
(1, 100, 'admin', 'admin last', 8801726101888, 'admin@mail.com', ' abcdefghij', 'male', 'project manager', '2017-07-19 05:16:18', 1, 1, 1, '12345', '0000-00-00 00:00:00', 0),
(2, 200, 'user', 'user last', 8801293247561, 'user@mail.com', '1234567890', 'male', 'programmer', '2017-07-19 09:09:27', 1, 0, 1, '1234', '2017-07-18 04:20:46', 25),
(3, 0, 'user not confirm', 'user not confim', 12345678909, 'userno@mail.com', '1234567890', 'male', 'project manager', '2017-07-20 04:23:54', 0, 0, 0, '1234', '2017-07-20 04:14:11', 24),
(14, 201, 'user1', 'user1', 8812345678901, 'a@mail.com', 'asfsddsfgdsfhsdgsdfgasdfad', 'female', 'project manager', '2017-07-19 20:43:31', 1, 0, 0, '1234', '2017-07-19 20:43:31', 21),
(15, 202, 'user2', 'user2', 8801293247561, 'a@mail.com', 'sdfsdgafdgsgsfgsfg', 'male', 'designer', '2017-07-19 20:54:53', 1, 0, 0, '1234', '2017-07-19 20:54:53', 32),
(16, 0, 'user3', 'user3', 8812345678901, 'a@mail.com', 'asfsdgafhhdfsgdsfgsdgdfg', 'female', 'designer', '2017-07-19 20:53:23', 0, 0, 0, '1234', '0000-00-00 00:00:00', 43),
(17, 0, 'user4', 'user4', 8812345678909, 'b@mail.com', 'asfsgsdhfgsdafda', 'male', 'project manager', '2017-07-19 20:54:05', 0, 0, 0, '1234', '0000-00-00 00:00:00', 21),
(18, 0, 'user5', 'user5', 8812345678909, 'c@mail.com', 'asfsgdfbvxbgfgfhsdfg', 'female', 'developer', '2017-07-19 20:54:35', 0, 0, 0, '1234', '0000-00-00 00:00:00', 54);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `number_post` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `requirement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `designation`, `number_post`, `salary`, `requirement`) VALUES
(1, 'project manager', 5, 10000, 'good ledership'),
(2, 'developer', 5, 7000, 'java , c#'),
(5, 'programeer', 5, 6000, 'c , c++'),
(6, 'designer', 4, 6000, 'html css ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
