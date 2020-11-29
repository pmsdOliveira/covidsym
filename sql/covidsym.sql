-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Nov-2020 às 23:55
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `covidsym`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `PhoneNumber` (`PhoneNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `analyst`
--

DROP TABLE IF EXISTS `analyst`;
CREATE TABLE IF NOT EXISTS `analyst` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `PhoneNumber` (`PhoneNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `DecisionNotes` varchar(500) NOT NULL,
  `Prescription` varchar(50) NOT NULL,
  `UserID` int(11) NOT NULL,
  `MedicID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`),
  KEY `MedicID` (`MedicID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medic`
--

DROP TABLE IF EXISTS `medic`;
CREATE TABLE IF NOT EXISTS `medic` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `PhoneNumber` (`PhoneNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `riskfactors`
--

DROP TABLE IF EXISTS `riskfactors`;
CREATE TABLE IF NOT EXISTS `riskfactors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(200) NOT NULL,
  `Severity` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `symptoms`
--

DROP TABLE IF EXISTS `symptoms`;
CREATE TABLE IF NOT EXISTS `symptoms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(200) NOT NULL,
  `Severity` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Local` varchar(50) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birthdate` date NOT NULL,
  `FiscalNumber` varchar(20) NOT NULL,
  `HealthCareNumber` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `FiscalNumber` (`FiscalNumber`),
  UNIQUE KEY `HealthCareNumber` (`HealthCareNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userriskfactors`
--

DROP TABLE IF EXISTS `userriskfactors`;
CREATE TABLE IF NOT EXISTS `userriskfactors` (
  `UserID` int(11) NOT NULL,
  `RiskFactorID` int(11) NOT NULL,
  KEY `UserID` (`UserID`),
  KEY `RiskFactorID` (`RiskFactorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersymptoms`
--

DROP TABLE IF EXISTS `usersymptoms`;
CREATE TABLE IF NOT EXISTS `usersymptoms` (
  `UserID` int(11) NOT NULL,
  `SymptomsID` int(11) NOT NULL,
  KEY `UserID` (`UserID`),
  KEY `SymptomsID` (`SymptomsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`MedicID`) REFERENCES `medic` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `userriskfactors`
--
ALTER TABLE `userriskfactors`
  ADD CONSTRAINT `userriskfactors_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userriskfactors_ibfk_2` FOREIGN KEY (`RiskFactorID`) REFERENCES `riskfactors` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usersymptoms`
--
ALTER TABLE `usersymptoms`
  ADD CONSTRAINT `usersymptoms_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usersymptoms_ibfk_2` FOREIGN KEY (`SymptomsID`) REFERENCES `symptoms` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
