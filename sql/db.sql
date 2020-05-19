-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2020 at 04:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PodSkalco`
--

-- --------------------------------------------------------

--
-- Table structure for table `Igralci`
--

CREATE TABLE `Igralci` (
  `PID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `PREDZNANJE` int(11) NOT NULL,
  `PRIDRUŽITEV` datetime NOT NULL DEFAULT current_timestamp(),
  `GSM` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Igralci`
--

INSERT INTO `Igralci` (`PID`, `USERNAME`, `PASSWORD`, `PREDZNANJE`, `PRIDRUŽITEV`, `GSM`) VALUES
(1, 'Admin', 'password1', 1, '0000-00-00 00:00:00', '041330612'),
(2, 'Martin', 'foo', 2, '0000-00-00 00:00:00', '041556128'),
(3, 'Megi', 'ca985bfc', 1, '0000-00-00 00:00:00', '031267987');

-- --------------------------------------------------------

--
-- Table structure for table `Igrisca`
--

CREATE TABLE `Igrisca` (
  `FID` int(11) NOT NULL,
  `NAZIV` varchar(30) NOT NULL,
  `OPIS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Igrisca`
--

INSERT INTO `Igrisca` (`FID`, `NAZIV`, `OPIS`) VALUES
(1, 'Žogica', 'Igrišče Žogica je pravokotno in označeno s črtami debeline 40 mm, na sredini pa ga ločuje mreža, ki je visoka 152 cm v sredini igrišča in 155 cm nad stranskimi črtami za igro dvojic. Pri igri posameznikov igrišče omejujeta notranji stranski črti in zadnja mejna črta, pri dvojicah pa zunanji stranski črti in zadnja mejna črta. Pri servisu je zadnja servisna črta pri dvojicah bližje prednji servisni črti, kot pri igri posameznikov.'),
(2, 'Loparček', 'Igrišče Loparček je pravokotno in označeno s črtami debeline 40 mm, na sredini pa ga ločuje mreža, ki je visoka 152 cm v sredini igrišča in 155 cm nad stranskimi črtami za igro dvojic. Pri igri posameznikov igrišče omejujeta notranji stranski črti in zadnja mejna črta, pri dvojicah pa zunanji stranski črti in zadnja mejna črta. Pri servisu je zadnja servisna črta pri dvojicah bližje prednji servisni črti, kot pri igri posameznikov.'),
(3, 'Arehek', 'Igrišče Arehek je pravokotno in označeno s črtami debeline 40 mm, na sredini pa ga ločuje mreža, ki je visoka 152 cm v sredini igrišča in 155 cm nad stranskimi črtami za igro dvojic. Pri igri posameznikov igrišče omejujeta notranji stranski črti in zadnja mejna črta, pri dvojicah pa zunanji stranski črti in zadnja mejna črta. Pri servisu je zadnja servisna črta pri dvojicah bližje prednji servisni črti, kot pri igri posameznikov.');

-- --------------------------------------------------------

--
-- Table structure for table `Tekme`
--

CREATE TABLE `Tekme` (
  `MID` int(11) NOT NULL,
  `FID` int(11) NOT NULL,
  `ORGANIZATOR` int(11) NOT NULL,
  `URA` int(11) NOT NULL,
  `DATUM` varchar(10) NOT NULL,
  `OPISTEKME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Igralci`
--
ALTER TABLE `Igralci`
  ADD PRIMARY KEY (`PID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `Igrisca`
--
ALTER TABLE `Igrisca`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `Tekme`
--
ALTER TABLE `Tekme`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `Organizator` (`ORGANIZATOR`),
  ADD KEY `FID` (`FID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Igralci`
--
ALTER TABLE `Igralci`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Igrisca`
--
ALTER TABLE `Igrisca`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Tekme`
--
ALTER TABLE `Tekme`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Tekme`
--
ALTER TABLE `Tekme`
  ADD CONSTRAINT `FID` FOREIGN KEY (`FID`) REFERENCES `Igrisca` (`FID`),
  ADD CONSTRAINT `Organizator` FOREIGN KEY (`ORGANIZATOR`) REFERENCES `Igralci` (`PID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
