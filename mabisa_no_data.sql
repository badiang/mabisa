-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 01:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mabisa_no_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `keyctr` int(11) NOT NULL,
  `id` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `date_expired` date DEFAULT NULL,
  `account_type` text DEFAULT NULL,
  `country_code` text DEFAULT NULL,
  `region_code` text DEFAULT NULL,
  `province_code` text DEFAULT NULL,
  `city_code` text DEFAULT NULL,
  `barangay_code` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `verify` tinyint(1) DEFAULT 0,
  `mobile` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`keyctr`, `id`, `username`, `password`, `date`, `time`, `year`, `date_expired`, `account_type`, `country_code`, `region_code`, `province_code`, `city_code`, `barangay_code`, `email`, `token`, `verify`, `mobile`) VALUES
(5, '1', 'Admin', '@Admin!1', NULL, NULL, NULL, NULL, '00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(6, '20246', 'Makawa', '@Makawa!1', '2024-03-08', '13:27:06', '2024', NULL, '01', '101', '1001', '10001', '100001', '1000001', 'jcdave666@gmail.com', NULL, 0, '+639984439396'),
(7, '20247', 'Maular', '@Maular!1', '2024-03-08', '13:27:31', '2024', NULL, '01', '101', '1001', '10001', '100001', '1000005', 'jcdave666@gmail.com', NULL, 0, '+639984439396'),
(8, '20248', 'Tugaya', '@Tugaya!1', '2024-03-09', '11:21:57', '2024', NULL, '01', '101', '1001', '10001', '100001', '1000006', 'glencilariesga09@gmail.com', NULL, 0, '+639391653389');

-- --------------------------------------------------------

--
-- Table structure for table `area_assessment_points`
--

CREATE TABLE `area_assessment_points` (
  `keyctr` bigint(20) NOT NULL,
  `area_number` int(11) DEFAULT NULL,
  `under_area` int(11) DEFAULT NULL,
  `area_points` int(10) DEFAULT 0,
  `user_id` text DEFAULT NULL,
  `year_` year(4) DEFAULT NULL,
  `date_` date DEFAULT NULL,
  `time_` time DEFAULT NULL,
  `trail` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `approved` int(1) NOT NULL DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area_assessment_points`
--

INSERT INTO `area_assessment_points` (`keyctr`, `area_number`, `under_area`, `area_points`, `user_id`, `year_`, `date_`, `time_`, `trail`, `remarks`, `approved`, `noti_me`) VALUES
(31, 1, 1, 0, '20246', '2024', '2024-03-11', '00:12:58', '1 2024-03-11 00:12:58', 'GOODS', 1, 1),
(32, 1, 2, 0, '20246', '2024', '2024-03-10', '22:39:57', '1 2024-03-10 22:39:57', 'GOODS', 1, 1),
(33, 1, 3, 0, '20246', '2024', '2024-03-10', '22:39:58', '1 2024-03-10 22:39:58', 'GOODS', 1, 1),
(34, 1, 4, 0, '20246', '2024', '2024-03-10', '22:39:59', '1 2024-03-10 22:39:59', 'GOODS', 1, 1),
(35, 1, 5, 0, '20246', '2024', '2024-03-10', '22:40:01', '1 2024-03-10 22:40:01', 'GOODS', 1, 1),
(36, 6, 3, 0, '20246', '2024', '2024-03-10', '22:40:46', '1 2024-03-10 22:40:46', 'GOODS', 1, 1),
(37, 6, 2, 0, '20246', '2024', '2024-03-10', '22:40:45', '1 2024-03-10 22:40:45', 'GOODS', 1, 1),
(38, 6, 1, 0, '20246', '2024', '2024-03-10', '22:40:43', '1 2024-03-10 22:40:43', 'GOODS', 1, 1),
(39, 5, 3, 0, '20246', '2024', '2024-03-10', '22:40:42', '1 2024-03-10 22:40:42', 'GOODS', 1, 1),
(40, 5, 2, 0, '20246', '2024', '2024-03-10', '22:40:40', '1 2024-03-10 22:40:40', 'GOODS', 1, 1),
(41, 5, 1, 0, '20246', '2024', '2024-03-10', '22:40:39', '1 2024-03-10 22:40:39', 'GOODS', 1, 1),
(42, 4, 7, 0, '20246', '2024', '2024-03-10', '22:40:38', '1 2024-03-10 22:40:38', 'GOODS', 1, 1),
(43, 4, 6, 0, '20246', '2024', '2024-03-10', '22:40:37', '1 2024-03-10 22:40:37', 'GOODS', 1, 1),
(44, 4, 5, 0, '20246', '2024', '2024-03-10', '22:40:35', '1 2024-03-10 22:40:35', 'GOODS', 1, 1),
(45, 4, 4, 0, '20246', '2024', '2024-03-10', '22:40:33', '1 2024-03-10 22:40:33', 'GOODS', 1, 1),
(46, 4, 3, 0, '20246', '2024', '2024-03-10', '22:40:30', '1 2024-03-10 22:40:30', 'GOODS', 1, 1),
(47, 4, 2, 0, '20246', '2024', '2024-03-10', '22:40:29', '1 2024-03-10 22:40:29', 'GOODS', 1, 1),
(48, 4, 1, 0, '20246', '2024', '2024-03-10', '22:40:26', '1 2024-03-10 22:40:26', 'GOODS', 1, 1),
(49, 3, 6, 0, '20246', '2024', '2024-03-10', '22:40:22', '1 2024-03-10 22:40:22', 'GOODS', 1, 1),
(50, 3, 5, 0, '20246', '2024', '2024-03-10', '22:40:21', '1 2024-03-10 22:40:21', 'GOODS', 1, 1),
(51, 3, 4, 0, '20246', '2024', '2024-03-10', '22:40:20', '1 2024-03-10 22:40:20', 'GOODS', 1, 1),
(52, 3, 3, 0, '20246', '2024', '2024-03-10', '22:40:18', '1 2024-03-10 22:40:18', 'GOODS', 1, 1),
(53, 3, 2, 0, '20246', '2024', '2024-03-10', '22:40:15', '1 2024-03-10 22:40:15', 'GOODS', 1, 1),
(54, 3, 1, 0, '20246', '2024', '2024-03-10', '22:40:14', '1 2024-03-10 22:40:14', 'GOODS', 1, 1),
(55, 2, 3, 0, '20246', '2024', '2024-03-10', '22:40:12', '1 2024-03-10 22:40:12', 'GOODS', 1, 1),
(56, 2, 2, 0, '20246', '2024', '2024-03-10', '22:40:11', '1 2024-03-10 22:40:11', 'GOODS', 1, 1),
(57, 2, 1, 0, '20246', '2024', '2024-03-10', '22:40:09', '1 2024-03-10 22:40:09', '  GOODS', 1, 1),
(58, 1, 7, 0, '20246', '2024', '2024-03-10', '22:40:06', '1 2024-03-10 22:40:06', 'GOODS', 1, 1),
(59, 1, 6, 0, '20246', '2024', '2024-03-10', '22:40:04', '1 2024-03-10 22:40:04', 'GOODS', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `keyctr` int(11) NOT NULL,
  `id` text DEFAULT NULL,
  `region_code` text DEFAULT NULL,
  `province_code` text DEFAULT NULL,
  `city_code` text DEFAULT NULL,
  `barangay_code` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`keyctr`, `id`, `region_code`, `province_code`, `city_code`, `barangay_code`, `year`, `date_time`, `status`) VALUES
(5, '20246', '1001', '10001', '100001', '1000001', '2024', '2024-03-08 13:28:09', 0),
(6, '20247', '1001', '10001', '100001', '1000005', '2024', '2024-03-11 00:14:41', 0),
(7, '20248', '1001', '10001', '100001', '1000006', '2024', '2024-03-11 19:46:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `keyctr` int(11) NOT NULL,
  `city_code` text DEFAULT NULL,
  `barangay_code` text DEFAULT NULL,
  `barangay_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`keyctr`, `city_code`, `barangay_code`, `barangay_name`) VALUES
(4, '100001', '1000001', 'MAKAWA'),
(5, '100001', '1000005', 'MAULAR'),
(6, '100001', '1000006', 'TUGAYA');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `keyctr` int(11) NOT NULL,
  `province_code` text DEFAULT NULL,
  `city_code` text DEFAULT NULL,
  `city_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`keyctr`, `province_code`, `city_code`, `city_name`) VALUES
(3, '10001', '100001', 'ALORAN');

-- --------------------------------------------------------

--
-- Table structure for table `core11`
--

CREATE TABLE `core11` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 10,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core11`
--

INSERT INTO `core11` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 10, 10, '20246', '2024', 0, 1),
(3, 10, 10, '20247', '2024', 0, 1),
(4, 10, 10, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core12`
--

CREATE TABLE `core12` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core12`
--

INSERT INTO `core12` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', 2024, 0, 1),
(3, 1, 1, '20247', 2024, 0, 1),
(4, 1, 1, '20248', 2024, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core13`
--

CREATE TABLE `core13` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text NOT NULL,
  `year` year(4) NOT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core13`
--

INSERT INTO `core13` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core14`
--

CREATE TABLE `core14` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core14`
--

INSERT INTO `core14` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core15`
--

CREATE TABLE `core15` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core15`
--

INSERT INTO `core15` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core16`
--

CREATE TABLE `core16` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 6,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core16`
--

INSERT INTO `core16` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 6, 6, '20246', '2024', 0, 1),
(3, 6, 6, '20247', '2024', 0, 1),
(4, 6, 6, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core17`
--

CREATE TABLE `core17` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core17`
--

INSERT INTO `core17` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core21`
--

CREATE TABLE `core21` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 5,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core21`
--

INSERT INTO `core21` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 5, 5, '20246', '2024', 0, 1),
(3, 5, 5, '20247', '2024', 0, 1),
(4, 5, 5, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core22`
--

CREATE TABLE `core22` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 3,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core22`
--

INSERT INTO `core22` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 3, 3, '20246', '2024', 0, 1),
(3, 3, 3, '20247', '2024', 0, 1),
(4, 3, 3, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core23`
--

CREATE TABLE `core23` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 2,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core23`
--

INSERT INTO `core23` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 2, 2, '20246', '2024', 0, 1),
(3, 2, 2, '20247', '2024', 0, 1),
(4, 2, 2, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core31`
--

CREATE TABLE `core31` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 6,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core31`
--

INSERT INTO `core31` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 6, 6, '20246', '2024', 0, 1),
(3, 5, 6, '20247', '2024', 0, 1),
(4, 6, 6, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core32`
--

CREATE TABLE `core32` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 3,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core32`
--

INSERT INTO `core32` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 3, 3, '20246', '2024', 0, 1),
(3, 3, 3, '20247', '2024', 0, 1),
(4, 3, 3, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core33`
--

CREATE TABLE `core33` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 5,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core33`
--

INSERT INTO `core33` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 5, 5, '20246', '2024', 0, 1),
(3, 5, 5, '20247', '2024', 0, 1),
(4, 5, 5, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core34`
--

CREATE TABLE `core34` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 2,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core34`
--

INSERT INTO `core34` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 2, 2, '20246', '2024', 0, 1),
(3, 2, 2, '20247', '2024', 0, 1),
(4, 2, 2, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core35`
--

CREATE TABLE `core35` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 2,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core35`
--

INSERT INTO `core35` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 2, 2, '20246', '2024', 0, 1),
(3, 2, 2, '20247', '2024', 0, 1),
(4, 2, 2, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core36`
--

CREATE TABLE `core36` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core36`
--

INSERT INTO `core36` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `keyctr` int(11) NOT NULL,
  `country_code` text DEFAULT NULL,
  `country_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`keyctr`, `country_code`, `country_name`) VALUES
(3, '101', 'PHILIPPINES');

-- --------------------------------------------------------

--
-- Table structure for table `essen11`
--

CREATE TABLE `essen11` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 6,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen11`
--

INSERT INTO `essen11` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 6, 6, '20246', '2024', 0, 1),
(3, 6, 6, '20247', '2024', 0, 1),
(4, 6, 6, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen12`
--

CREATE TABLE `essen12` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 5,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen12`
--

INSERT INTO `essen12` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 5, 5, '20246', '2024', 0, 1),
(3, 5, 5, '20247', '2024', 0, 1),
(4, 5, 5, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen13`
--

CREATE TABLE `essen13` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 4,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen13`
--

INSERT INTO `essen13` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 4, 4, '20246', '2024', 0, 1),
(3, 4, 4, '20247', '2024', 0, 1),
(4, 4, 4, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen14`
--

CREATE TABLE `essen14` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 2,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen14`
--

INSERT INTO `essen14` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 2, 2, '20246', '2024', 0, 1),
(3, 2, 2, '20247', '2024', 0, 1),
(4, 2, 2, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen15`
--

CREATE TABLE `essen15` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 6,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen15`
--

INSERT INTO `essen15` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 6, 6, '20246', '2024', 0, 1),
(3, 6, 6, '20247', '2024', 0, 1),
(4, 6, 6, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen16`
--

CREATE TABLE `essen16` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen16`
--

INSERT INTO `essen16` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen17`
--

CREATE TABLE `essen17` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen17`
--

INSERT INTO `essen17` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen21`
--

CREATE TABLE `essen21` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen21`
--

INSERT INTO `essen21` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen22`
--

CREATE TABLE `essen22` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 2,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen22`
--

INSERT INTO `essen22` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 2, 2, '20246', '2024', 0, 1),
(3, 2, 2, '20247', '2024', 0, 1),
(4, 2, 2, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen23`
--

CREATE TABLE `essen23` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen23`
--

INSERT INTO `essen23` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen31`
--

CREATE TABLE `essen31` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 4,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen31`
--

INSERT INTO `essen31` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 4, 4, '20246', '2024', 0, 1),
(3, 4, 4, '20247', '2024', 0, 1),
(4, 4, 4, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen32`
--

CREATE TABLE `essen32` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 6,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen32`
--

INSERT INTO `essen32` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 6, 6, '20246', '2024', 0, 1),
(3, 6, 6, '20247', '2024', 0, 1),
(4, 6, 6, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essen33`
--

CREATE TABLE `essen33` (
  `keyctr` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `id` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `assessment_points` int(11) DEFAULT 0,
  `noti_me` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essen33`
--

INSERT INTO `essen33` (`keyctr`, `points`, `max`, `id`, `year`, `assessment_points`, `noti_me`) VALUES
(2, 1, 1, '20246', '2024', 0, 1),
(3, 1, 1, '20247', '2024', 0, 1),
(4, 1, 1, '20248', '2024', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `keyctr` int(11) NOT NULL,
  `region_code` text DEFAULT NULL,
  `province_code` text DEFAULT NULL,
  `province_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`keyctr`, `region_code`, `province_code`, `province_name`) VALUES
(3, '1001', '10001', 'MISAMIS OCCIDENTAL');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `keyctr` int(11) NOT NULL,
  `country_code` text DEFAULT NULL,
  `region_code` text DEFAULT NULL,
  `region_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`keyctr`, `country_code`, `region_code`, `region_name`) VALUES
(3, '101', '1001', 'NORTHERN MINDANAO (REGION X)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `area_assessment_points`
--
ALTER TABLE `area_assessment_points`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core11`
--
ALTER TABLE `core11`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core12`
--
ALTER TABLE `core12`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core13`
--
ALTER TABLE `core13`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core14`
--
ALTER TABLE `core14`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core15`
--
ALTER TABLE `core15`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core16`
--
ALTER TABLE `core16`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core17`
--
ALTER TABLE `core17`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core21`
--
ALTER TABLE `core21`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core22`
--
ALTER TABLE `core22`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core23`
--
ALTER TABLE `core23`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core31`
--
ALTER TABLE `core31`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core32`
--
ALTER TABLE `core32`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core33`
--
ALTER TABLE `core33`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core34`
--
ALTER TABLE `core34`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core35`
--
ALTER TABLE `core35`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `core36`
--
ALTER TABLE `core36`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen11`
--
ALTER TABLE `essen11`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen12`
--
ALTER TABLE `essen12`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen13`
--
ALTER TABLE `essen13`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen14`
--
ALTER TABLE `essen14`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen15`
--
ALTER TABLE `essen15`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen16`
--
ALTER TABLE `essen16`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen17`
--
ALTER TABLE `essen17`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen21`
--
ALTER TABLE `essen21`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen22`
--
ALTER TABLE `essen22`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen23`
--
ALTER TABLE `essen23`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen31`
--
ALTER TABLE `essen31`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen32`
--
ALTER TABLE `essen32`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `essen33`
--
ALTER TABLE `essen33`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`keyctr`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`keyctr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `area_assessment_points`
--
ALTER TABLE `area_assessment_points`
  MODIFY `keyctr` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core11`
--
ALTER TABLE `core11`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core12`
--
ALTER TABLE `core12`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core13`
--
ALTER TABLE `core13`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core14`
--
ALTER TABLE `core14`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core15`
--
ALTER TABLE `core15`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core16`
--
ALTER TABLE `core16`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core17`
--
ALTER TABLE `core17`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core21`
--
ALTER TABLE `core21`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core22`
--
ALTER TABLE `core22`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core23`
--
ALTER TABLE `core23`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core31`
--
ALTER TABLE `core31`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core32`
--
ALTER TABLE `core32`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core33`
--
ALTER TABLE `core33`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core34`
--
ALTER TABLE `core34`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core35`
--
ALTER TABLE `core35`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core36`
--
ALTER TABLE `core36`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `essen11`
--
ALTER TABLE `essen11`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen12`
--
ALTER TABLE `essen12`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen13`
--
ALTER TABLE `essen13`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen14`
--
ALTER TABLE `essen14`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen15`
--
ALTER TABLE `essen15`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen16`
--
ALTER TABLE `essen16`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen17`
--
ALTER TABLE `essen17`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen21`
--
ALTER TABLE `essen21`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen22`
--
ALTER TABLE `essen22`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen23`
--
ALTER TABLE `essen23`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen31`
--
ALTER TABLE `essen31`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen32`
--
ALTER TABLE `essen32`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essen33`
--
ALTER TABLE `essen33`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `keyctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
