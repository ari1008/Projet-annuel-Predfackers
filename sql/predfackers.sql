-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : sam. 08 mai 2021 à 14:49
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

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
  `description` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB ;

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
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `ADDRESS`
--

INSERT INTO `ADDRESS` (`id_address`, `user`, `number`, `street`, `city`, `postal_code`, `district`, `region`, `country`, `validate`) VALUES
(1, 9, 1, ' Place d\'Armes', 'Versailles', 78000, 'Notre-Dame', 'Île-de-France', 'France', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ASSOCIATION`
--

CREATE TABLE `ASSOCIATION` (
  `id_association` int NOT NULL,
  `photo` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text  NOT NULL,
  `validate` tinyint(1) NOT NULL,
  `token` int NOT NULL
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `CALCULATEDPRICE`
--

CREATE TABLE `CALCULATEDPRICE` (
  `id_calculatedprice` int NOT NULL,
  `category` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `mark` int NOT NULL,
  `price` int NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `CALCULATEDPRICE`
--

INSERT INTO `CALCULATEDPRICE` (`id_calculatedprice`, `category`, `name`, `mark`, `price`, `photo`) VALUES
(2, 2, 'Iphone X', 3, 350, 'IphoneX.jpg'),
(3, 5, 'Xiaomi mi notebook pro', 12, 900, 'Xiaomi-notebook-pro.jpg'),
(4, 3, 'Samsung galaxy buds', 8, 90, 'Samsung-galaxy-buds.jpg'),
(5, 4, 'Apple Watch (Series 4)', 3, 233, 'Apple-Watch(Series 4).jpg'),
(6, 6, 'PS4 Pro', 9, 250, 'sony-ps4-pro.jpg'),
(7, 8, 'Sony BRAVIA 55XH9505', 9, 999, 'Sony-BRAVIA-55XH9505.jpg'),
(8, 2, 'Sony Ericsson Xperia Play', 10, 90, 'Xperia-Play.jpg'),
(9, 2, 'Vivo X51', 11, 550, 'vivo-X51.jpg'),
(10, 5, 'HP Pavilion 15-eg0003nf', 6, 713, 'Pavilion-15-eg0003nf.jpg'),
(11, 2, 'Google Pixel 5', 5, 629, 'Pixel5.jpg'),
(12, 3, 'Huawei Freebuds Pro', 7, 123, 'Freebuds-pro.jpg'),
(13, 8, 'Xiaomi Mi Tv 4S', 12, 389, 'MI-Tv-4S.jpg'),
(14, 7, 'Herman Miller Aeron', 13, 1870, 'Herman-Miller-Aeron.jpg'),
(15, 6, 'Sony PSP 3004', 9, 102, 'PSP-3004.jpg'),
(16, 4, 'Samsung Galaxy Watch3', 8, 257, 'Galaxy-Watch3.jpg'),
(17, 4, 'HUAWEI WATCH GT 2 Pro', 7, 210, 'WATCH-GT-2-Pro.jpg'),
(18, 7, 'Noblechairs Epic', 14, 362, 'Noblechairs-Epic.jpg'),
(19, 7, 'QUERSUS EVOS 301', 15, 324, 'quersus-evos301.png');

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `id_category` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `CATEGORY`
--

INSERT INTO `CATEGORY` (`id_category`, `name`, `photo`) VALUES
(2, 'Smartphone', '2smartphone.png'),
(3, 'Ecouteurs', 'ecouteurs.png'),
(4, 'Montre connecté', 'montre_connect.png'),
(5, 'Pc portable', 'pc_portable.png'),
(6, 'Console', 'iconconsole.png'),
(7, 'Mobilier', 'iconmobilier.png'),
(8, 'Télévision', 'icontelevision.png');

-- --------------------------------------------------------

--
-- Structure de la table `MARK`
--

CREATE TABLE `MARK` (
  `id_mark` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `MARK`
--

INSERT INTO `MARK` (`id_mark`, `name`, `photo`) VALUES
(3, 'Apple', '4apple.png'),
(5, 'Google', 'icongoogle.png'),
(6, 'HP', 'iconhp.png'),
(7, 'Huawei', 'iconhuawei.png'),
(8, 'Samsung', 'iconsamsung.png'),
(9, 'Sony', 'iconsony.png'),
(10, 'Sony Ericsson', 'iconsonyericsson.png'),
(11, 'Vivo', 'iconvivo.png'),
(12, 'Xiaomi', 'iconxiaomi.png');

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
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `PHOTO`
--

CREATE TABLE `PHOTO` (
  `id_photo` int NOT NULL,
  `product` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `id_product` int NOT NULL,
  `category` int NOT NULL,
  `warehouse` int DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `userpropose` int DEFAULT NULL,
  `userbuyer` int DEFAULT NULL,
  `description` varchar(400) NOT NULL,
  `price` int NOT NULL,
  `mark` int NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `PRODUCT`
--

INSERT INTO `PRODUCT` (`id_product`, `category`, `warehouse`, `name`, `userpropose`, `userbuyer`, `description`, `price`, `mark`, `date_start`, `date_end`, `state`, `validate`) VALUES
(63, 2, NULL, 'test', 9, 10, 'très beau produit', 500, 5, '2021-05-08', NULL, '2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `PROJECT`
--

CREATE TABLE `PROJECT` (
  `id_project` int NOT NULL,
  `association` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text  NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `TOKEN`
--

CREATE TABLE `TOKEN` (
  `id_token` int NOT NULL,
  `user` int NOT NULL,
  `number` int NOT NULL
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `id_user` int NOT NULL,
  `photo` int DEFAULT NULL,
  `last_name` varchar(50)  DEFAULT NULL,
  `first_name` varchar(50)  DEFAULT NULL,
  `email` varchar(240) NOT NULL,
  `username` varchar(100)  DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `password` varchar(100)  NOT NULL,
  `language` varchar(10)  DEFAULT NULL,
  `association` int DEFAULT NULL,
  `validate` tinyint(1) DEFAULT NULL,
  `type` varchar(50)  DEFAULT NULL
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`id_user`, `photo`, `last_name`, `first_name`, `email`, `username`, `date_birth`, `password`, `language`, `association`, `validate`, `type`) VALUES
(8, NULL, NULL, NULL, 'aristide.ff@gmail.com', 'ari1008', NULL, '$2y$10$WIw2WSbrUJp1QU7uwC5o7ewKtMikJWVKKAgKgBnB98Ve0EjU8F1xC', NULL, NULL, NULL, '0'),
(9, NULL, 'Fumo', 'Aristide', 'fumo.aristide@gmail.com', 'ari', '2001-07-28', '$2y$10$tKP6GXIAFOPo4GEd8mPW2OPTTMSywKPJxKgnI4yvMTPzCYY9h/hi6', NULL, NULL, NULL, '1'),
(10, NULL, 'Bongiorno', 'Vivien', 'vivien@test.com', 'vivien100', '2000-05-04', 'test', NULL, NULL, NULL, '1'),
(11, NULL, 'test', 'test', 'modlaminecraft@gmail.com', 'ari', '2001-05-16', '$2y$10$tKP6GXIAFOPo4GEd8mPW2OPTTMSywKPJxKgnI4yvMTPzCYY9h/hi6', 'français', NULL, 1, '2');

-- --------------------------------------------------------

--
-- Structure de la table `VERIFACTION`
--

CREATE TABLE `VERIFACTION` (
  `id_verification` int NOT NULL,
  `product` int NOT NULL,
  `newprice` int DEFAULT NULL,
  `validate` tinyint NOT NULL
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `WAREHOUSE`
--

CREATE TABLE `WAREHOUSE` (
  `id_warehouse` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_code` int NOT NULL,
  `district` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `open` tinyint(1) NOT NULL
) ENGINE=InnoDB ;

