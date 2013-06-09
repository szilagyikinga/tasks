-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 09 Juin 2013 à 23:30
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
  `utilisateur` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tache` (`id_tache`),
  KEY `utilisateur` (`utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `date_creation`, `id_tache`, `utilisateur`) VALUES
(17, 'Phasellus interdum fermentum nisl sit amet ullamcorper. Quisque sit amet gravida turpis. Maecenas ultrices leo quis ante rhoncus scelerisque. Pellentesque sed augue posuere, posuere arcu eu, venenatis tortor.', '2013-06-09 11:11:52', 2, 'admin'),
(18, 'Cras non ligula ut quam sodales facilisis. Suspendisse bibendum est vitae porttitor rhoncus.', '2013-06-09 11:12:12', 2, 'admin'),
(19, 'Praesent vel neque a lorem eleifend bibendum ac et lectus. Sed tempor scelerisque sapien condimentum sagittis. Mauris molestie urna nec augue dictum a gravida elit ultricies.', '2013-06-09 11:12:46', 1, 'admin'),
(20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nisl arcu, ullamcorper a fermentum bibendum, porttètor eu tellus.', '2013-06-09 11:13:00', 1, 'admin'),
(21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nisl arcu, ullamcorper a fermentum bibendum, porttètor eu tellus.', '2013-06-09 11:13:29', 9, 'user'),
(22, 'Phasellus mi odio, egestas non commodo fringilla, suscipit at est. Donec volutpat cursus pulvinar.', '2013-06-09 11:13:42', 9, 'user'),
(23, 'Phasellus mi odio, egestas non commodo fringilla, suscipit at est. Donec volutpat cursus pulvinar.', '2013-06-09 11:13:54', 2, 'user'),
(24, 'Phasellus mi odio, egestas non commodo fringilla, suscipit at est. Donec volutpat cursus pulvinar.', '2013-06-09 11:14:06', 1, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_lancement` date NOT NULL,
  `date_limite` date DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `contenu` text,
  `en_ligne` int(11) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `responsable` varchar(45) DEFAULT NULL,
  `attribution_acceptee` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `responsable` (`responsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`id`, `date_lancement`, `date_limite`, `nom`, `contenu`, `en_ligne`, `slug`, `responsable`, `attribution_acceptee`) VALUES
(1, '2013-06-13', '2013-06-29', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nisl arcu, ullamcorper a fermentum bibendum, porttètor eu tellus. Quisque felis massa, pellentesque at porta vel, porttitor et augue. Nulla facilisi. Nulla et odio neque. Praesent vel neque a lorem eleifend bibendum ac et lectus. Sed tempor scelerisque sapien condimentum sagittis. Mauris molestie urna nec augue dictum a gravida elit ultricies.', 1, '', 'user', 1),
(2, '2013-06-11', '2013-06-26', 'Phasellus condimentum, sem ut pulvina', 'Suspendisse scelerisque sem velit, a aliquet diam suscipit eget. Donec egestas volutpat neque, eu ultricies tellus cursus vel. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus interdum fermentum nisl sit amet ullamcorper. Quisque sit amet gravida turpis. Maecenas ultrices leo quis ante rhoncus scelerisque. Pellentesque sed augue posuere, posuere arcu eu, venenatis tortor. Nullam turpis nibh, fermentum eget lacus in, consequat feugiat justo. Mauris ultricies faucibus mi, vel lacinia nisi. Cras non ligula ut quam sodales facilisis. Suspendisse bibendum est vitae porttitor rhoncus.', 1, '', 'admin', 1),
(8, '2013-06-09', '2013-08-13', 'Vestibulum consequat congue metus, nec', 'Donec at ligula commodo, aliquet dui ac, egestas massa. Nulla venenatis vitae tortor ut placerat. Vivamus elementum faucibus mi in tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer hendrerit posuere erat in ornare. Aliquam pharetra risus tortor, id scelerisque turpis euismod porttitor. Sed ultricies commodo feugiat. ', 0, NULL, 'admin', 1),
(9, '2013-06-10', '2013-06-11', 'Nulla erat justo, ultricies quis', 'Suspendisse luctus accumsan nisi, et pulvinar tortor vestibulum id. Aliquam commodo libero id aliquet scelerisque. Maecenas sem lectus, eleifend et venenatis eu, vestibulum nec diam. Donec scelerisque quam at placerat dignissim. Donec ante nisi, iaculis ullamcorper elit vel, pellentesque congue risus. Donec tempor erat eget condimentum elementum. Duis metus elit, dapibus vel quam vitae, placerat laoreet enim. Cras quis lobortis turpis. Phasellus mi odio, egestas non commodo fringilla, suscipit at est. Donec volutpat cursus pulvinar. Proin ullamcorper mauris quis magna eleifend suscipit. Nullam tincidunt, lorem sed egestas vulputate, libero nisl dictum urna, ut varius ante felis vitae nunc.', 1, NULL, 'user', 0),
(10, '2013-06-29', '2013-07-31', 'Donec dapibus nisl vitae magna pellentesque', 'Donec dapibus nisl vitae magna pellentesque, in hendrerit tellus accumsan. Etiam sollicitudin risus lectus, sit amet consectetur massa pharetra in. Morbi semper dui augue, id vulputate arcu vestibulum quis. Vestibulum volutpat sapien eget mauris convallis, in euismod magna scelerisque. Nullam dignissim suscipit ante quis dapibus. Mauris quis justo sit amet magna vulputate ultrices non ut est. Sed lobortis auctor risus eu scelerisque. Ut nec aliquet sapien, eget dapibus mi. Nunc pretium ac ante ut suscipit. Pellentesque malesuada dolor vitae tortor eleifend vestibulum. ', NULL, NULL, NULL, 0),
(11, '2013-06-12', '2013-06-29', 'Aliquam commodo libero id aliquet scelerisque', 'Donec tempor erat eget condimentum elementum. Duis metus elit, dapibus vel quam vitae, placerat laoreet enim. Cras quis lobortis turpis. Phasellus mi odio, egestas non commodo fringilla, suscipit at est. Donec volutpat cursus pulvinar.', 1, NULL, 'admin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `pwd` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `token` varchar(255) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `email`, `pwd`, `nom`, `prenom`, `role`, `token`, `actif`) VALUES
(5, 'admin', 'admin@mail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, NULL, 'admin', 'aaed85cc36b001ce9fdd562b330f1037d6581b58', 1),
(6, 'user', 'user@mail.com', '12dea96fec20593566ab75692c9949596833adc9', NULL, NULL, 'user', 'a6b0755f8096f7270d7b81b992b552a188a25f08', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_3` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateurs` (`login`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_tache`) REFERENCES `taches` (`id`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `taches_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `utilisateurs` (`login`),
  ADD CONSTRAINT `taches_ibfk_2` FOREIGN KEY (`responsable`) REFERENCES `utilisateurs` (`login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
