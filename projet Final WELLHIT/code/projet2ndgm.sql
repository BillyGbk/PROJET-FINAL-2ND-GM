-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 juil. 2019 à 11:06
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet2ndgm`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `descriptionCommentaire` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `COMMENTAIRE_utilisateur_FK` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `descriptionCommentaire`, `idUtilisateur`) VALUES
(3, 'CECI EST UN TEST 2 ', 2),
(4, 'CECI EST UN TEST 2 ', 2),
(5, 'CECI EST UN TEST 2 ', 2),
(7, 'Commentaire modifié encore une 3eme fois', 2);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idImage`),
  UNIQUE KEY `IMAGE_utilisateur_AK` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`idImage`, `source`, `idUtilisateur`) VALUES
(20, ' test src5', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

DROP TABLE IF EXISTS `sondage`;
CREATE TABLE IF NOT EXISTS `sondage` (
  `idSondage` int(11) NOT NULL AUTO_INCREMENT,
  `noteSondage` int(11) NOT NULL,
  `descSondage` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idSondage`),
  UNIQUE KEY `SONDAGE_utilisateur_AK` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `idTheme` int(11) NOT NULL AUTO_INCREMENT,
  `descriptionTheme` varchar(50) NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`idTheme`, `descriptionTheme`) VALUES
(1, 'classique'),
(2, 'bleu'),
(3, 'marron'),
(4, 'dark'),
(5, 'ceci est un theme modifie'),
(7, 'CECI EST UN TEST modifie2 ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(50) NOT NULL,
  `prenomUtilisateur` varchar(50) NOT NULL,
  `dateUtilisateur` date NOT NULL,
  `pseudoUtilisateur` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `idTheme` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `utilisateur_theme_FK` (`idTheme`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `dateUtilisateur`, `pseudoUtilisateur`, `motDePasse`, `idTheme`) VALUES
(1, 'patrick', 'patrick', '2019-01-08', 'PAPI MODIF 2 ', '1234', 1),
(2, 'billel', 'billel', '2019-01-06', 'billel', '1234', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `COMMENTAIRE_utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `IMAGE_utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD CONSTRAINT `SONDAGE_utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_theme_FK` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
