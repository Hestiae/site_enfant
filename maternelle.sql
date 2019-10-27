-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 27 oct. 2019 à 12:43
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

CREATE TABLE `echange` (
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

CREATE TABLE `enfant` (
  `Id_enfant` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `solde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`Id_enfant`, `Nom`, `Prenom`, `mdp`, `solde`) VALUES
(1, 'Maria', 'Rapha?l', '123456', 100),
(2, 'Chavanne', 'Marie-Camille', '123456', 100);

--
-- Déclencheurs `enfant`
--
DELIMITER $$
CREATE TRIGGER `after_insert_enfant` BEFORE INSERT ON `enfant` FOR EACH ROW BEGIN
    set new.solde = 100;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE `objet` (
  `ID_Objet` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prix` int(5) NOT NULL,
  `Img` varchar(50) NOT NULL,
  `Id_enfant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`ID_Objet`, `Nom`, `Prix`, `Img`, `Id_enfant`) VALUES
(3, 'Doudou Mouton', 10, '/img/Doudou Mouton_2.png', 2),
(4, 'Doudou Tortue', 10, '/img/Doudou Tortue_2.png', 2),
(5, 'Lot Doudou Lapin', 20, '/img/Lot Doudou Lapin_2.png', 2),
(6, 'Petite Voiture', 5, '/img/Petite Voiture_2.png', 2),
(7, 'Bascule Alpaga', 20, '/img/Bascule Alpaga_2.png', 2),
(8, 'Lot Baguettes', 10, '/img/Lot Baguettes_2.png', 2),
(9, 'Tic Tac Tao', 5, '/img/Tic Tac Tao_2.png', 2),
(10, 'Mouton Ã  Roulette', 10, '/img/Mouton Ã  Roulette_2.png', 2),
(11, 'Doudou Lapin', 10, '/img/Doudou Lapin_2.png', 2),
(12, 'Avion ', 25, '/img/Avion _1.png', 1),
(13, 'Doudou Dragon', 10, '/img/Doudou Dragon_1.png', 1),
(14, 'Lot Doudou ', 15, '/img/Lot Doudou _1.png', 1),
(15, 'Doudou Elephant', 10, '/img/Doudou Elephant_1.png', 1),
(16, 'Petite Voiture', 25, '/img/Petite Voiture_1.png', 1),
(17, 'Bascule Dog', 15, '/img/Bascule Dog_1.png', 1),
(18, 'Lot Doudou Elephant', 15, '/img/Lot Doudou Elephant_1.png', 1),
(19, 'Lot Hochets', 15, '/img/Lot Hochets_1.png', 1),
(20, 'Lot de Peluche', 10, '/img/Lot de Peluche_1.png', 1);

--
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
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
  MODIFY `Id_enfant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `ID_Objet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
