-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2023 at 11:54 AM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ki12001220_ashtarplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `Finances`
--

CREATE TABLE `Finances` (
  `PlayerID` int(11) DEFAULT NULL,
  `SHTAR` decimal(10,2) DEFAULT NULL,
  `MÜNE` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `PlayerID` int(11) DEFAULT NULL,
  `ItemID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `ItemID` varchar(255) NOT NULL,
  `ItemImagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE `Player` (
  `PlayerID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `CryptoWalletAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`PlayerID`, `Username`, `Password`, `Email`, `CryptoWalletAddress`) VALUES
(1, 'AJBLAk', 'Starseed00', 'Adriantraynum20@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Stats`
--

CREATE TABLE `Stats` (
  `PlayerID` int(11) DEFAULT NULL,
  `HealthPoints` int(11) DEFAULT NULL,
  `MagicPoints` int(11) DEFAULT NULL,
  `ShieldPoints` int(11) DEFAULT NULL,
  `AttackPoints` int(11) DEFAULT NULL,
  `TechPoints` int(11) DEFAULT NULL,
  `ExperienceLevel` int(11) DEFAULT NULL,
  `PlayerLevel` int(11) DEFAULT NULL,
  `Clout` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Finances`
--
ALTER TABLE `Finances`
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`PlayerID`);

--
-- Indexes for table `Stats`
--
ALTER TABLE `Stats`
  ADD KEY `PlayerID` (`PlayerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Player`
--
ALTER TABLE `Player`
  MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Finances`
--
ALTER TABLE `Finances`
  ADD CONSTRAINT `Finances_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `Player` (`PlayerID`);

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `Player` (`PlayerID`),
  ADD CONSTRAINT `Inventory_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `Item` (`ItemID`);

--
-- Constraints for table `Stats`
--
ALTER TABLE `Stats`
  ADD CONSTRAINT `Stats_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `Player` (`PlayerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
