-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Client :  devbdd.iutmetz.univ-lorraine.fr
-- Généré le :  Mer 18 Mai 2022 à 23:45
-- Version du serveur :  10.3.34-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gamard3u_bdd_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `src` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Item`
--

INSERT INTO `Item` (`src`, `prix`, `nom`) VALUES
('../public/image/Bombe-B61.jpg', 1000, 'BOMBA'),
('../public/image/china.jpg', 2, 'Ping'),
('../public/image/guns1.jpg', 50, 'Petit Pistolet'),
('../public/image/guns2.png', 666, 'Arme Fatale'),
('../public/image/guns3.png', 69, 'Pistolero'),
('../public/image/guns4.png', 3773, 'Cow Boy Max'),
('../public/image/guns6.png', 16, 'Poulet'),
('../public/image/guns7.png', 111, 'Micro douille'),
('../public/image/missile pakistan.jpg', 110, 'Missile Pakistannais'),
('../public/image/missile.jpg', 5.5, 'Missilos'),
('../public/image/missileTurque.jpg', 200, 'Missile Turque'),
('../public/image/panzer.JPG', 45, 'Grosse Berta');

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE IF NOT EXISTS `Panier` (
  `numero_panier` int(11) NOT NULL,
  `liste_produit` varchar(500) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `numero_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`numero_utilisateur`, `nom`, `prenom`, `pseudo`, `password`, `email`) VALUES
(20, 'gege', 'gege', 'gege', '4fd8ed3f6d0d460e38fde11a12f45240', 'gege@teub.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`src`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`numero_panier`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`numero_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `numero_utilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
