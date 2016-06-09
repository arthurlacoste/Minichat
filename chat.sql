-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mer 08 Juin 2016 à 21:51
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `minichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE `minichat` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pseudo` varchar(100) NOT NULL,
  `contenu` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`id`, `date`, `pseudo`, `contenu`) VALUES
(1, '2016-06-09 11:59:53', 'Arthur', 'Ceci est le premier post, vous pouvez en Ã©crire autant que vous le souhaitez.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi efficitur ultrices pretium. Donec placerat purus non porttitor suscipit. Morbi malesuada lacus risus, non consectetur arcu tempus in. Etiam eget cursus mi. Maecenas tempor et purus quis vestibulum. Vivamus mattis blandit mi non ultricies.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;