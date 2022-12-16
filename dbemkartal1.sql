-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 16 déc. 2022 à 22:44
-- Version du serveur :  10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbemkartal1`
--

-- --------------------------------------------------------

--
-- Structure de la table `MaTable`
--

CREATE TABLE `MaTable` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Prenom` varchar(40) NOT NULL,
  `Aigritude` int(11) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='J''en ai marre d''être le goat';

--
-- Déchargement des données de la table `MaTable`
--

INSERT INTO `MaTable` (`Id`, `Nom`, `Prenom`, `Aigritude`, `Age`) VALUES
(1, 'Kartal', 'Emre', 2, 18),
(2, 'Hassou', 'Rayhan', 4, 15),
(3, 'Skeleton', 'Armure', 150, 5),
(10, 'Khedair', 'Rami', 17, 20);

-- --------------------------------------------------------

--
-- Structure de la table `ToDoList_Admin`
--

CREATE TABLE `ToDoList_Admin` (
  `idAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ToDoList_Admin`
--

INSERT INTO `ToDoList_Admin` (`idAdmin`) VALUES
(50),
(58);

-- --------------------------------------------------------

--
-- Structure de la table `ToDoList_Liste`
--

CREATE TABLE `ToDoList_Liste` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dateCreation` date NOT NULL,
  `estPublic` tinyint(1) NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ToDoList_Liste`
--

INSERT INTO `ToDoList_Liste` (`id`, `nom`, `description`, `dateCreation`, `estPublic`, `idUtilisateur`) VALUES
(124, 'Iut', 'Ma liste de devoirs', '2022-12-16', 1, 1),
(125, 'Serie', 'Les series à regarder', '2022-12-16', 1, 1),
(150, 'Fourniture Scolaire', 'Mes fournitures Scolaires à acheter avant septembre', '2022-12-06', 1, NULL),
(155, 'Supermarché', 'Acheter les courses au Supermarché', '2022-12-02', 1, NULL),
(156, 'Ordinateur', 'Les composants pour mon ordinateur', '2022-12-03', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ToDoList_Tache`
--

CREATE TABLE `ToDoList_Tache` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dateCreation` date NOT NULL,
  `estValide` tinyint(1) NOT NULL,
  `idListe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ToDoList_Tache`
--

INSERT INTO `ToDoList_Tache` (`id`, `nom`, `description`, `dateCreation`, `estValide`, `idListe`) VALUES
(139, 'Blazor', 'Finir le projet', '2022-12-16', 0, 124),
(140, 'Sae', 'Faire le rapport', '2022-12-16', 1, 124),
(141, 'Breaking Bad', 'Le top 1', '2022-12-16', 0, 125),
(142, 'The Walking Dead', 'Meme si apres la saison 7 cest pas ouf', '2022-12-16', 0, 125),
(145, 'ProgSys', 'Finir le tp', '2022-12-16', 0, 124);

-- --------------------------------------------------------

--
-- Structure de la table `ToDoList_Utilisateur`
--

CREATE TABLE `ToDoList_Utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motDePasse` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ToDoList_Utilisateur`
--

INSERT INTO `ToDoList_Utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `email`, `motDePasse`) VALUES
(1, 'Kartal', 'Emre', 'Malleo', 'emre.kartal10@etu.uca.fr', '00000'),
(50, 'Rayhan', 'Hassou', 'rayhan', 'hassourayhan1@gmail.com', '$2y$10$cKfV6KB7siPhwMRbpoS/COMaZQKkYETj.HIQ5YWkrbc5qXo.9jvuK'),
(51, 'Lucas', 'Mielkarek', 'lukaka', 'lucas@gmail.com', '$2y$10$5AlX0WcLx.8r/WCxxcBeuOaeGTzftqk3jn9q2cKMZkft313y2a3.C'),
(57, 'Restitutio', 'Mathieu', 'marestituito', 'Matthieu.RESTITUITO@uca.fr', '$2y$10$RNj8XMe5UDWDuiocwwg.g../8powrKKNpQ1FmPzSBoN9JubfjYrIq'),
(58, 'Admin', 'Prof', 'Admin', 'Matthieu.RESTITUITO@admin.fr', '$2y$10$oE5jSXemC4NrKiQE9EUKYeO1RdTpbeXxj/FaayeVciBQxYdxsmNuW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `MaTable`
--
ALTER TABLE `MaTable`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `ToDoList_Admin`
--
ALTER TABLE `ToDoList_Admin`
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Index pour la table `ToDoList_Liste`
--
ALTER TABLE `ToDoList_Liste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ToDoList_Liste_ibfk_1` (`idUtilisateur`);

--
-- Index pour la table `ToDoList_Tache`
--
ALTER TABLE `ToDoList_Tache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ToDoList_Tache_ibfk_1` (`idListe`);

--
-- Index pour la table `ToDoList_Utilisateur`
--
ALTER TABLE `ToDoList_Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `MaTable`
--
ALTER TABLE `MaTable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `ToDoList_Liste`
--
ALTER TABLE `ToDoList_Liste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT pour la table `ToDoList_Tache`
--
ALTER TABLE `ToDoList_Tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT pour la table `ToDoList_Utilisateur`
--
ALTER TABLE `ToDoList_Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ToDoList_Admin`
--
ALTER TABLE `ToDoList_Admin`
  ADD CONSTRAINT `ToDoList_Admin_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `ToDoList_Utilisateur` (`id`);

--
-- Contraintes pour la table `ToDoList_Liste`
--
ALTER TABLE `ToDoList_Liste`
  ADD CONSTRAINT `ToDoList_Liste_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `ToDoList_Utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ToDoList_Tache`
--
ALTER TABLE `ToDoList_Tache`
  ADD CONSTRAINT `ToDoList_Tache_ibfk_1` FOREIGN KEY (`idListe`) REFERENCES `ToDoList_Liste` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