--
-- Déchargement des données de la table `WAREHOUSE`
--

INSERT INTO `WAREHOUSE` (`id_warehouse`, `name`, `number`, `street`, `city`, `postal_code`, `district`, `region`, `country`, `open`) VALUES
(1, 'Paris', 242, 'Faubourg Saint-Antoine', 'Paris', 75012, '12', 'Île-de-France', 'France', 1),
(2, 'Nante', 5, ' boulevard de la Beaujoire', 'Nante', 44300, 'Erdre', 'Loire', 'France', 1);

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
-- Index pour la table `CALCULATEDPRICE`
--
ALTER TABLE `CALCULATEDPRICE`
  ADD PRIMARY KEY (`id_calculatedprice`),
  ADD KEY `category` (`category`),
  ADD KEY `mark` (`mark`);

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
  ADD KEY `mark` (`mark`),
  ADD KEY `userpropose` (`userpropose`),
  ADD KEY `userbuyer` (`userbuyer`);

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
  ADD PRIMARY KEY (`id_user`);

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
-- AUTO_INCREMENT pour la table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  MODIFY `id_address` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `CALCULATEDPRICE`
--
ALTER TABLE `CALCULATEDPRICE`
  MODIFY `id_calculatedprice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `MARK`
--
ALTER TABLE `MARK`
  MODIFY `id_mark` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  MODIFY `id_payment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PHOTO`
--
ALTER TABLE `PHOTO`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `VERIFACTION`
--
ALTER TABLE `VERIFACTION`
  MODIFY `id_verification` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `WAREHOUSE`
--
ALTER TABLE `WAREHOUSE`
  MODIFY `id_warehouse` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`userpropose`) REFERENCES `USER` (`id_user`),
  ADD CONSTRAINT `PRODUCT_ibfk_2` FOREIGN KEY (`userbuyer`) REFERENCES `USER` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
