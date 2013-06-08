-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 08 Juin 2013 à 15:01
-- Version du serveur: 5.5.31
-- Version de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tasks`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_tache` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_tache` (`id_tache`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `date_creation`, `id_tache`, `id_utilisateur`) VALUES
(11, 'uisque felis massa, pellentesque at porta vel, porttitor et augue. Nulla facilisi. Nulla et odio neque. Praesent vel neque a lo', '2013-06-07 04:39:13', 1, 1),
(12, 'ulla et odio neque. Praesent vel neque a lorem eleifend bibendum ac et lectus. Sed tempor scelerisque sapien condime', '2013-06-07 04:39:40', 1, 1),
(13, 'ulla et odio neque. Praesent vel neque a lorem eleifend bibendum ac et lectus. Sed tempor scelerisque sapien condime', '2013-06-07 04:40:00', 1, 19);

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation` date DEFAULT NULL,
  `date_limite` date DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `contenu` text,
  `etat` varchar(10) DEFAULT NULL,
  `en_ligne` int(11) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `id_responsable` int(45) DEFAULT NULL,
  `attribution_acceptee` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_responsable` (`id_responsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`id`, `date_creation`, `date_limite`, `nom`, `contenu`, `etat`, `en_ligne`, `slug`, `id_responsable`, `attribution_acceptee`) VALUES
(1, '2013-06-07', '2013-05-26', 'Repeindre les murs', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nisl arcu, ullamcorper a fermentum bibendum, porttètor eu tellus. Quisque felis massa, pellentesque at porta vel, porttitor et augue. Nulla facilisi. Nulla et odio neque. Praesent vel neque a lorem eleifend bibendum ac et lectus. Sed tempor scelerisque sapien condimentum sagittis. Mauris molestie urna nec augue dictum a gravida elit ultricies.</p>', 'en cours', 1, 'repeindre-mur', 1, 0),
(2, '2013-05-18', '2013-06-26', 'Distribuer les flyers', '<p>Etiam nec gravida diam. Vivamus blandit dolor at ante sagittis at aliquam libero volutpat. Sed sem elit, ornare non fringilla ac, bibendum sed orci. </p>', 'en cours', 1, 'distribuer-flyer', 19, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `token` varchar(255) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `email`, `pwd`, `nom`, `prenom`, `role`, `token`, `actif`) VALUES
(1, 'admin', 'szilagyikinga42@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, NULL, 'admin', '', 1),
(19, 'user', 'szkinga@freemail.hu', 'd969831eb8a99cff8c02e681f43289e5d3d69664', NULL, NULL, 'user', '45186369e376b3f5dc767b1a3588c003eb3f3481', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_tache`) REFERENCES `taches` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `taches_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `utilisateurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
