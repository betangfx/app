-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 04:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_modul`
--

CREATE TABLE `app_modul` (
  `ModulID` int(11) NOT NULL,
  `GroupModul` int(11) DEFAULT NULL,
  `Modul` varchar(50) NOT NULL,
  `Menu` varchar(50) DEFAULT NULL,
  `Link` varchar(255) NOT NULL,
  `Lokasi` varchar(255) NOT NULL,
  `Urutan` int(11) DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_modul`
--

INSERT INTO `app_modul` (`ModulID`, `GroupModul`, `Modul`, `Menu`, `Link`, `Lokasi`, `Urutan`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`, `StatusID`) VALUES
(6, 2, 'Members', 'Members', 'index.php?page=members', '/setting/members', 2, 1, '2021-02-14 14:11:00', NULL, NULL, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_modul`
--
ALTER TABLE `app_modul`
  ADD PRIMARY KEY (`ModulID`),
  ADD UNIQUE KEY `Link` (`Link`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_modul`
--
ALTER TABLE `app_modul`
  MODIFY `ModulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
