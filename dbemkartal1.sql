-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 06 déc. 2022 à 22:21
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
-- Structure de la table `ToDoList_Liste`
--

CREATE TABLE `ToDoList_Liste` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dateCreation` date NOT NULL,
  `estPublic` tinyint(1) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ToDoList_Liste`
--

INSERT INTO `ToDoList_Liste` (`id`, `nom`, `description`, `dateCreation`, `estPublic`, `idUtilisateur`) VALUES
(2, 'Work', 'Mes tâches d\'octobres !', '2022-12-01', 1, 1),
(3, 'Job', 'J\'aime travailler', '2022-12-05', 1, 1),
(4, 'Fourniture Scolaire', 'Acheter les Fournitures Scolaire avant Septembre', '2022-12-06', 1, 1),
(6, 'Projet Blazor', 'Les tâches que je doit faire pour mon projet Blazor', '2022-12-06', 1, 1),
(7, 'SAE', 'Les tâches à faire pour la SAE', '2022-12-06', 1, 1),
(8, 'Supermarché', 'Acheter les courses au Supermarché', '2022-12-02', 1, 1),
(9, 'Voiture', 'Liste des choses à acheter pour ma voiture', '2022-12-01', 1, 1),
(10, 'Analyse', 'Liste des choses à réviser en analyse', '2022-12-01', 1, 1),
(11, 'Ordinateur', 'Les composants pour mon ordinateur', '2022-12-03', 1, 1),
(13, 'Test List', '', '2022-12-01', 1, 1),
(14, 'Test List 2', 'hahaa', '2022-12-02', 1, 1);

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
(1, 'PHP', 'Finir le projet de PHP et les TPs', '2022-12-06', 0, 2),
(2, 'Blazor', 'Finir le projet de Blazor', '2022-12-06', 1, 2),
(3, 'Stage', 'Postuler chez CGI et Apside', '2022-12-06', 0, 3),
(4, 'CV', 'Finir le CV', '2022-12-06', 1, 3),
(5, 'Push', 'rayhan faut penser a push ton taff', '2022-12-06', 0, 6),
(6, 'Etre le goat', 'je suis le goat', '2022-12-06', 0, 7),
(7, 'Acheter le lait ', 'parce que il faut faire comme papa', '2022-12-06', 0, 8),
(8, 'Acheter des stylos', 'parce que Arthur en a pas', '2022-12-06', 0, 4),
(9, 'Réviser prog sys', 'Je suis dans la caca', '2022-12-06', 0, 3);

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
(1, 'Kartal', 'Emre', 'Malleo', 'emre.kartal@etu.uca.fr', '0000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `MaTable`
--
ALTER TABLE `MaTable`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `ToDoList_Liste`
--
ALTER TABLE `ToDoList_Liste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `ToDoList_Tache`
--
ALTER TABLE `ToDoList_Tache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idListe` (`idListe`);

--
-- Index pour la table `ToDoList_Utilisateur`
--
ALTER TABLE `ToDoList_Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `ToDoList_Tache`
--
ALTER TABLE `ToDoList_Tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ToDoList_Utilisateur`
--
ALTER TABLE `ToDoList_Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ToDoList_Liste`
--
ALTER TABLE `ToDoList_Liste`
  ADD CONSTRAINT `ToDoList_Liste_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `ToDoList_Utilisateur` (`id`);

--
-- Contraintes pour la table `ToDoList_Tache`
--
ALTER TABLE `ToDoList_Tache`
  ADD CONSTRAINT `ToDoList_Tache_ibfk_1` FOREIGN KEY (`idListe`) REFERENCES `ToDoList_Liste` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
