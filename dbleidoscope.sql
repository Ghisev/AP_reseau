-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 oct. 2024 à 01:20
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbleidoscope`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdm` int NOT NULL AUTO_INCREMENT,
  `identifiantAdm` varchar(50) NOT NULL,
  `mdpAdm` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdm`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdm`, `identifiantAdm`, `mdpAdm`) VALUES
(2, 'Test', '0cbc6611f5540bd0809a388dc95a615b'),
(3, 'PATATE', '44761c28464362b266abd2a0a767cf69');

-- --------------------------------------------------------

--
-- Structure de la table `medoc`
--

DROP TABLE IF EXISTS `medoc`;
CREATE TABLE IF NOT EXISTS `medoc` (
  `idMedoc` int NOT NULL AUTO_INCREMENT,
  `libelleMedoc` varchar(50) NOT NULL,
  PRIMARY KEY (`idMedoc`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `medoc`
--

INSERT INTO `medoc` (`idMedoc`, `libelleMedoc`) VALUES
(1, 'Doliprane'),
(2, 'Viagra');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `idPatient` int NOT NULL AUTO_INCREMENT,
  `identifiantPt` varchar(50) NOT NULL,
  `mdpPt` varchar(50) NOT NULL,
  `nomPt` varchar(50) NOT NULL,
  `prenomPt` varchar(50) NOT NULL,
  PRIMARY KEY (`idPatient`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`idPatient`, `identifiantPt`, `mdpPt`, `nomPt`, `prenomPt`) VALUES
(2, 'KAKkikou', 'dcaff52adabba4d73fb96e381cdf45a9', 'KAKOU', 'kikou');

-- --------------------------------------------------------

--
-- Structure de la table `prescrire`
--

DROP TABLE IF EXISTS `prescrire`;
CREATE TABLE IF NOT EXISTS `prescrire` (
  `idPatientPrsc` int NOT NULL,
  `idMedocPrsc` int NOT NULL,
  `qteMed` int NOT NULL,
  PRIMARY KEY (`idPatientPrsc`,`idMedocPrsc`,`qteMed`),
  KEY `FK2` (`idMedocPrsc`),
  KEY `qteMed` (`qteMed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prescrire`
--

INSERT INTO `prescrire` (`idPatientPrsc`, `idMedocPrsc`, `qteMed`) VALUES
(2, 1, 2),
(2, 1, 5),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

DROP TABLE IF EXISTS `quantite`;
CREATE TABLE IF NOT EXISTS `quantite` (
  `qteMed` int NOT NULL AUTO_INCREMENT,
  `libelleQte` varchar(30) NOT NULL,
  PRIMARY KEY (`qteMed`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quantite`
--

INSERT INTO `quantite` (`qteMed`, `libelleQte`) VALUES
(1, 'Matin'),
(2, 'Midi'),
(3, 'Soir'),
(4, 'Matin-Midi'),
(5, 'Matin-Soir'),
(6, 'Midi-Soir'),
(7, 'Matin-Midi-Soir');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
