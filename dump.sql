-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 29 nov. 2018 à 10:27
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
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`) VALUES
(2, 'Computers', 'computer.png'),
(3, 'Electronic', 'electronic.png'),
(1, 'Food', 'food.png'),
(6, 'Garden', 'tool.png'),
(4, 'Sports', 'sport.png'),
(5, 'Toys', 'toy.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(9, 8, 'ORDER', 'BILLED', 850, 19, 16, '2018-11-09 13:31:23', '2018-11-09 13:31:23'),
(10, 8, 'ORDER', 'BILLED', 124.16, 19, 16, '2018-11-09 15:12:29', '2018-11-09 15:12:29'),
(11, 8, 'ORDER', 'BILLED', 60, 19, 16, '2018-11-09 16:09:12', '2018-11-09 16:09:12'),
(12, 8, 'ORDER', 'BILLED', 41.5, 19, 16, '2018-11-09 16:36:07', '2018-11-09 16:36:07'),
(17, 8, 'CART', 'CART', 10, 19, 16, '2018-11-23 15:07:38', '2018-11-23 15:07:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(16, 'Maxime', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-10-26 15:16:00', '2018-10-26 15:16:00'),
(17, 'Maxime', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-10-26 16:44:16', '2018-10-26 16:44:16'),
(18, 'Pierre', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-10-26 17:01:05', '2018-10-26 17:01:05'),
(19, 'Maxime', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-11-08 22:44:38', '2018-11-08 22:44:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(13, 9, 23, 1, 850, '2018-11-09 13:31:42', '2018-11-09 13:31:42'),
(14, 10, 2, 2, 57.08, '2018-11-09 15:12:29', '2018-11-09 15:12:29'),
(15, 10, 14, 1, 10, '2018-11-09 15:21:10', '2018-11-09 15:21:10'),
(16, 11, 4, 1, 60, '2018-11-09 16:09:12', '2018-11-09 16:09:12'),
(18, 12, 16, 6, 6.5, '2018-11-09 16:36:58', '2018-11-09 16:36:58'),
(19, 12, 6, 1, 2.5, '2018-11-09 17:06:25', '2018-11-09 17:06:25'),
(25, 17, 7, 1, 10, '2018-11-23 15:07:38', '2018-11-23 15:07:38');

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categorie_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_longue` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `categorie_name` (`categorie_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description_courte`, `unit_price`, `created_at`, `updated_at`, `categorie_name`, `picture`, `description_longue`) VALUES
(1, 'PC Bureau', 'Pour jouer a call of duty', 46.22, '2018-10-05 15:04:52', '2018-10-05 15:04:52', 'Computers', 'PC.png', 'Important This article contains information about modifying the registry. Before you modify the registry, make sure to back it up and make sure that you understand how to restore the registry if a problem occurs. For information about how to back up, restore, and edit the registry, click the following article number to view the article in the Microsoft Knowledge Base:\r\n256986 Description of the Microsoft Windows Registry'),
(2, 'Coffret Gustatif', 'Un cafe un freedent', 57.08, '2018-10-05 15:04:52', '2018-10-05 15:04:52', 'Food', 'food.png', 'Important This article contains information about modifying the registry. Before you modify the registry, make sure to back it up and make sure that you understand how to restore the registry if a problem occurs. For information about how to back up, restore, and edit the registry, click the following article number to view the article in the Microsoft Knowledge Base:\r\n256986 Description of the Microsoft Windows Registry'),
(3, 'Burger', 'un bon cheese-burger', 7.9, '2018-10-10 11:33:31', '2018-10-10 11:33:31', 'Food', 'burger.png', 'Le premier cheeseburger a ete confectionne entre 1924 et 1926 par un jeune cuisinier nomme Lionel Sternberger, a Pasadena, en Californie. La marque deposee cheeseburger a ete delivree en 1935 a Louis Ballast, travaillant au Humpty Dumpty Drive-In de Denver, au Colorado.\r\n\r\nUn Juicy Lucy est une variete de cheeseburger creee et popularisee a Minneapolis, dans le Minnesota, ou le fromage est place dans la viande crue puis rechauffe jusqu a ce que le fromage fonde.'),
(4, 'Clavier Steelseries', 'Un clavier qui fait du bruit', 60, '2018-10-11 14:32:51', '2018-10-11 14:32:51', 'Computers', 'clavier1.png', 'A keyboard layout is any specific mechanical, visual, or functional arrangement of the keys, legends, or key-meaning associations (respectively) of a computer, typewriter, or other typographic keyboard. Mechanical layout is the placements and keys of a keyboard. Visual layout is the arrangement of the legends (labels, markings, engravings) that appear on the keys of a keyboard. Functional layout is the arrangement of the key-meaning associations, determined in software, of all the keys of a keyboard.'),
(5, 'Clavier LED', 'Un clavier qui brûle les yeux', 20, '2018-10-11 14:32:51', '2018-10-11 14:32:51', 'Computers', 'clavier2.png', 'A keyboard layout is any specific mechanical, visual, or functional arrangement of the keys, legends, or key-meaning associations (respectively) of a computer, typewriter, or other typographic keyboard. Mechanical layout is the placements and keys of a keyboard. Visual layout is the arrangement of the legends (labels, markings, engravings) that appear on the keys of a keyboard. Functional layout is the arrangement of the key-meaning associations, determined in software, of all the keys of a keyboard.'),
(6, 'Chips', 'Des chips comme on Lay s adore', 2.5, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Food', 'chips.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(7, 'Arosoire', 'Pour arroser les plantes', 10, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'arrosoire.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(8, 'Brouette', 'Pour faire des courses (de brouette)', 29.99, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'brouette.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(9, 'Composteur', 'composteur en bois', 110, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'composteur.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(10, 'Caisse a outils', 'marteau', 50, '2018-10-11 14:54:42', '2018-10-11 14:54:42', 'Garden', 'tool.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(11, 'desherbant', 'Enleve les mauvaises herbes', 10, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Garden', 'desherbant.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(12, 'Moniteur', 'archi plat', 120, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Computers', 'ecran.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(13, 'lave-vaisselle', 'c est propre', 182, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Electronic', 'lave-vaisselle.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(14, 'Lego', 'spiderman en lego', 10, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Toys', 'lego.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(15, 'Monopoly', 'achetez pas vous finirez jamais la partie en entier', 25, '2018-10-11 14:44:27', '2018-10-11 14:44:27', 'Toys', 'monopoly.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(16, 'Olive', 'hmmmmmmm', 6.5, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'olive.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(17, 'Playmobil', 'la fmille playmobile', 17.5, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Toys', 'playmobil.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(18, 'Saladiere', 'salade de trucs', 4.8, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'saladiere.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(19, 'sardine', 'fraiches (les sardines)', 3.5, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'sardine.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(20, 'Sauce tomate', 'pour des bonnes pates', 2, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Food', 'sauce tomate.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(21, 'Souris d\'ordinateur', 'avec plein d\'ips', 70, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Computers', 'souris.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(22, 'Velo de course', 'attention aux radars !', 2600, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Sports', 'velo.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(23, 'VTT', 'La boue tout ca', 850, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Sports', 'vtt.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(24, 'Axton', 'produit menager', 9.5, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Garden', 'product.jpg', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\''),
(25, 'Casque moto', 'tu peux faire du vélo aussi avec', 80, '2018-10-11 14:53:24', '2018-10-11 14:53:24', 'Sports', 'sport.png', 'n the old days, ants and cicadas were friends. They were very different. The ants were hardworking, but the cicadas were lazy.\r\n\r\n            In the summer, the ant families were very busy. They knew that in the winter they would have to stay in their anthill. They wanted to have enough food for the whole winter.\r\n\r\n            While the ants worked hard, the cicadas didn\'t do anything. They sang and danced all day. When they were hungry, they could fly to the farm and get something to eat.\r\n\r\n            One day the cicadas were singing and dancing. They saw a long line of ants bringing food to their anthill. The cicadas said, \'Stop, my silly friends. It\'s a very nice day. Come and dance with us.\' The ants said, \'Don\'t you know about winter? If you don\'t work now, you\'ll have trouble later.\'');

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
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_Number` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `email`, `password`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`, `first_name`, `phone_Number`) VALUES
(5, 'Pezeril', 'maxime.pezeril@isen.yncrea.fr', 'test', 19, 16, '2018-10-26 15:16:00', '2018-10-26 15:16:00', 'Maxime', 0),
(7, 'Patard', 'pierre.patard@isen.yncrea.fr', 'pierre', 21, 18, '2018-10-26 17:01:05', '2018-10-26 17:01:05', 'Pierre', 9898),
(8, 'Pezeril', 'maxime.pezeril@free.fr', 'test', 19, 16, '2018-11-08 22:44:38', '2018-11-08 22:44:38', 'Maxime', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(19, 'Maxime', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-10-26 15:16:00', '2018-10-26 15:16:00'),
(20, 'Maxime', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-10-26 16:44:16', '2018-10-26 16:44:16'),
(21, 'Pierre', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-10-26 17:01:05', '2018-10-26 17:01:05'),
(22, 'Maxime', 'Isen', 'Hei', '59', 'Lille', 'France', '2018-11-08 22:44:38', '2018-11-08 22:44:38');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `billing adress` FOREIGN KEY (`billing_adress_id`) REFERENCES `user_addresses` (`id`),
  ADD CONSTRAINT `order adress` FOREIGN KEY (`delivery_adress_id`) REFERENCES `order_addresses` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categorie_name`) REFERENCES `categories` (`name`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`delivery_adress_id`) REFERENCES `order_addresses` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`billing_adress_id`) REFERENCES `user_addresses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
