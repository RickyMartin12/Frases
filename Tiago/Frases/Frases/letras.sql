-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Ago-2015 às 19:16
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `letras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ortografia`
--

CREATE TABLE IF NOT EXISTS `ortografia` (
  `ID` int(11) NOT NULL,
  `NomeOrtografia` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ortografia`
--

INSERT INTO `ortografia` (`ID`, `NomeOrtografia`) VALUES
(1, 'O gato brinca com a la'),
(2, 'O peixe morreu'),
(3, 'Feijoes Elatados'),
(4, 'Caes de guarda'),
(5, 'Casar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavra`
--

CREATE TABLE IF NOT EXISTS `palavra` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Tipo` varchar(32) NOT NULL,
  `OrtografiaID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `OrtografiaID` (`OrtografiaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `palavra`
--

INSERT INTO `palavra` (`ID`, `Nome`, `Tipo`, `OrtografiaID`) VALUES
(1, 'O gato brinca com a la', 'Substantivo', 1),
(2, 'O peixe morreu', 'Substantivo', 2),
(3, 'Feijoes Elatados', 'Substantivo', 3),
(4, 'Caes de guarda', 'Substantivo', 4),
(5, 'Cazar', 'Verbo', 5),
(6, 'Casar', 'Verbo', 5);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `palavra`
--
ALTER TABLE `palavra`
  ADD CONSTRAINT `palavra_ibfk_1` FOREIGN KEY (`OrtografiaID`) REFERENCES `ortografia` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
