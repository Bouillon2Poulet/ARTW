-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 22 mai 2022 à 10:27
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `artw`
--

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

DROP TABLE IF EXISTS `domaines`;
CREATE TABLE IF NOT EXISTS `domaines` (
  `id_domaine` int(11) NOT NULL AUTO_INCREMENT,
  `nom_domaine` text NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`id_domaine`, `nom_domaine`) VALUES
(1, 'Vidéo'),
(2, 'Audio'),
(3, 'Image'),
(4, 'Texte'),
(5, 'Volume'),
(6, 'Performance'),
(7, 'Interactif'),
(8, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `formats`
--

DROP TABLE IF EXISTS `formats`;
CREATE TABLE IF NOT EXISTS `formats` (
  `id_format` int(11) NOT NULL AUTO_INCREMENT,
  `nom_format` text NOT NULL,
  `id_domaine` int(11) NOT NULL,
  PRIMARY KEY (`id_format`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formats`
--

INSERT INTO `formats` (`id_format`, `nom_format`, `id_domaine`) VALUES
(1, 'Court-métrage', 1),
(2, 'Long-métrage', 1),
(3, 'Clip, MV', 1),
(4, 'Reportage', 1),
(5, 'Série, web série', 1),
(6, 'Animation', 1),
(7, 'Musique', 2),
(8, 'Podcast', 2),
(9, 'Livre audio', 2),
(10, 'Série audio', 2),
(11, 'Sound Design', 2),
(12, 'Photographie', 3),
(13, 'Montage', 3),
(14, 'Peinture', 3),
(15, 'Graphisme', 3),
(16, 'Collage', 3),
(17, 'Dessin', 3),
(18, 'Illustration', 3),
(19, 'BD, manga', 3),
(20, 'Street Art, Graffiti', 3),
(21, 'Concept Art', 3),
(22, 'Poème', 4),
(23, 'Nouvelle', 4),
(24, 'Roman', 4),
(25, 'Scénario', 4),
(26, 'Sculpture', 5),
(27, 'Installation', 5),
(28, 'Textile', 5),
(29, 'Objet', 5),
(30, 'Ready-made', 5),
(31, 'Dance', 6),
(32, 'Spectacle', 6),
(33, 'Cirque', 6),
(34, 'Théâtre', 6),
(35, 'Jeux vidéos', 7),
(36, 'Sites', 7),
(37, 'Expérience numérique', 7),
(38, 'Autre', 8);

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

DROP TABLE IF EXISTS `oeuvres`;
CREATE TABLE IF NOT EXISTS `oeuvres` (
  `id_oeuvre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `id_format` int(11) NOT NULL,
  PRIMARY KEY (`id_oeuvre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id_oeuvre`, `titre`, `description`, `image`, `url`, `id_format`) VALUES
(1, 'Œ', 'Court-métrage IMAC 1', '1.png', 'https://www.youtube.com/watch?v=JlQN5H2ydi8', 1),
(2, 'Azurites', '23H BD de 803Z', '2.png', 'https://23hbd.com/participants/2022/triste_temps/', 19),
(3, 'Cartographie ISS', 'AA IMAC1', '3.png', '', 15),
(4, 'Piskel', '', '4.png', '', 17),
(5, 'Fleabustiers', 'Test de partage', '5.png', 'https://www.youtube.com/watch?v=x0krt2s1PJE', 7),
(6, 'Intégrale Point', '', '6.png', '', 17);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `photo` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `bandcamp` text NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id_personne`, `nom`, `prenom`, `photo`, `facebook`, `instagram`, `twitter`, `linkedin`, `bandcamp`) VALUES
(1, 'Gervais', 'Wendy', '', 'Wendy Grv', 'commandant.grant', '', '', ''),
(2, 'Dona', 'Axel', '', 'Axel Dona', '', '', 'Axel Dona', ''),
(3, 'Debeaune', 'Tristan', '', 'Tristan Debeaune', 'tristandebeaune', '', '', ''),
(4, 'Serres', 'Romain', '', 'Romain Serres', 'consomme2poyo', '', '', ''),
(5, 'Huet', 'Quentin', '', '', '', '', '', ''),
(6, 'Massa', 'Elise', '', '', '', '', '', ''),
(7, 'Leclercq', 'Mattéo', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `remplir_role`
--

DROP TABLE IF EXISTS `remplir_role`;
CREATE TABLE IF NOT EXISTS `remplir_role` (
  `id_personne` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_oeuvre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `remplir_role`
--

INSERT INTO `remplir_role` (`id_personne`, `id_role`, `id_oeuvre`) VALUES
(1, 5, 1),
(3, 5, 1),
(4, 1, 1),
(5, 3, 1),
(6, 3, 1),
(7, 1, 1),
(4, 4, 1),
(5, 4, 1),
(7, 4, 1),
(2, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `id_domaine` int(11) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `id_domaine`) VALUES
(1, 'Réalisateur', 1),
(2, 'Acteur', 1),
(3, 'Son', 1),
(4, 'Monteur', 1),
(5, 'Cadreur', 1),
(6, 'Voix-off', 1),
(7, 'Doubleur', 1),
(8, 'Animateur', 1),
(9, 'FX', 1),
(10, 'Mixeur', 2),
(11, 'Compositeur', 2),
(12, 'Ingénieur son', 2),
(13, 'Chanteur', 2),
(14, 'Voix', 2),
(15, 'Photographe', 3),
(16, 'Illustrateur', 3),
(17, 'Dessinateur', 3),
(18, 'Peintre', 3),
(19, 'Écrivain', 4),
(20, 'Créateur', 5),
(21, 'Performeur', 6),
(22, 'Chorégraphe', 6),
(23, 'Metteur en scène', 6),
(24, 'Créateur.ice', 7),
(25, 'Programmeur.e', 7),
(26, 'Designer', 7),
(27, 'Autre', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
