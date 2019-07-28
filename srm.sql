-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2019 at 02:39 PM
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
-- Database: `srm`
--

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `final` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `name`, `product`) VALUES
(4, ' MRF', 'TYRE'),
(5, ' CEAT ', 'TUBE'),
(6, ' MGP ', 'TRAIN');

-- --------------------------------------------------------

--
-- Table structure for table `input`
--

CREATE TABLE `input` (
  `id` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `problems` varchar(255) NOT NULL,
  `frequency` int(10) NOT NULL,
  `severity` int(10) NOT NULL,
  `detection` int(10) NOT NULL,
  `rpm` int(11) NOT NULL,
  `weightage` float DEFAULT NULL,
  `ratings` int(11) DEFAULT NULL,
  `final` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `input`
--

INSERT INTO `input` (`id`, `vid`, `problems`, `frequency`, `severity`, `detection`, `rpm`, `weightage`, `ratings`, `final`) VALUES
(8, 4, 'Rejection', 1, 3, 5, 15, 71.4286, 0, NULL),
(13, 5, 'Rework/failures', 2, 3, 3, 18, 20.6897, 0, NULL),
(16, 8, 'Rejection', 2, 2, 4, 16, 14.9533, 0, NULL),
(18, 5, 'Delivery of products', 1, 1, 1, 36, 0, 0, NULL),
(22, 4, 'Logistics', 2, 2, 1, 4, 4.49438, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;