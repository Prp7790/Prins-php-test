-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2024 at 06:13 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `c_code` varchar(20) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `hobbie` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `fname`, `lname`, `email`, `c_code`, `mobile_no`, `addr`, `gender`, `hobbie`, `photo`, `date`) VALUES
(1, 'prins', 'Patel ', 'p@gmail.com', '+91', '6633225511', 'siddhpur', 'Male', 'Dance, Painting, Photography', 'user1.jpg', '2024-10-06 04:54:09'),
(11, 'jeetesh', 'prajapti', 'jeetu@gmail.com', '+86', '8855447711', 'siddhpur,patan', 'Male', 'Dance, Shopping', 'image_3.jpg', '2024-10-06 06:04:54'),
(13, 'mahesh', 'modh', 'mahesh@gmail.com', '+91', '8574548754', 'rajkot,gujrat', 'Male', 'Shopping, Painting', 'user2.png', '2024-10-06 06:09:29'),
(7, 'meet', 'patel', 'meet@gmail.com', '+1', '8574584524', 'mehsana,gujrat', 'Male', 'Painting, Photography', 'user3.png', '2024-10-06 06:00:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
