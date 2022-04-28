-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 28 avr. 2022 à 22:52
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Structure de la table `Domaines`
--

CREATE TABLE `Domaines` (
  `id_domaine` int NOT NULL,
  `nom_domaine` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Domaines`
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
  `id_format` int NOT NULL,
  `nom_format` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_domaine` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Formats`
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
  `id_oeuvre` int NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `id_format` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Oeuvres`
--

INSERT INTO `Oeuvres` (`id_oeuvre`, `titre`, `description`, `image`, `url`, `id_format`) VALUES
(1, 'OE', '', '', '', 1),
(2, 'TROU NOIR', '', '', '', 1),
(3, 'lalala', '', '', '', 7),
(4, 'Julius', '', '', '', 7),
(5, 'OE 2', '', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Personnes`
--

CREATE TABLE `Personnes` (
  `id_personne` int NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `photo` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `bandcamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Personnes`
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
  `id_personne` int NOT NULL,
  `id_rôle` int NOT NULL,
  `id_oeuvre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `remplir_role`
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
  `id_rôle` int NOT NULL,
  `rôle` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_domaine` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Rôles`
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
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Domaines`
--
ALTER TABLE `Domaines`
  MODIFY `id_domaine` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Formats`
--
ALTER TABLE `Formats`
  MODIFY `id_format` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `Oeuvres`
--
ALTER TABLE `Oeuvres`
  MODIFY `id_oeuvre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Personnes`
--
ALTER TABLE `Personnes`
  MODIFY `id_personne` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Rôles`
--
ALTER TABLE `Rôles`
  MODIFY `id_rôle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
