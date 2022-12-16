-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 16 déc. 2022 à 14:49
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
(50);

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
(2, 'Work', 'Work', '2022-12-01', 1, 1),
(3, 'Job', 'J\'aime travailler', '2022-12-05', 1, 1),
(4, 'Fourniture Scolaire', 'Acheter les Fournitures Scolaire avant Septembre', '2022-12-06', 1, 1),
(6, 'Projet Blazor', 'Les tâches que je doit faire pour mon projet Blazor', '2022-12-06', 1, 1),
(7, 'SAE', 'Les tâches à faire pour la SAE', '2022-12-06', 1, 1),
(8, 'Supermarché', 'Acheter les courses au Supermarché', '2022-12-02', 1, 1),
(9, 'Voiture', 'Liste des choses à acheter pour ma voiture', '2022-12-01', 1, 1),
(11, 'Ordinateur', 'Les composants pour mon ordinateur', '2022-12-03', 1, 1),
(13, 'Test List', '', '2022-12-01', 1, 1),
(14, 'Test List 2', 'hahaa', '2022-12-02', 1, 1),
(40, 'TestList1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '2022-12-15', 1, 49),
(41, 'TestList2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '2022-12-14', 1, 1),
(42, 'TestList3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '2022-12-15', 1, 49),
(43, 'TestList4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '2022-12-15', 1, 49),
(44, 'Montre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-12', 1, 1),
(45, 'Glace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-13', 1, 49),
(46, 'Trotinette', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-15', 0, 49),
(47, 'Csharp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-14', 1, 1),
(48, 'Book', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-15', 1, 49),
(49, 'Telephone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-10', 1, 1),
(50, 'Clavier', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-13', 1, 49),
(51, 'Méthodes d\'optimisation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-07', 1, 49),
(52, 'Casque', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-12-07', 1, 49);

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
(5, 'Push', 'rayhan faut penser a push ton taff', '2022-12-06', 1, 6),
(6, 'Etre le goat', 'je suis le goat', '2022-12-06', 0, 7),
(7, 'Acheter le lait ', 'parce que il faut faire comme papa', '2022-12-06', 1, 8),
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
(1, 'Kartal', 'Emre', 'Malleo', 'emre.kartal10@etu.uca.fr', '00000'),
(49, 'Khedair', 'Rami', 'Rori63', 'rami.khedair@etu.uca.fr', '$2y$10$aqRyoGoXN9dxpGPsMYTNY.gkSDZwsIwORfb78HqleiuV3PvwQ75iO'),
(50, 'Rayhan', 'Hassou', 'rayhan', 'hassourayhan1@gmail.com', '$2y$10$D0sJ14i8bDdigDZZx1VLguWbviCbVw5cAQkwD/ja336MD3E2tFEH6');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `ToDoList_Tache`
--
ALTER TABLE `ToDoList_Tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `ToDoList_Utilisateur`
--
ALTER TABLE `ToDoList_Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
