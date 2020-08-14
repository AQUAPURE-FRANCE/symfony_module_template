-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 14 Août 2020 à 10:04
-- Version du serveur :  5.7.31-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prestashop`
--

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat`
--

DROP TABLE IF EXISTS `ps_chat`;
CREATE TABLE `ps_chat` (
  `id_chat` int(11) NOT NULL,
  `id_chat_user` int(11) NOT NULL,
  `id_chat_employee` int(11) DEFAULT NULL,
  `id_chat_message` int(11) NOT NULL,
  `is_user_sender` tinyint(1) NOT NULL,
  `has_response` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ps_chat` (
  `id_chat`,
  `id_chat_user`,
  `id_chat_employee`,
  `id_chat_message`,
  `is_user_sender`,
  `has_response`,
  `created_at`
) VALUES (1, 1, 1, 1, 1, 1, '2020-08-14 10:13:36'),
(2, 2, 1, 2, 1, 1, '2020-08-14 10:33:36'),
(3, 3, 1, 3, 1, 1, '2020-08-14 11:33:36');

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat_avatar`
--

DROP TABLE IF EXISTS `ps_chat_avatar`;
CREATE TABLE `ps_chat_avatar` (
  `id_chat_avatar` int(11) NOT NULL,
  `name` varchar(225) NOT NULL DEFAULT 'default.png',
  `is_default` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ps_chat_avatar` (
  `id_chat_avatar`,
  `name`,
  `is_default`
) VALUES (1, 'default.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat_blacklist`
--

DROP TABLE IF EXISTS `ps_chat_blacklist`;
CREATE TABLE `ps_chat_blacklist` (
  `id_chat_blacklist` int(11) NOT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ps_chat_blacklist` (
  `id_chat_blacklist`,
  `text`
) VALUES (1, 'mot interdit');

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat_employee`
--

DROP TABLE IF EXISTS `ps_chat_employee`;
CREATE TABLE `ps_chat_employee` (
  `id_chat_employee` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `id_chat_avatar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ps_chat_employee` (
  `id_chat_employee`,
  `id_employee`,
  `id_chat_avatar`
) VALUES (1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat_message`
--

DROP TABLE IF EXISTS `ps_chat_message`;
CREATE TABLE `ps_chat_message` (
  `id_chat_message` int(11) NOT NULL,
  `text` text NOT NULL,
  `id_chat_subject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ps_chat_message` (
  `id_chat_message`,
  `text`,
  `id_chat_subject`
) VALUES (1, 'corps du message', 1),
(2, 'corps du message 2', 2),
(3, 'corps du message 3', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat_subject`
--

DROP TABLE IF EXISTS `ps_chat_subject`;
CREATE TABLE `ps_chat_subject` (
  `id_chat_subject` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ps_chat_subject` (
  `id_chat_subject`,
  `name`
) VALUES (1, 'sujet 1'),
    (2, 'sujet 2'),
    (3, 'sujet 3');

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat_to_faq`
--

DROP TABLE IF EXISTS `ps_chat_to_faq`;
CREATE TABLE `ps_chat_to_faq` (
  `id_chat_to_faq` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `is_relevant` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ps_chat_to_faq` (
  `id_chat_to_faq`,
  `id_chat`,
  `is_relevant`
) VALUES (1, 1, 0),
(2, 2, 0),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ps_chat_user`
--

DROP TABLE IF EXISTS `ps_chat_user`;
CREATE TABLE `ps_chat_user` (
  `id_chat_user` int(11) NOT NULL,
  `id_guest` int(11) NOT NULL DEFAULT '1',
  `id_customer` int(11) DEFAULT NULL,
  `id_chat_avatar` int(11) DEFAULT NULL,
  `firstname` varchar(225) DEFAULT NULL,
  `lastname` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `ps_chat_user` (
  `id_chat_user`,
  `id_guest`,
  `id_customer`,
  `id_chat_avatar`,
  `firstname`,
  `lastname`,
  `email`
) VALUES (1, 1, 0, 1, '', '', ''),
(2, 2, 0, 1, '', '', ''),
(3, 3, 0, 1, '', '', ''),
(4, 3, 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ps_chat`
--
ALTER TABLE `ps_chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Index pour la table `ps_chat_avatar`
--
ALTER TABLE `ps_chat_avatar`
  ADD PRIMARY KEY (`id_chat_avatar`);

--
-- Index pour la table `ps_chat_blacklist`
--
ALTER TABLE `ps_chat_blacklist`
  ADD PRIMARY KEY (`id_chat_blacklist`);

--
-- Index pour la table `ps_chat_employee`
--
ALTER TABLE `ps_chat_employee`
  ADD PRIMARY KEY (`id_chat_employee`);

--
-- Index pour la table `ps_chat_message`
--
ALTER TABLE `ps_chat_message`
  ADD PRIMARY KEY (`id_chat_message`);

--
-- Index pour la table `ps_chat_subject`
--
ALTER TABLE `ps_chat_subject`
  ADD PRIMARY KEY (`id_chat_subject`);

--
-- Index pour la table `ps_chat_to_faq`
--
ALTER TABLE `ps_chat_to_faq`
  ADD PRIMARY KEY (`id_chat_to_faq`);

--
-- Index pour la table `ps_chat_user`
--
ALTER TABLE `ps_chat_user`
  ADD PRIMARY KEY (`id_chat_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ps_chat`
--
ALTER TABLE `ps_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ps_chat_avatar`
--
ALTER TABLE `ps_chat_avatar`
  MODIFY `id_chat_avatar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ps_chat_blacklist`
--
ALTER TABLE `ps_chat_blacklist`
  MODIFY `id_chat_blacklist` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ps_chat_employee`
--
ALTER TABLE `ps_chat_employee`
  MODIFY `id_chat_employee` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ps_chat_message`
--
ALTER TABLE `ps_chat_message`
  MODIFY `id_chat_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ps_chat_subject`
--
ALTER TABLE `ps_chat_subject`
  MODIFY `id_chat_subject` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ps_chat_to_faq`
--
ALTER TABLE `ps_chat_to_faq`
  MODIFY `id_chat_to_faq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ps_chat_user`
--
ALTER TABLE `ps_chat_user`
  MODIFY `id_chat_user` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
