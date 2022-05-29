-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  sqletud.u-pem.fr
-- Généré le :  Dim 29 Mai 2022 à 18:00
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
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `id_domaine` int(11) NOT NULL,
  `nom_domaine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `domaines`
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

CREATE TABLE `formats` (
  `id_format` int(11) NOT NULL,
  `nom_format` text NOT NULL,
  `id_domaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formats`
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

CREATE TABLE `oeuvres` (
  `id_oeuvre` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `id_format` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id_oeuvre`, `titre`, `description`, `image`, `url`, `id_format`) VALUES
(1, 'OE', 'Court-métrage IMAC 1', 'o1.png', 'https://www.youtube.com/watch?v=JlQN5H2ydi8', 1),
(2, '5M ETG', '', 'o2.png', 'https://youtu.be/fSZmFKYWb-E', 7),
(6, 'Motion Design Alt-J', '', 'o6.png', 'https://youtu.be/odpzhQvTt54', 3),
(7, 'Azurites', '', 'o7.png', 'https://23hbd.com/participants/2022/triste_temps/', 19),
(8, 'Cartographie ISS', '', 'o8.png', '', 15),
(9, 'Numéro 10', '', 'o9.png', 'https://rom1-le-pain.itch.io/numero-10', 35),
(10, 'Charlotte Was Alone', 'Jeu vidéo inspiré par \"Thomas was Alone\"', 'o10.png', 'https://gitlab.com/rubykiara1712/imac_thomas2', 35),
(11, 'Réappropriation HDA Tristan', 'effectivement ça marche ça marche', 'o11.jpg', '', 18),
(12, 'partage.artw', '', 'o.png', 'https://perso-etudiant.u-pem.fr/~wendy.gervais/artw/index.php', 36);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
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
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_personne`, `nom`, `prenom`, `photo`, `facebook`, `instagram`, `twitter`, `linkedin`, `bandcamp`) VALUES
(1, 'Gervais', 'Wendy', 'a1.jpg', 'Wendy Grv', 'commandant.grant', 'wendykau', 'Wendy Gervais', ''),
(2, 'Dona', 'Axel', 'a2.png', 'Axel Dona', '', '', 'Axel Dona', ''),
(3, 'Debeaune', 'Tristan', 'a3.png', 'Tristan Debeaune', 'tristandebeaune', '', '', ''),
(4, 'Serres', 'Romain', 'a4.png', 'Romain Serres', 'consomme2poyo', '', '', ''),
(5, 'Huet', 'Quentin', 'a.png', '', '', '', '', ''),
(6, 'Massa', 'Elise', 'a.png', '', '', '', '', ''),
(7, 'Leclercq', 'Mattéo', 'a7.png', 'Mattéo Leclercq', '', '', '', ''),
(11, 'Timsit', 'Silvère', 'a.png', '', '', '', '', ''),
(12, 'Strich', 'Emily-Rose', 'a.png', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `remplir_role`
--

CREATE TABLE `remplir_role` (
  `id_personne` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_oeuvre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `remplir_role`
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
(5, 26, 10),
(3, 16, 11),
(2, 25, 12),
(4, 25, 12),
(1, 25, 12),
(3, 25, 12),
(4, 24, 12),
(4, 26, 12),
(2, 26, 12),
(1, 26, 12),
(3, 26, 12);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` text NOT NULL,
  `id_domaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`id_domaine`);

--
-- Index pour la table `formats`
--
ALTER TABLE `formats`
  ADD PRIMARY KEY (`id_format`);

--
-- Index pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  ADD PRIMARY KEY (`id_oeuvre`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `id_domaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `formats`
--
ALTER TABLE `formats`
  MODIFY `id_format` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  MODIFY `id_oeuvre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
