-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 28 mars 2021 à 20:48
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `predfackers`
--

-- --------------------------------------------------------

--
-- Structure de la table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `id_product` int NOT NULL,
  `category` int NOT NULL,
  `warehouse` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` int NOT NULL,
  `height` double NOT NULL,
  `length` double NOT NULL,
  `width` double NOT NULL,
  `weight` double NOT NULL,
  `mark` varchar(50) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `warehouse` (`warehouse`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`warehouse`) REFERENCES `WAREHOUSE` (`id_warehouse`),
  ADD CONSTRAINT `PRODUCT_ibfk_2` FOREIGN KEY (`category`) REFERENCES `CATEGORY` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
