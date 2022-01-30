





Créé lors de la première version du projet, n'est pas utilisée dans la version finale.




-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 25 jan. 2022 à 19:43
-- Version du serveur : 8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Tim_PATERSON`
--

-- --------------------------------------------------------

--
-- Structure de la table `Articles`
--

CREATE TABLE `Articles` (
  `ID` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `auteur_id` int NOT NULL,
  `publie` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `Articles`
--

INSERT INTO `Articles` (`ID`, `titre`, `auteur_id`, `publie`) VALUES
(1, 'Article test', 1, 0),
(2, 'Article test 2', 2, 0),
(3, 'Article test 3', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Auteurs`
--

CREATE TABLE `Auteurs` (
  `ID` int NOT NULL,
  `Nom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `Prenom` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `Auteurs`
--

INSERT INTO `Auteurs` (`ID`, `Nom`, `Prenom`) VALUES
(1, 'MASSON', 'Tiffany'),
(2, 'PIERRE', 'Gabrielle'),
(3, 'DOS', 'Duckens');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `ID` int NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`ID`, `pseudo`, `mdp`, `photo`) VALUES
(1, 'Tiff', 'mdp235', ''),
(2, 'Gabrielle', 'mdp235', ''),
(3, 'Dos', 'mdp235', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `titre` (`titre`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `Auteurs`
--
ALTER TABLE `Auteurs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Auteurs`
--
ALTER TABLE `Auteurs`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `Articles_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `Auteurs` (`ID`);

--
-- Contraintes pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD CONSTRAINT `Utilisateurs_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Auteurs` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
