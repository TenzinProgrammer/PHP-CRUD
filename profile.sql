-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2024 at 05:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtHotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `picture` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `fname`, `lname`, `gender`, `birth`, `city`, `state`, `picture`) VALUES
(3, 'ngawang yangchen', 'yangchen', 'female', '2024-04-12', 'bylakuppe', 'karnataka', 'images/me.png'),
(4, 'tenzin', 'jigmey', 'male', '2024-04-04', 'pandoh', 'himachal pradesh', 'images/xcode.png'),
(11, 'tenzin', 'sonam', 'female', '2023-11-08', 'pandoh', 'upper pandoh', 'images/mom.jpg'),
(12, 'B Chanye', 'Kumar', 'male', '2024-04-12', 'bangalore', 'Karnataka', 'images/thumb copy.png'),
(13, 'rakesh', 'khanna', 'female', '2024-04-09', 'bombay', 'maharashtra', 'images/81004739_8-2_1.jpg'),
(14, 'dimpy', 'sharma', 'male', '2024-04-10', 'gwalior', 'madya pradesh', 'images/WhatsApp Image 2024-04-05 at 12.33.41 PM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
