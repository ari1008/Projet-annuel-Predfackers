-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : sam. 03 avr. 2021 à 18:01
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
-- Structure de la table `ACTION`
--

CREATE TABLE `ACTION` (
  `id_action` int NOT NULL,
  `project` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ADDRESS`
--

CREATE TABLE `ADDRESS` (
  `id_address` int NOT NULL,
  `user` int NOT NULL,
  `number` int NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_code` int NOT NULL,
  `district` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ASSOCIATION`
--

CREATE TABLE `ASSOCIATION` (
  `id_association` int NOT NULL,
  `photo` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `validate` tinyint(1) NOT NULL,
  `token` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `BUY`
--

CREATE TABLE `BUY` (
  `id_buy` int NOT NULL,
  `user` int NOT NULL,
  `product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `CALCULATEDPRICE`
--

CREATE TABLE `CALCULATEDPRICE` (
  `id_calculatedprice` int NOT NULL,
  `category` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `mark` varchar(100) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `id_category` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MARK`
--

CREATE TABLE `MARK` (
  `id_mark` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PAYMENT`
--

CREATE TABLE `PAYMENT` (
  `id_payment` int NOT NULL,
  `user` int NOT NULL,
  `card` int NOT NULL,
  `cryptogram` int NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `date_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PHOTO`
--

CREATE TABLE `PHOTO` (
  `id_photo` int NOT NULL,
  `product` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `id_product` int NOT NULL,
  `category` int NOT NULL,
  `warehouse` int DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` int NOT NULL,
  `mark` int NOT NULL,
  `cardsize` int NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PROJECT`
--

CREATE TABLE `PROJECT` (
  `id_project` int NOT NULL,
  `association` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PROPOSE`
--

CREATE TABLE `PROPOSE` (
  `id_propose` int NOT NULL,
  `user` int NOT NULL,
  `product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TOKEN`
--

CREATE TABLE `TOKEN` (
  `id_token` int NOT NULL,
  `user` int NOT NULL,
  `number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `id_user` int NOT NULL,
  `photo` int DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(240) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `language` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `association` int DEFAULT NULL,
  `validate` tinyint(1) DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`id_user`, `photo`, `last_name`, `first_name`, `email`, `username`, `date_birth`, `password`, `language`, `association`, `validate`, `type`) VALUES
(8, NULL, NULL, NULL, 'aristide.ff@gmail.com', 'ari1008', NULL, '$2y$10$WIw2WSbrUJp1QU7uwC5o7ewKtMikJWVKKAgKgBnB98Ve0EjU8F1xC', NULL, NULL, NULL, '0'),
(9, NULL, NULL, NULL, 'aristide@gmail.com', 'ari', NULL, '$2y$10$tKP6GXIAFOPo4GEd8mPW2OPTTMSywKPJxKgnI4yvMTPzCYY9h/hi6', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Structure de la table `VERIFACTION`
--

CREATE TABLE `VERIFACTION` (
  `id_verification` int NOT NULL,
  `product` int NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `comment` varchar(400) NOT NULL,
  `works` tinyint(1) NOT NULL,
  `price_put` int NOT NULL,
  `note` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WAREHOUSE`
--

CREATE TABLE `WAREHOUSE` (
  `id_warehouse` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `open` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ACTION`
--
ALTER TABLE `ACTION`
  ADD PRIMARY KEY (`id_action`),
  ADD KEY `project` (`project`);

--
-- Index pour la table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `ASSOCIATION`
--
ALTER TABLE `ASSOCIATION`
  ADD PRIMARY KEY (`id_association`);

--
-- Index pour la table `BUY`
--
ALTER TABLE `BUY`
  ADD KEY `user` (`user`),
  ADD KEY `product` (`product`);

--
-- Index pour la table `CALCULATEDPRICE`
--
ALTER TABLE `CALCULATEDPRICE`
  ADD KEY `category` (`category`);

--
-- Index pour la table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `MARK`
--
ALTER TABLE `MARK`
  ADD PRIMARY KEY (`id_mark`);

--
-- Index pour la table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `PHOTO`
--
ALTER TABLE `PHOTO`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `product` (`product`);

--
-- Index pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `warehouse` (`warehouse`),
  ADD KEY `category` (`category`),
  ADD KEY `mark` (`mark`);

--
-- Index pour la table `PROJECT`
--
ALTER TABLE `PROJECT`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `association` (`association`);

--
-- Index pour la table `PROPOSE`
--
ALTER TABLE `PROPOSE`
  ADD KEY `user` (`user`),
  ADD KEY `product` (`product`);

--
-- Index pour la table `TOKEN`
--
ALTER TABLE `TOKEN`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `association` (`association`);

--
-- Index pour la table `VERIFACTION`
--
ALTER TABLE `VERIFACTION`
  ADD PRIMARY KEY (`id_verification`),
  ADD KEY `product` (`product`);

--
-- Index pour la table `WAREHOUSE`
--
ALTER TABLE `WAREHOUSE`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ACTION`
--
ALTER TABLE `ACTION`
  MODIFY `id_action` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  MODIFY `id_address` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ASSOCIATION`
--
ALTER TABLE `ASSOCIATION`
  MODIFY `id_association` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `MARK`
--
ALTER TABLE `MARK`
  MODIFY `id_mark` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  MODIFY `id_payment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PHOTO`
--
ALTER TABLE `PHOTO`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PROJECT`
--
ALTER TABLE `PROJECT`
  MODIFY `id_project` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TOKEN`
--
ALTER TABLE `TOKEN`
  MODIFY `id_token` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `VERIFACTION`
--
ALTER TABLE `VERIFACTION`
  MODIFY `id_verification` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WAREHOUSE`
--
ALTER TABLE `WAREHOUSE`
  MODIFY `id_warehouse` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ACTION`
--
ALTER TABLE `ACTION`
  ADD CONSTRAINT `ACTION_ibfk_1` FOREIGN KEY (`project`) REFERENCES `PROJECT` (`id_project`);

--
-- Contraintes pour la table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD CONSTRAINT `ADDRESS_ibfk_1` FOREIGN KEY (`user`) REFERENCES `USER` (`id_user`);

--
-- Contraintes pour la table `BUY`
--
ALTER TABLE `BUY`
  ADD CONSTRAINT `BUY_ibfk_1` FOREIGN KEY (`user`) REFERENCES `USER` (`id_user`),
  ADD CONSTRAINT `BUY_ibfk_2` FOREIGN KEY (`product`) REFERENCES `PRODUCT` (`id_product`);

--
-- Contraintes pour la table `CALCULATEDPRICE`
--
ALTER TABLE `CALCULATEDPRICE`
  ADD CONSTRAINT `CALCULATEDPRICE_ibfk_1` FOREIGN KEY (`category`) REFERENCES `CATEGORY` (`id_category`);

--
-- Contraintes pour la table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD CONSTRAINT `PAYMENT_ibfk_1` FOREIGN KEY (`user`) REFERENCES `USER` (`id_user`);

--
-- Contraintes pour la table `PHOTO`
--
ALTER TABLE `PHOTO`
  ADD CONSTRAINT `PHOTO_ibfk_1` FOREIGN KEY (`product`) REFERENCES `PRODUCT` (`id_product`);

--
-- Contraintes pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`warehouse`) REFERENCES `WAREHOUSE` (`id_warehouse`),
  ADD CONSTRAINT `PRODUCT_ibfk_2` FOREIGN KEY (`category`) REFERENCES `CATEGORY` (`id_category`),
  ADD CONSTRAINT `PRODUCT_ibfk_3` FOREIGN KEY (`mark`) REFERENCES `MARK` (`id_mark`);

--
-- Contraintes pour la table `PROJECT`
--
ALTER TABLE `PROJECT`
  ADD CONSTRAINT `PROJECT_ibfk_1` FOREIGN KEY (`association`) REFERENCES `ASSOCIATION` (`id_association`);

--
-- Contraintes pour la table `PROPOSE`
--
ALTER TABLE `PROPOSE`
  ADD CONSTRAINT `PROPOSE_ibfk_1` FOREIGN KEY (`user`) REFERENCES `USER` (`id_user`),
  ADD CONSTRAINT `PROPOSE_ibfk_2` FOREIGN KEY (`product`) REFERENCES `PRODUCT` (`id_product`);

--
-- Contraintes pour la table `TOKEN`
--
ALTER TABLE `TOKEN`
  ADD CONSTRAINT `TOKEN_ibfk_1` FOREIGN KEY (`user`) REFERENCES `USER` (`id_user`);

--
-- Contraintes pour la table `USER`
--
ALTER TABLE `USER`
  ADD CONSTRAINT `USER_ibfk_1` FOREIGN KEY (`association`) REFERENCES `ASSOCIATION` (`id_association`);

--
-- Contraintes pour la table `VERIFACTION`
--
ALTER TABLE `VERIFACTION`
  ADD CONSTRAINT `VERIFACTION_ibfk_1` FOREIGN KEY (`product`) REFERENCES `PRODUCT` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
