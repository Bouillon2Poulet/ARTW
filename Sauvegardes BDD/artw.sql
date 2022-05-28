-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 mai 2022 à 22:36
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id_oeuvre`, `titre`, `description`, `image`, `url`, `id_format`) VALUES
(1, 'OE', 'Court-métrage IMAC 1', 'o1.png', 'https://www.youtube.com/watch?v=JlQN5H2ydi8', 1),
(2, '5M ETG', 'Zik ', 'o2.png', 'https://youtu.be/fSZmFKYWb-E', 7),
(6, 'Motion Design Alt-J', '', 'o6.png', 'https://youtu.be/odpzhQvTt54', 3),
(7, 'Azurites', '', 'o7.png', 'https://23hbd.com/participants/2022/triste_temps/', 19),
(8, 'Cartographie ISS', '', 'o8.png', '', 15),
(9, 'Numéro 10', '', 'o9.png', 'https://rom1-le-pain.itch.io/numero-10', 35),
(10, 'Charlotte Was Alone', '', 'o10.png', '', 35);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id_personne`, `nom`, `prenom`, `photo`, `facebook`, `instagram`, `twitter`, `linkedin`, `bandcamp`) VALUES
(1, 'Gervais', 'Wendy', 'a1.jpg', 'Wendy Grv', 'commandant.grant', '', '', ''),
(2, 'Dona', 'Axel', 'a2.png', 'Axel Dona', '', '', 'Axel Dona', ''),
(3, 'Debeaune', 'Tristan', 'a3.png', 'Tristan Debeaune', 'tristandebeaune', '', '', ''),
(4, 'Serres', 'Romain', 'a4.png', 'Romain Serres', 'consomme2poyo', '', '', ''),
(5, 'Huet', 'Quentin', '', '', '', '', '', ''),
(6, 'Massa', 'Elise', '', '', '', '', '', ''),
(7, 'Leclercq', 'Mattéo', '', '', '', '', '', ''),
(11, 'Timsit', 'Silvère', 'a8', '', '', '', '', '');

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
(4, 1, 1),
(7, 1, 1),
(1, 5, 1),
(3, 5, 1),
(5, 3, 1),
(6, 3, 1),
(4, 4, 1),
(5, 4, 1),
(7, 4, 1),
(4, 2, 1),
(1, 11, 2),
(1, 10, 2),
(3, 11, 2),
(3, 10, 2),
(3, 8, 6),
(1, 8, 6),
(3, 16, 7),
(1, 16, 7),
(2, 16, 8),
(1, 16, 8),
(4, 25, 9),
(4, 26, 9),
(3, 25, 9),
(1, 26, 9),
(11, 26, 9),
(1, 25, 10),
(3, 25, 10),
(5, 25, 10),
(1, 26, 10),
(3, 26, 10),
(5, 26, 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `id_domaine`) VALUES
(1, 'Réalisateur.rice', 1),
(2, 'Acteur.rice', 1),
(3, 'Son', 1),
(4, 'Monteur.euse', 1),
(5, 'Cadreur.euse', 1),
(6, 'Voix-off', 1),
(7, 'Doubleur.euse', 1),
(8, 'Animateur.rice', 1),
(9, 'FX', 1),
(10, 'Mixage', 2),
(11, 'Compositeur.rice', 2),
(12, 'Ingénieur.e son', 2),
(13, 'Chanteur.euse', 2),
(14, 'Voix', 2),
(15, 'Photographe', 3),
(16, 'Illustrateur.rice', 3),
(17, 'Dessinateur.rice', 3),
(18, 'Peintre', 3),
(19, 'Écrivain.e', 4),
(20, 'Créateur.rice', 5),
(21, 'Performeur.euse', 6),
(22, 'Chorégraphe', 6),
(23, 'Metteur.euse en scène', 6),
(24, 'Créateur.rice', 7),
(25, 'Programmeur.euse', 7),
(26, 'Designer', 7),
(27, 'Autre', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
