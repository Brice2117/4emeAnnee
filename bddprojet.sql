-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 oct. 2018 à 15:06
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`) VALUES
(1, 'Food', 'food.png'),
(2, 'Computers', 'computer.png'),
(3, 'Electronic', 'electronic.png'),
(4, 'Sports', 'sport.png'),
(5, 'Toys', 'toy.png'),
(6, 'Garden', 'tool.png');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`),
  KEY `IDX_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'CART', 'CART', 149.52, 1, 2, '2018-10-05 15:04:53', '2018-10-05 15:04:53'),
(3, 1, 'ORDER', 'BILLED', 100, 3, 4, '2018-10-05 15:04:53', '2018-10-05 15:04:53');

-- --------------------------------------------------------

--
-- Structure de la table `order_addresses`
--

DROP TABLE IF EXISTS `order_addresses`;
CREATE TABLE IF NOT EXISTS `order_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:52', '2018-10-05 15:04:52'),
(3, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:52', '2018-10-05 15:04:52'),
(4, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:53', '2018-10-05 15:04:53'),
(5, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:53', '2018-10-05 15:04:53');

-- --------------------------------------------------------

--
-- Structure de la table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_order_product` (`order_id`),
  KEY `IDX_product_order` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 57.08, '2018-10-05 15:04:53', '2018-10-05 15:04:53'),
(3, 1, 2, 3, 46.22, '2018-10-05 15:04:53', '2018-10-05 15:04:53'),
(4, 2, 1, 2, 50, '2018-10-05 15:04:53', '2018-10-05 15:04:53');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_courte` longtext COLLATE utf8_unicode_ci,
  `unit_price` double DEFAULT NULL,
  `range_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categorie_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_longue` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_product_range` (`range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description_courte`, `unit_price`, `range_id`, `created_at`, `updated_at`, `categorie_name`, `picture`, `description_longue`) VALUES
(1, 'PC Bureau', 'Pour jouer a call of duty', 46.22, 3, '2018-10-05 15:04:52', '2018-10-05 15:04:52', 'Computers', 'PC.png', 'Important This article contains information about modifying the registry. Before you modify the registry, make sure to back it up and make sure that you understand how to restore the registry if a problem occurs. For information about how to back up, restore, and edit the registry, click the following article number to view the article in the Microsoft Knowledge Base:\r\n256986 Description of the Microsoft Windows Registry'),
(2, 'Coffret Gustatif', 'Un cafe un freedent', 57.08, 2, '2018-10-05 15:04:52', '2018-10-05 15:04:52', 'Food', 'food.png', 'Important This article contains information about modifying the registry. Before you modify the registry, make sure to back it up and make sure that you understand how to restore the registry if a problem occurs. For information about how to back up, restore, and edit the registry, click the following article number to view the article in the Microsoft Knowledge Base:\r\n256986 Description of the Microsoft Windows Registry'),
(3, 'Burger', 'un bon cheese-burger', 7.9, NULL, '2018-10-10 11:33:31', '2018-10-10 11:33:31', 'Food', 'burger.png', 'Le premier cheeseburger a ete confectionne entre 1924 et 1926 par un jeune cuisinier nomme Lionel Sternberger, a Pasadena, en Californie. La marque deposee cheeseburger a ete delivree en 1935 a Louis Ballast, travaillant au Humpty Dumpty Drive-In de Denver, au Colorado.\r\n\r\nUn Juicy Lucy est une variete de cheeseburger creee et popularisee a Minneapolis, dans le Minnesota, ou le fromage est place dans la viande crue puis rechauffe jusqu a ce que le fromage fonde.'),
(4, 'Clavier Steelseries', 'Un clavier qui fait du bruit', 60, NULL, '2018-10-11 14:32:51', '2018-10-11 14:32:51', 'Computers', 'clavier1.png', 'A keyboard layout is any specific mechanical, visual, or functional arrangement of the keys, legends, or key-meaning associations (respectively) of a computer, typewriter, or other typographic keyboard. Mechanical layout is the placements and keys of a keyboard. Visual layout is the arrangement of the legends (labels, markings, engravings) that appear on the keys of a keyboard. Functional layout is the arrangement of the key-meaning associations, determined in software, of all the keys of a keyboard.'),
(5, 'Clavier LED', 'Un clavier qui brûle les yeux', 20, NULL, '2018-10-11 14:32:51', '2018-10-11 14:32:51', 'Computers', 'clavier2.png', 'A keyboard layout is any specific mechanical, visual, or functional arrangement of the keys, legends, or key-meaning associations (respectively) of a computer, typewriter, or other typographic keyboard. Mechanical layout is the placements and keys of a keyboard. Visual layout is the arrangement of the legends (labels, markings, engravings) that appear on the keys of a keyboard. Functional layout is the arrangement of the key-meaning associations, determined in software, of all the keys of a keyboard.'),
(6, 'Chips', 'Des chips comme on Lay s adore', 2.5, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Food', 'chips.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(7, 'Arosoire', 'Pour arroser les plantes', 10, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'arrosoire.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(8, 'Brouette', 'Pour faire des courses (de brouette)', 29.99, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'brouette.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(9, 'Composteur', 'composteur en bois', 110, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'composteur.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(10, 'Caisse a outils', 'marteau', 50, NULL, '2018-10-11 14:54:42', '2018-10-11 14:54:42', 'Garden', 'tool.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(11, 'desherbant', 'Enleve les mauvaises herbes', 10, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'desherbant.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(12, 'Moniteur', 'archi plat', 120, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Computers', 'ecran.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(13, 'lave-vaisselle', 'c est propre', 182, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Electronic', 'lave-vaisselle.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(14, 'Lego', 'spiderman en lego', 10, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Toys', 'lego.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(15, 'Monopoly', 'achetez pas vous finirez jamais la partie en entier', 25, NULL, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Toys', 'monopoly.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(16, 'Olive', 'hmmmmmmm', 6.5, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'olive.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(17, 'Playmobil', 'la fmille playmobile', 17.5, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Toys', 'playmobil.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(18, 'Saladiere', 'salade de trucs', 4.8, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'saladiere.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(19, 'sardine', 'fraiches (les sardines)', 3.5, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'sardine.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(20, 'Sauce tomate', 'pour des bonnes pates', 2, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'sauce tomate.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(21, 'Souris d\'ordinateur', 'avec plein d\'ips', 70, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Computers', 'souris.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(22, 'Velo de course', 'attention aux radars !', 2600, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Sports', 'velo.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(23, 'VTT', 'La boue tout ca', 850, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Sports', 'vtt.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(24, 'Axton', 'produit menager', 9.5, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Garden', 'product.jpg', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(25, 'Casque moto', 'tu peux faire du vélo aussi avec', 80, NULL, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Sports', 'sport.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\'');

-- --------------------------------------------------------

--
-- Structure de la table `ranges`
--

DROP TABLE IF EXISTS `ranges`;
CREATE TABLE IF NOT EXISTS `ranges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_range_parent` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ranges`
--

INSERT INTO `ranges` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Main range', NULL, '2018-10-05 15:04:52', '2018-10-05 15:04:52'),
(3, 'Second range', 1, '2018-10-05 15:04:52', '2018-10-05 15:04:52'),
(4, 'Third range', 1, '2018-10-05 15:04:52', '2018-10-05 15:04:52');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` int(11) NOT NULL,
  `phone_Number` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `email`, `password`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`, `first_name`, `phone_Number`) VALUES
(2, 'Fred Eric', 'fred.eric@example.com', 'password', 1, 2, '2018-10-05 15:04:52', '2018-10-05 15:04:52', 0, 0),
(3, 'Frederic', 'frederic@example.com', 'password', 3, 4, '2018-10-05 15:04:52', '2018-10-05 15:04:52', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:52', '2018-10-05 15:04:52'),
(3, 'Eric Fred', '12 route Pleine', 'chez mon oncle', '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:52', '2018-10-05 15:04:52'),
(4, 'Frederic', '239 rue de Douai', NULL, '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:52', '2018-10-05 15:04:52'),
(5, 'Epicfred', '3 sans idée', 'oui oui', '59000', 'Lille', 'FRANCE', '2018-10-05 15:04:52', '2018-10-05 15:04:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
