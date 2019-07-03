-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 07:30 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cineplex`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `username` varchar(200) NOT NULL,
  `amount` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`username`, `amount`) VALUES
('asif12', '500'),
('asif123', '500'),
('asifrahman', '500'),
('asifrahman23', '500');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `name`, `email`, `contact`, `password`) VALUES
(1, 'ironimran', 'Md. Imran', 'imran@gmail.com', '01772-102030', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `total_seat` int(100) NOT NULL,
  `show_date` varchar(15) NOT NULL,
  `show_time` varchar(100) NOT NULL,
  `total_bill` int(50) NOT NULL,
  `booked_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `cus_email`, `movie_name`, `total_seat`, `show_date`, `show_time`, `total_bill`, `booked_at`) VALUES
(4, 'asifrahman@gmail.com', 'Titanic', 1, '2018-04-19', '01', 250, '2018-04-12 21:34:54'),
(5, 'asifrahman@gmail.com', 'Titanic', 2, '2018-04-26', '01', 500, '2018-04-12 21:38:47'),
(6, 'a@gmail.com', 'Titanic', 2, '2019-04-27', '09', 500, '2019-04-27 11:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `username`, `name`, `email`, `gender`, `dob`, `contact`, `address`, `password`) VALUES
(1, 'asifrahman', 'md asif', 'a@gmail.com', 'male', '2018-04-14', '134567898765456', 'zxcfxgv sdfgd', '25d55ad283aa400af464c76d713c07ad'),
(9, 'asif12', 'md. asif', 'as@gmail.com', 'male', '2018-04-20', '01772635883', 'vhj', 'fcea920f7412b5da7be0cf42b8c93759'),
(12, 'asif123', 'md. asif', 'asifrah@gmail.com', 'male', '2018-04-28', '34567866666', 'sdfg', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'asifrahman23', 'asif rahman', 'asifrahman@gmail.com', 'male', '2018-04-21', '2365679866676', 'sdbk', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `movie_info`
--

CREATE TABLE `movie_info` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `cast` varchar(200) NOT NULL,
  `release_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_info`
--

INSERT INTO `movie_info` (`id`, `name`, `director`, `genre`, `cast`, `release_date`) VALUES
(6, 'Titanic', 'Imran', 'real story', 'Shapla & Minar', '2018-04-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `movie_info`
--
ALTER TABLE `movie_info`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `movie_info`
--
ALTER TABLE `movie_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
