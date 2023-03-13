-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 10:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatree`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintree`
--

CREATE TABLE `admintree` (
  `adminid` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintree`
--

INSERT INTO `admintree` (`adminid`, `Email`, `Password`) VALUES
(1, 'admintree', 'tree1234'),
(2, 'treemanage', 'manage1234'),
(3, 'systemtree', 'system1234');

-- --------------------------------------------------------

--
-- Table structure for table `catetree`
--

CREATE TABLE `catetree` (
  `cateid` int(11) NOT NULL,
  `catename` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catetree`
--

INSERT INTO `catetree` (`cateid`, `catename`, `image`) VALUES
(3, 'ไม้ไทยพื้นเมือง', 'image/c1.JPG'),
(5, 'ไม้ด่างชมพู่', 'image/c4.JPG'),
(6, 'ไม้ชมพู', 'image/l7.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

CREATE TABLE `tree` (
  `treeid` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `treename` text NOT NULL,
  `namesi` text NOT NULL,
  `aong` text NOT NULL,
  `nature` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tree`
--

INSERT INTO `tree` (`treeid`, `cateid`, `treename`, `namesi`, `aong`, `nature`, `image`) VALUES
(10, 5, 'ด่างพู่', 'Dang Pru', 'Pru', 'ลายด่างไม้ด่างต่อมามีชื่อว่าบอนกระดาด หรือหูช้างที่จะเป็นไม้ล้มลุก ใต้ดินมีหัวและเติบโตขึ้นมาเป็นกอ ต้นสามารถสูงได้ประมาณ 2 เมตร ลำต้นสั้นตั้งตรงใบจะเป็นใบเลี้ยงเดี่ยวที่สลับเวียน รูปไข่แกมรูปหัวใจ ซึ่งความกว้างจะอยู่ที่', 'image/l4.JPG'),
(12, 5, 'ด่างลายขาว', 'dang white', 'Thai', 'ด่างขาว', 'image/l5.JPG'),
(13, 5, 'ด่างเขียว', 'Dang', 'Thai', 'เขียว', 'image/l6.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintree`
--
ALTER TABLE `admintree`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `catetree`
--
ALTER TABLE `catetree`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`treeid`),
  ADD KEY `cateid` (`cateid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintree`
--
ALTER TABLE `admintree`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catetree`
--
ALTER TABLE `catetree`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tree`
--
ALTER TABLE `tree`
  MODIFY `treeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
