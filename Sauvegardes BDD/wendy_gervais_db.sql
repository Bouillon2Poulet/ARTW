-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  sqletud.u-pem.fr
-- Généré le :  Mar 10 Mai 2022 à 09:22
-- Version du serveur :  5.7.30-log
-- Version de PHP :  7.0.33-0+deb9u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wendy.gervais_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `Domaines`
--

CREATE TABLE `Domaines` (
  `id_domaine` int(11) NOT NULL,
  `nom_domaine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Domaines`
--

INSERT INTO `Domaines` (`id_domaine`, `nom_domaine`) VALUES
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
-- Structure de la table `Formats`
--

CREATE TABLE `Formats` (
  `id_format` int(11) NOT NULL,
  `nom_format` text NOT NULL,
  `id_domaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Formats`
--

INSERT INTO `Formats` (`id_format`, `nom_format`, `id_domaine`) VALUES
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
(21, 'Concept Art', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Oeuvres`
--

CREATE TABLE `Oeuvres` (
  `id_oeuvre` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `id_format` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Oeuvres`
--

INSERT INTO `Oeuvres` (`id_oeuvre`, `titre`, `description`, `image`, `url`, `id_format`) VALUES
(1, 'Œ', 'Court-métrage IMAC 1', '1.png', 'https://www.youtube.com/watch?v=JlQN5H2ydi8', 1),
(2, 'Azurites', '23H BD de 803Z', '2.png', 'https://23hbd.com/participants/2022/triste_temps/', 19),
(3, 'Cartographie ISS', 'AA IMAC1', '3.png', '', 15),
(4, 'Piskel', '', '4.png', '', 17),
(5, 'Fleabustiers', 'Test de partage', '5.png', 'https://www.youtube.com/watch?v=x0krt2s1PJE', 7),
(6, 'Intégrale Point', '', '6.png', '', 17);

-- --------------------------------------------------------

--
-- Structure de la table `Personnes`
--

CREATE TABLE `Personnes` (
  `id_personne` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `photo` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `bandcamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Personnes`
--

INSERT INTO `Personnes` (`id_personne`, `nom`, `prenom`, `photo`, `facebook`, `instagram`, `twitter`, `linkedin`, `bandcamp`) VALUES
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

CREATE TABLE `remplir_role` (
  `id_personne` int(11) NOT NULL,
  `id_rôle` int(11) NOT NULL,
  `id_oeuvre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `remplir_role`
--

INSERT INTO `remplir_role` (`id_personne`, `id_rôle`, `id_oeuvre`) VALUES
(1, 5, 1),
(3, 5, 1),
(4, 1, 1),
(5, 3, 1),
(6, 3, 1),
(7, 1, 1),
(4, 4, 1),
(5, 4, 1),
(7, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Rôles`
--

CREATE TABLE `Rôles` (
  `id_rôle` int(11) NOT NULL,
  `rôle` text NOT NULL,
  `id_domaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Rôles`
--

INSERT INTO `Rôles` (`id_rôle`, `rôle`, `id_domaine`) VALUES
(1, 'Réalisateur', 1),
(2, 'Acteur', 1),
(3, 'Son', 1),
(4, 'Monteur', 1),
(5, 'Cadreur', 1),
(6, 'Voix-off', 1),
(7, 'Doubleur', 1),
(8, 'Animateur', 1),
(9, 'FX', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Domaines`
--
ALTER TABLE `Domaines`
  ADD PRIMARY KEY (`id_domaine`);

--
-- Index pour la table `Formats`
--
ALTER TABLE `Formats`
  ADD PRIMARY KEY (`id_format`);

--
-- Index pour la table `Oeuvres`
--
ALTER TABLE `Oeuvres`
  ADD PRIMARY KEY (`id_oeuvre`);

--
-- Index pour la table `Personnes`
--
ALTER TABLE `Personnes`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `Rôles`
--
ALTER TABLE `Rôles`
  ADD PRIMARY KEY (`id_rôle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Domaines`
--
ALTER TABLE `Domaines`
  MODIFY `id_domaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `Formats`
--
ALTER TABLE `Formats`
  MODIFY `id_format` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `Oeuvres`
--
ALTER TABLE `Oeuvres`
  MODIFY `id_oeuvre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `Personnes`
--
ALTER TABLE `Personnes`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Rôles`
--
ALTER TABLE `Rôles`
  MODIFY `id_rôle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
