-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 07:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtainventory`
--
CREATE DATABASE IF NOT EXISTS `dtainventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dtainventory`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `ID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`ID`, `username`, `password`) VALUES
(1, 'Sefudin', '628631f07321b22d8c176c200c855e1b'),
(2, 'ict', '628631f07321b22d8c176c200c855e1b');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `ProdCode` int(12) NOT NULL,
  `ProdName` varchar(30) NOT NULL,
  `ProdDesc` varchar(100) NOT NULL,
  `Category` varchar(25) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `UnitPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`ProdCode`, `ProdName`, `ProdDesc`, `Category`, `Quantity`, `UnitPrice`) VALUES
(5, 'dddd', 'wwww', 'Auto Equipment', 99, 3400),
(44, 'dfdf', 'cx', 'Automotive', 44, 33),
(101, 'gfdgf', 'hhh', 'OtherEqupmnt', 67, 777),
(222, 'eee', 'dell', 'AutoEqupmnt', 44, 34),
(333, 'Computer', 'Toshiba', 'AutoEqupmnt', 3, 35),
(7777, 'hhh', 'hh', 'ManufEqupmnt', 89, 778),
(7798, 'GHH', 'UND', 'Manuf Equpmnt', 44, 555),
(377777, 'www', 'dcdcdc', 'ManufEqupmnt', 99, 343);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`ProdCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
