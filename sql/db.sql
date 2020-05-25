-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 04:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podskalco`
--

-- --------------------------------------------------------

--
-- Table structure for table `igralci`
--

CREATE TABLE `igralci` (
  `PID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `GSM` varchar(9) DEFAULT NULL,
  `SPOL` char(1) DEFAULT NULL,
  `PREDZNANJE` int(11) NOT NULL,
  `PRIDRUŽITEV` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igralci`
--

INSERT INTO `igralci` (`PID`, `USERNAME`, `PASSWORD`, `GSM`, `SPOL`, `PREDZNANJE`, `PRIDRUŽITEV`) VALUES
(1, 'Admin', 'eed7de5c', '41330612', 'M', 1, '0000-00-00 00:00:00'),
(2, 'Martin', 'eed7de5c', '41330612', 'M', 2, '0000-00-00 00:00:00'),
(3, 'Megi', 'ca985bfc', '041330612', 'Ž', 1, '0000-00-00 00:00:00'),
(5, 'SuperBadminton', 'accf8b33', '04133012', 'M', 1, '2020-05-19 18:10:06'),
(8, 'User1', '7e9a4030', '555413222', 'Ž', 1, '2020-05-20 14:30:01'),
(9, 'User15', '219a402c', '421442112', 'M', 3, '2020-05-20 14:54:05'),
(10, 'Megi1', 'eed7de5c', '04133012', 'Ž', 2, '2020-05-20 14:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `igrisca`
--

CREATE TABLE `igrisca` (
  `FID` int(11) NOT NULL,
  `NAZIV` varchar(30) NOT NULL,
  `OPIS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igrisca`
--

INSERT INTO `igrisca` (`FID`, `NAZIV`, `OPIS`) VALUES
(1, 'Žogica', 'Igrišče Žogica je pravokotno in označeno s črtami debeline 40 mm, na sredini pa ga ločuje mreža, ki je visoka 152 cm v sredini igrišča in 155 cm nad stranskimi črtami za igro dvojic. Pri igri posameznikov igrišče omejujeta notranji stranski črti in zadnja mejna črta, pri dvojicah pa zunanji stranski črti in zadnja mejna črta. Pri servisu je zadnja servisna črta pri dvojicah bližje prednji servisni črti, kot pri igri posameznikov.'),
(2, 'Loparček', 'Igrišče Loparček je pravokotno in označeno s črtami debeline 40 mm, na sredini pa ga ločuje mreža, ki je visoka 152 cm v sredini igrišča in 155 cm nad stranskimi črtami za igro dvojic. Pri igri posameznikov igrišče omejujeta notranji stranski črti in zadnja mejna črta, pri dvojicah pa zunanji stranski črti in zadnja mejna črta. Pri servisu je zadnja servisna črta pri dvojicah bližje prednji servisni črti, kot pri igri posameznikov.'),
(3, 'Arehek', 'Igrišče Arehek je pravokotno in označeno s črtami debeline 40 mm, na sredini pa ga ločuje mreža, ki je visoka 152 cm v sredini igrišča in 155 cm nad stranskimi črtami za igro dvojic. Pri igri posameznikov igrišče omejujeta notranji stranski črti in zadnja mejna črta, pri dvojicah pa zunanji stranski črti in zadnja mejna črta. Pri servisu je zadnja servisna črta pri dvojicah bližje prednji servisni črti, kot pri igri posameznikov.');

-- --------------------------------------------------------

--
-- Table structure for table `tekme`
--

CREATE TABLE `tekme` (
  `MID` int(11) NOT NULL,
  `NAZIV` varchar(30) NOT NULL,
  `FID` int(11) NOT NULL,
  `ORGANIZATOR` int(11) NOT NULL,
  `URA` int(11) NOT NULL,
  `DATUM` varchar(10) NOT NULL,
  `OPISTEKME` text NOT NULL,
  `LIKES` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igralci`
--
ALTER TABLE `igralci`
  ADD PRIMARY KEY (`PID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `igrisca`
--
ALTER TABLE `igrisca`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `tekme`
--
ALTER TABLE `tekme`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `Organizator` (`ORGANIZATOR`),
  ADD KEY `FID` (`FID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igralci`
--
ALTER TABLE `igralci`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `igrisca`
--
ALTER TABLE `igrisca`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tekme`
--
ALTER TABLE `tekme`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tekme`
--
ALTER TABLE `tekme`
  ADD CONSTRAINT `FID` FOREIGN KEY (`FID`) REFERENCES `igrisca` (`FID`),
  ADD CONSTRAINT `Organizator` FOREIGN KEY (`ORGANIZATOR`) REFERENCES `igralci` (`PID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
