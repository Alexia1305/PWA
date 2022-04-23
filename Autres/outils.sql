-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 23 avr. 2022 à 10:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `outils`
--

-- --------------------------------------------------------

--
-- Structure de la table `boite`
--

DROP TABLE IF EXISTS `boite`;
CREATE TABLE IF NOT EXISTS `boite` (
  `id_boite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_boite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boite`
--

INSERT INTO `boite` (`id_boite`, `nom`, `description`) VALUES
(1, 'boite1', 'belle'),
(2, 'gtgtgt', 'gtgtgt'),
(3, 'Inventaire Stock B', 'Inventaire du stock ');

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

DROP TABLE IF EXISTS `outils`;
CREATE TABLE IF NOT EXISTS `outils` (
  `id_outils` int(11) NOT NULL AUTO_INCREMENT,
  `fonction` varchar(50) NOT NULL,
  `marque` varchar(25) DEFAULT NULL,
  `type_outils` varchar(50) DEFAULT NULL,
  `garantie` int(11) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `etat` varchar(25) DEFAULT NULL,
  `id_boite` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_outils`),
  KEY `RelationBoiteOutils` (`id_boite`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `outils`
--

INSERT INTO `outils` (`id_outils`, `fonction`, `marque`, `type_outils`, `garantie`, `date_achat`, `description`, `etat`, `id_boite`, `quantite`) VALUES
(4, 'décapeur', 'bosh', 'visse', 2, '2022-04-06', NULL, 'neuf', 1, 500),
(5, 'Marteau', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `id_boite` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_boite`,`id_utilisateur`),
  UNIQUE KEY `RelationPossederBoite` (`id_boite`),
  KEY `RelationPossederUtilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posseder`
--

INSERT INTO `posseder` (`id_boite`, `id_utilisateur`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id_test`, `date`) VALUES
(1, '2022-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `tester`
--

DROP TABLE IF EXISTS `tester`;
CREATE TABLE IF NOT EXISTS `tester` (
  `id_outils` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  PRIMARY KEY (`id_outils`,`id_test`) USING BTREE,
  KEY `RelationTesterOutils` (`id_outils`) USING BTREE,
  KEY `RelationTesterTest` (`id_test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mdp`, `mail`) VALUES
(1, 'D\'Hertog', 'Arthur', '$2y$10$pNJNxxxW7nD3vt04KxOh8uEiQURHCQ6I/3FbLusXVUQ50hobNXX6a', 'arthur@dhertog.be'),
(2, 'Dache', 'Alexandra', '$2y$10$BtvQeX8EInjmPlYyDSa.beIvoXH5w7Gdxt9fyPFsUGhhT8S.JR94.', 'alexia.dache@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `outils`
--
ALTER TABLE `outils`
  ADD CONSTRAINT `RelationOutilsBoite` FOREIGN KEY (`id_boite`) REFERENCES `boite` (`id_boite`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `RelationPossederBoite` FOREIGN KEY (`id_boite`) REFERENCES `boite` (`id_boite`),
  ADD CONSTRAINT `RelationPossederUtilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `tester`
--
ALTER TABLE `tester`
  ADD CONSTRAINT `RelationTesterOutils` FOREIGN KEY (`id_outils`) REFERENCES `outils` (`id_outils`),
  ADD CONSTRAINT `RelationTesterTest` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
