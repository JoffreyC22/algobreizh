-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Février 2016 à 12:11
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `algobreizh`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `codeArticle` varchar(25) NOT NULL,
  `libelleArticle` varchar(250) NOT NULL,
  `image` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `unite` varchar(50) NOT NULL,
  `TVA` float NOT NULL,
  `idFamille` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `codeArticle`, `libelleArticle`, `image`, `prix`, `unite`, `TVA`, `idFamille`) VALUES
(1, 'AR00001', 'Wakamé biologique feuilles 50 g', 'wakame-paillette.jpg', 4.33, 'Sachet 50 g', 20, 1),
(2, 'AR00002', 'Wakamé feuilles longues 200 g', 'wakame_feuille.jpg', 10.92, 'Sachet 200 g', 20, 1),
(3, 'AR00003', 'Dulse biologique feuilles 50 g', 'chrondus-crispus.jpg', 3.63, 'Sachet 50 g', 20, 2),
(4, 'AR00004', 'Dulse biologique 200 g', 'nori-paillette.jpeg', 10.42, 'Sachet 200 g', 20, 2),
(5, 'AR00005', 'Kombu Royal - Jeunes pousses biologiques feuilles 50 g', 'laitue-de-mer-feuilles.jpeg', 4.71, 'Sachet 50 g', 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL,
  `dateCommande` datetime NOT NULL,
  `codeClient` varchar(25) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `codeClient` (`codeClient`),
  KEY `FK_commandes_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`idCommande`, `montant`, `dateCommande`, `codeClient`, `valide`, `idUtilisateur`) VALUES
(15, 67.12, '2016-02-10 10:14:31', 'CL00001', 1, 1),
(16, 33.91, '2016-02-10 10:15:08', 'CL00001', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `idDetail` int(11) NOT NULL AUTO_INCREMENT,
  `codeArticle` varchar(10) NOT NULL,
  `libelleArticle` varchar(255) NOT NULL,
  `qteArticle` int(11) NOT NULL,
  `montant` float NOT NULL,
  `idCommande` int(11) NOT NULL,
  PRIMARY KEY (`idDetail`),
  KEY `FK_details_idCommande` (`idCommande`),
  KEY `codeArticle` (`codeArticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `details`
--

INSERT INTO `details` (`idDetail`, `codeArticle`, `libelleArticle`, `qteArticle`, `montant`, `idCommande`) VALUES
(18, 'AR00001', 'Wakamé biologique feuilles 50 g', 2, 8.66, 15),
(19, 'AR00002', 'Wakamé feuilles longues 200 g', 3, 32.76, 15),
(20, 'AR00003', 'Dulse biologique feuilles 50 g', 4, 14.52, 15),
(21, 'AR00005', 'Kombu Royal - Jeunes pousses biologiques feuilles 50 g', 6, 28.26, 16);

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

CREATE TABLE IF NOT EXISTS `familles` (
  `idFamille` int(11) NOT NULL AUTO_INCREMENT,
  `libelleFamille` varchar(250) NOT NULL,
  `codeFamille` varchar(25) NOT NULL,
  PRIMARY KEY (`idFamille`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `familles`
--

INSERT INTO `familles` (`idFamille`, `libelleFamille`, `codeFamille`) VALUES
(1, 'Algues séchées  longues', 'FAR00001'),
(2, 'Algues séchées  morceaux', 'FAR00002'),
(3, 'Algues en conserve', 'FAR00003'),
(4, 'Algues en conserve entières', 'FAR00004'),
(5, 'Algues en poudre', 'FAR00005'),
(6, 'Préparations culinaires', 'FAR00006'),
(7, 'Pâtes  aux algues', 'FAR00007'),
(8, 'Notices et recettes', 'FAR00008');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `codeClient` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `codePostal` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `motDePasse` varchar(250) NOT NULL,
  `teleprospecteur` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `codeClient` (`codeClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `codeClient`, `email`, `nom`, `prenom`, `ville`, `codePostal`, `adresse`, `telephone`, `motDePasse`, `teleprospecteur`) VALUES
(1, 'CL00001', '', 'Super U Landivisiau', '', 'LANDIVISIAU', '29400', '3 rue des Abers', '', 'pupute', 0),
(2, 'CL00002', '', 'Cora Ploufragan', '', 'PLOUFRAGAN', '22400', 'Zone commerciale de l''Arvor', '', '', 0),
(3, 'CL00003', '', 'Scarabée  Rennes Ouest', '', 'RENNES', '35000', '10, route de Lorient', '', '', 0),
(4, 'CL00004', '', 'La Belle-Iloise Rennes', '', 'RENNES', '35000', '16, rue Hoche', '', '', 0),
(5, 'CO00001', 'g.kermarec@algobreizh.com', 'KERMAREC', 'Gwen', '', '', '', '0607080910', '3f9de1a18a861069a75a88b1c0f3a1e3adac3e52', 1),
(6, 'CO00002', 'e.lefebure@algobreizh.com', 'LEFEBURE', 'Estelle', '', '', '', '0612345678', 'yo', 1),
(7, 'CO00003', 'g.decarantec@algobreizh.c', 'DE CARANTEC', 'Georges', '', '', '', '065457687', '', 1),
(8, 'CO00004', 'y.keradoc@algobreizh.com', 'KERADOC', 'Yannick', '', '', '', '0601020304', '', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_commandes_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `FK_details_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`idCommande`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
