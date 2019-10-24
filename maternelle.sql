-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Octobre 2019 à 17:03
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `maternelle`
--

-- --------------------------------------------------------

--
-- Structure de la table `echange`
--

CREATE TABLE IF NOT EXISTS `echange` (
  `Id_echange` int(11) NOT NULL,
  `id_donneur` int(11) NOT NULL,
  `id_recepteur` int(11) NOT NULL,
  `date_echange` date NOT NULL,
  `Id_enfant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE IF NOT EXISTS `enfant` (
  `Id_enfant` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `solde` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enfant`
--

INSERT INTO `enfant` (`Id_enfant`, `Nom`, `Prenom`, `mdp`, `solde`) VALUES
(1, 'Maria', 'Raphaël', '123456', 100),
(2, 'Chavanne', 'Marie-Camille', '123456', 100);

--
-- Déclencheurs `enfant`
--
DELIMITER $$
CREATE TRIGGER `after_insert_enfant` BEFORE INSERT ON `enfant`
 FOR EACH ROW BEGIN
    set new.solde = 100;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `ID_Objet` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prix` int(5) NOT NULL,
  `Img` varchar(50) NOT NULL,
  `Id_enfant` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`ID_Objet`, `Nom`, `Prix`, `Img`, `Id_enfant`) VALUES
(1, 'Ballon', 10, '/img/ballon_1.png', 1),
(2, 'Yo-Yo', 15, '/img/yoyo_2.png', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `echange`
--
ALTER TABLE `echange`
  ADD PRIMARY KEY (`Id_echange`),
  ADD KEY `Echange_Enfant0_FK` (`Id_enfant`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`Id_enfant`);

--
-- Index pour la table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`ID_Objet`),
  ADD KEY `Objet_Enfant0_FK` (`Id_enfant`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `echange`
--
ALTER TABLE `echange`
  MODIFY `Id_echange` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `Id_enfant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `ID_Objet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `echange`
--
ALTER TABLE `echange`
  ADD CONSTRAINT `Echange_Enfant0_FK` FOREIGN KEY (`Id_enfant`) REFERENCES `enfant` (`Id_enfant`);

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `Objet_Enfant0_FK` FOREIGN KEY (`Id_enfant`) REFERENCES `enfant` (`Id_enfant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
