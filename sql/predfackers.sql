-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2021 at 09:04 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `predfackers`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADDRESS`
--

CREATE TABLE `ADDRESS` (
  `id_address` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `district` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BUY`
--

CREATE TABLE `BUY` (
  `id_buy` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CALCULATEDPRICE`
--

CREATE TABLE `CALCULATEDPRICE` (
  `id_calculatedprice` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mark` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CATEGORY`
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
-- Table structure for table `MARK`
--

CREATE TABLE `MARK` (
  `id_mark` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MARK`
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
-- Table structure for table `PAYMENT`
--

CREATE TABLE `PAYMENT` (
  `id_payment` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `cryptogram` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `date_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PHOTO`
--

CREATE TABLE `PHOTO` (
  `id_photo` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `id_product` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `cardsize` int(11) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PROPOSE`
--

CREATE TABLE `PROPOSE` (
  `id_propose` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TOKEN`
--

CREATE TABLE `TOKEN` (
  `id_token` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `VERIFACTION`
--

CREATE TABLE `VERIFACTION` (
  `id_verification` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `comment` varchar(400) NOT NULL,
  `works` tinyint(1) NOT NULL,
  `price_put` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `WAREHOUSE`
--

CREATE TABLE `WAREHOUSE` (
  `id_warehouse` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `open` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `BUY`
--
ALTER TABLE `BUY`
  ADD KEY `user` (`user`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `CALCULATEDPRICE`
--
ALTER TABLE `CALCULATEDPRICE`
  ADD PRIMARY KEY (`id_calculatedprice`),
  ADD KEY `category` (`category`),
  ADD KEY `mark` (`mark`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `MARK`
--
ALTER TABLE `MARK`
  ADD PRIMARY KEY (`id_mark`);

--
-- Indexes for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `PHOTO`
--
ALTER TABLE `PHOTO`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `warehouse` (`warehouse`),
  ADD KEY `category` (`category`),
  ADD KEY `mark` (`mark`);

--
-- Indexes for table `PROPOSE`
--
ALTER TABLE `PROPOSE`
  ADD KEY `user` (`user`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `TOKEN`
--
ALTER TABLE `TOKEN`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `VERIFACTION`
--
ALTER TABLE `VERIFACTION`
  ADD PRIMARY KEY (`id_verification`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `WAREHOUSE`
--
ALTER TABLE `WAREHOUSE`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CALCULATEDPRICE`
--
ALTER TABLE `CALCULATEDPRICE`
  MODIFY `id_calculatedprice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `MARK`
--
ALTER TABLE `MARK`
  MODIFY `id_mark` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PHOTO`
--
ALTER TABLE `PHOTO`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;
