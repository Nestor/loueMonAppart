-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Dim 20 Août 2017 à 19:38
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `airbnb`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dateDispo` varchar(255) DEFAULT NULL,
  `placeDispo` varchar(255) DEFAULT NULL,
  `price` int(12) DEFAULT '0',
  `idUser` varchar(255) DEFAULT NULL,
  `accept` varchar(255) DEFAULT 'false'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `dateDispo`, `placeDispo`, `price`, `idUser`, `accept`) VALUES
(1, 'Appt 50m2 ', 'ENGLISH SPEAKER. \r\nOne Bedroom apartment with rooftop and inflatable Jacuzzi. \r\nThe flat is new and well located.\r\nFeel free to message me.\r\n\r\nT2 50m2 avec un rooftop terrasse de 25m2 équipée d''un Jacuzzi gonflable idéal pour se relaxer sous le soleil de ', '2017-08-18', '2', 55, '1', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(12) NOT NULL,
  `type` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(12) NOT NULL,
  `idAnnonce` int(12) NOT NULL,
  `linkImage` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `idAnnonce`, `linkImage`) VALUES
(1, 1, 'http://127.0.0.1:8888/airbnb/uploads/86d0db9b-7a05-4a1b-ab56-7c807923b8e9.jpg'),
(2, 1, 'http://127.0.0.1:8888/airbnb/uploads/afa0fe17-902f-424e-a71a-1e4573113a75.jpg'),
(3, 1, 'http://127.0.0.1:8888/airbnb/uploads/cca7fe3c-28c9-432f-aff9-25d1132ee0b2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `images_url`
--

CREATE TABLE IF NOT EXISTS `images_url` (
  `id` int(12) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `link_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(12) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `dateInscription` varchar(255) DEFAULT NULL,
  `proprietaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `grade`, `dateInscription`, `proprietaire`) VALUES
(1, 'zoukilama', '353d196605b2bb5890bfb1b3aa0c3cccfdddd30bd033e22ae348aeb5660fc2140aec35850c4da997', 'zouki.dev@gmail.com', 'user', '18/08/2017 à 18:47', 'true');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images_url`
--
ALTER TABLE `images_url`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
