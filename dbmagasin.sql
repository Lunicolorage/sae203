-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 11:21
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbmagasin`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`, `type`) VALUES
(1, 'oiseau', 'animal'),
(2, 'chien', 'animal'),
(3, 'chat', 'animal'),
(4, 'fleur', 'plante');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mdp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `mail`, `mdp`) VALUES
(1, 'tomas', 'tom@gmail.com', 'sf564fv7'),
(2, 'jim', 'jim@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `dateHeure` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idClient` int(11) DEFAULT NULL,
  `prixTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateHeure`, `idClient`, `prixTotal`) VALUES
(69, '2024-05-30 08:54:39', 1, 4012),
(70, '2024-05-30 09:09:04', 2, 44022),
(71, '2024-05-30 09:11:02', 2, 8004),
(72, '2024-05-30 09:11:40', 1, 10),
(73, '2024-05-30 09:11:59', 1, 10),
(74, '2024-05-30 09:12:20', 1, 10),
(75, '2024-05-30 09:14:32', 1, 12106),
(76, '2024-05-30 09:16:47', 1, 12106),
(77, '2024-05-30 09:17:13', 1, 12106),
(78, '2024-05-30 09:17:40', 1, 12106),
(79, '2024-05-30 09:17:47', 1, 12106),
(80, '2024-05-30 09:18:25', 1, 12106),
(81, '2024-05-30 09:18:37', 1, 12106),
(82, '2024-05-30 09:18:57', 1, 12106),
(83, '2024-05-30 09:19:23', 1, 12106),
(84, '2024-05-30 09:19:41', 1, 36018);

-- --------------------------------------------------------

--
-- Structure de la table `pivot`
--

CREATE TABLE `pivot` (
  `idPivot` int(11) NOT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `idProduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `pivot`
--

INSERT INTO `pivot` (`idPivot`, `idCommande`, `quantite`, `idProduit`) VALUES
(95, 58, 1, 14),
(96, 58, 4, 17),
(97, 59, 4, 13),
(98, 59, 2, 17),
(99, 60, 4, 13),
(100, 60, 2, 17),
(101, 61, 4, 17),
(102, 62, 4, 13),
(103, 62, 3, 17),
(104, 64, 4, 13),
(105, 64, 3, 17),
(106, 66, 4, 17),
(107, 66, 5, 14),
(108, 68, 4, 17),
(109, 68, 5, 14),
(110, 69, 1, 14),
(111, 69, 1, 13),
(112, 70, 5, 14),
(113, 70, 6, 14),
(114, 71, 2, 14),
(115, 72, 1, 13),
(116, 73, 1, 13),
(117, 74, 1, 13),
(118, 75, 1, 17),
(119, 75, 3, 14),
(120, 76, 1, 17),
(121, 76, 3, 14),
(122, 77, 1, 17),
(123, 77, 3, 14),
(124, 78, 1, 17),
(125, 78, 3, 14),
(126, 79, 1, 17),
(127, 79, 3, 14),
(128, 80, 1, 17),
(129, 80, 3, 14),
(130, 81, 1, 17),
(131, 81, 3, 14),
(132, 82, 1, 17),
(133, 82, 3, 14),
(134, 83, 1, 17),
(135, 83, 3, 14),
(136, 84, 4, 14),
(137, 84, 5, 14);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `type`, `description`, `prix`, `quantite`) VALUES
(13, 'rhododendron', 4, 'super fleur', 10, 10),
(14, 'sphynx', 3, 'ronfleur sympatique', 4002, 7),
(17, 'perruche', 1, 'super animal pour les petits espaces', 100, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `pivot`
--
ALTER TABLE `pivot`
  ADD PRIMARY KEY (`idPivot`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `fk1` (`type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `pivot`
--
ALTER TABLE `pivot`
  MODIFY `idPivot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `pivot`
--
ALTER TABLE `pivot`
  ADD CONSTRAINT `pivot_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`type`) REFERENCES `categorie` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
