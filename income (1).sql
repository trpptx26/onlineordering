-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 02:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `basic_rate` bigint(255) NOT NULL,
  `basic_hours` bigint(255) NOT NULL,
  `honorarium_rate` bigint(255) NOT NULL,
  `honorarium_hours` bigint(255) NOT NULL,
  `other_rate` bigint(255) NOT NULL,
  `other_hours` bigint(255) NOT NULL,
  `sss_loan` bigint(255) NOT NULL,
  `pagibig_loan` bigint(255) NOT NULL,
  `faculty_savings_deposit` bigint(255) NOT NULL,
  `faculty_savings_loan` bigint(255) NOT NULL,
  `salary_loan` bigint(255) NOT NULL,
  `other_loans` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
