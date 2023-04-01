-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 03 nov. 2022 à 19:10
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ryu_m2gsbparam`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` char(3) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nom` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `mdp` char(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `mdp`) VALUES
('1', 'LeBoss', '$2y$10$bFgb1XanKXBGUznpmEPdZe.2rjpt.ub6dLZfNFMiUf.h/o.FKX3Rq'),
('2', 'LeChefProjet', '$2y$10$6E1TzKDFKn0F/alWffPgg.DosEd661AAoxDk6qJLSetD/qwAVnT9.');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `libelle` char(32) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
('CH', 'Cheveux'),
('FO', 'Forme'),
('PS', 'Protection Solaire');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idCli` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtil` varchar(25) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` char(32) NOT NULL,
  `adresse` char(32) NOT NULL,
  `ville` char(32) NOT NULL,
  `cp` char(5) NOT NULL,
  `tel` char(10) NOT NULL,
  `courriel` char(50) NOT NULL,
  PRIMARY KEY (`idCli`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idCli`, `nomUtil`, `mdp`, `nom`, `adresse`, `ville`, `cp`, `tel`, `courriel`) VALUES
(1, 'JacquesDupont', 'dupontjacques', 'Dupont Jacques', '12, rue haute', 'Laville1', '11111', '0123456789', 'lemail1@gmail.com'),
(2, 'YvesDurant', 'durantyves', 'Durant Yves', '23, rue des ombres', 'Paris', '75012', '1234567891', 'durant@free.fr'),
(3, 'TrucMachin', 'MachinTruc', 'Truc Machin', 'dskjqdhqdsqds', 'JCP', '12345', '2345678912', 'fsfdsfs@dsfsf.dsf'),
(4, 'JeanBalbla', 'BalblaJean', 'Balbla Jean', 'Rue de l&#039;agneau', 'LaBas', '22123', '3456789123', 'lemail@mailmail.fr'),
(16, 'lenomUtil', 'refsf', 'lenom', 'adresse', 'ville', '12345', '8787874545', 'lemail@gmail.com'),
(17, 'dfgf', 'gfd', 'lenom', 'adresse', 'ville', '12345', '8787874545', 'lemail@gmail.com'),
(18, 'test2', '$2y$10$0pVQmKStIHPKara3UyCIFO8z.4e/GOtIOizBkUEmE7rMx./kitRPK', 'Jerome', '1 rue des champs', 'Orléans', '45500', '1234567890', 'jerome@gmail.com'),
(19, 'Marie1', '$2y$10$GrfKK23LPBffBjQo4me7k./aURUVzb4d67KjUHUUYCQKkqtZVqJ86', 'Marie', '3 Av du moulin', 'Orléans', '45500', '1234567890', 'marie@gmail.com'),
(20, 'Marie2', '$2y$10$SOjE23sPj44TXsFL41Uo2eBtJSW.TXUqCvni5sYqL7z7.UDgS2wji', 'Marie', '3 Av du moulin', 'Orléans', '45500', '1234567890', 'marie2@gmail.com'),
(21, 'p1', '$2y$10$YK8ZYc/TrF9ZpWhsy0Z92.a.oTmasFhNnaX.9cT1TM1n/sf7Lag6i', 'p1', 'p1', 'p1', '13211', '1212122121', 'p1@p1.p1'),
(23, 'JeanMarie', '$2y$10$ez1MYxu575qg6FvlUfDUqew1Nh/c.trifRCJgdruL06sU3zKBaRFe', 'jean', 'adresse', 'ville', '12345', '8787874545', 'tttt@tttt.ttt'),
(24, '111', '$2y$10$AQ9kFwszyWlMnxRptlqSdO0XuDs/01WEJxJwChJJTfYX4cX57RUKq', '111', '111', '111', '11111', '1111111111', '111@1111.11'),
(25, '222', '$2y$10$G1xfl6Mle1nGCYKu/gV5N.PhCezJRSMj19f8PkvI9BC2SHEaID1lq', '222', '222', '222', '22222', '2222222222', '222@222.22'),
(26, 'test1', '$2y$10$tFHqn5ZWkEz2m.VarHyrh.uKy7xA38Vplavs/kQwEG.GDBcwuTJ2O', 'test1', 'testrue', 'testville', '54545', '6544545454', 'test1@test.test'),
(27, 'Mil1', '$2y$10$cFCWo8DGg9QDsTaGDe5S2eGCI/UgJLVUkBzJhRMB7e6epMWw8YdWq', 'Mil', 'Milrue', 'Milville', '11111', '0621212122', 'Milmail@milmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `id_cli` int(11) DEFAULT NULL,
  `dateCommande` date DEFAULT NULL,
  `nomPrenomClient` char(32) COLLATE utf8mb3_bin DEFAULT NULL,
  `adresseRueClient` char(32) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `cpClient` char(5) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `villeClient` char(32) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `mailClient` char(50) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idCli` (`id_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_cli`, `dateCommande`, `nomPrenomClient`, `adresseRueClient`, `cpClient`, `villeClient`, `mailClient`) VALUES
('1101461660', 1, '2011-07-12', 'Dupont Jacques', '12, rue haute', '75001', 'Paris', 'dupont@wanadoo.fr'),
('1101461665', 2, '2011-07-20', 'Durant Yves', '23, rue des ombres', '75012', 'Paris', 'durant@free.fr'),
('1101461666', 3, '2022-09-23', 'Machin Truc', 'dskjqdhqdsqds', '12345', 'JCP', 'fsfdsfs@dsfsf.dsf'),
('1101461667', 4, '2022-09-26', 'Balbla Jean', 'Rue de l&#039;agneau', '22123', 'LaBas', 'lemail@mailmail.fr'),
('1101461670', 19, '2022-11-01', 'Marie', 'larue', '11111', 'laville', 'mail@mail.fr'),
('1101461671', 19, '2022-11-02', 'Marie', 'laruedeMarie', '11111', 'lavilledeMarie', 'lemaildeMarie@lemail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idCommande` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `idProduit` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `qte` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `I_FK_CONTENIR_COMMANDE` (`idCommande`),
  KEY `I_FK_CONTENIR_Produit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`idCommande`, `idProduit`, `qte`) VALUES
('1101461660', 'f03', 1),
('1101461660', 'p01', 1),
('1101461665', 'f05', 1),
('1101461665', 'p06', 1),
('1101461666', 'c02', 1),
('1101461667', 'f03', 1),
('1101461670', 'c01', 1),
('1101461670', 'c02', 1),
('1101461670', 'c03', 1),
('1101461671', 'c01', 3),
('1101461671', 'c02', 5);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `description` char(50) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `image` char(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `idCategorie` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `I_FK_Produit_CATEGORIE` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `description`, `prix`, `image`, `idCategorie`) VALUES
('c01', 'Laino Shampooing Douche au Thé Vert BIO', '4.50', 'images/laino-shampooing-douche-au-the-vert-bio-200ml.png', 'CH'),
('c02', 'Klorane fibres de lin baume après shampooing', '10.80', 'images/klorane-fibres-de-lin-baume-apres-shampooing-150-ml.jpg', 'CH'),
('c03', 'Weleda Kids 2in1 Shower & Shampoo Orange fruitée', '4.00', 'images/weleda-kids-2in1-shower-shampoo-orange-fruitee-150-ml.jpg', 'CH'),
('c04', 'Weleda Kids 2in1 Shower & Shampoo vanille douce', '4.00', 'images/weleda-kids-2in1-shower-shampoo-vanille-douce-150-ml.jpg', 'CH'),
('c05', 'Klorane Shampooing sec à l\'extrait d\'ortie', '6.10', 'images/klorane-shampooing-sec-a-l-extrait-d-ortie-spray-150ml.png', 'CH'),
('c06', 'Phytopulp mousse volume intense', '18.00', 'images/phytopulp-mousse-volume-intense-200ml.jpg', 'CH'),
('c07', 'Bio Beaute by Nuxe Shampooing nutritif', '8.00', 'images/bio-beaute-by-nuxe-shampooing-nutritif-200ml.png', 'CH'),
('f01', 'Nuxe Men Contour des Yeux Multi-Fonctions', '12.05', 'images/nuxe-men-contour-des-yeux-multi-fonctions-15ml.png', 'FO'),
('f02', 'Tisane romon nature sommirel bio sachet 20', '5.50', 'images/tisane-romon-nature-sommirel-bio-sachet-20.jpg', 'FO'),
('f03', 'La Roche Posay Cicaplast crème pansement', '11.00', 'images/la-roche-posay-cicaplast-creme-pansement-40ml.jpg', 'FO'),
('f04', 'Futuro sport stabilisateur pour cheville', '26.50', 'images/futuro-sport-stabilisateur-pour-cheville-deluxe-attelle-cheville.png', 'FO'),
('f05', 'Microlife pèse-personne électronique weegschaal', '63.00', 'images/microlife-pese-personne-electronique-weegschaal-ws80.jpg', 'FO'),
('f06', 'Melapi Miel Thym Liquide 500g', '6.50', 'images/melapi-miel-thym-liquide-500g.jpg', 'FO'),
('f07', 'Meli Meliflor Pollen 200g', '8.60', 'images/melapi-pollen-250g.jpg', 'FO'),
('p01', 'Avène solaire Spray très haute protection', '22.00', 'images/avene-solaire-spray-tres-haute-protection-spf50200ml.png', 'PS'),
('p02', 'Mustela Solaire Lait très haute Protection', '17.50', 'images/mustela-solaire-lait-tres-haute-protection-spf50-100ml.jpg', 'PS'),
('p03', 'Isdin Eryfotona aAK fluid', '29.00', 'images/isdin-eryfotona-aak-fluid-100-50ml.jpg', 'PS'),
('p04', 'La Roche Posay Anthélios 50+ Brume Visage', '8.75', 'images/la-roche-posay-anthelios-50-brume-visage-toucher-sec-75ml.png', 'PS'),
('p05', 'Nuxe Sun Huile Lactée Capillaire Protectrice', '15.00', 'images/nuxe-sun-huile-lactee-capillaire-protectrice-100ml.png', 'PS'),
('p06', 'Uriage Bariésun stick lèvres SPF30 4g', '5.65', 'images/uriage-bariesun-stick-levres-spf30-4g.jpg', 'PS'),
('p07', 'Bioderma Cicabio creme SPF50+ 30ml', '13.70', 'images/bioderma-cicabio-creme-spf50-30ml.png', 'PS');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_idCli` FOREIGN KEY (`id_cli`) REFERENCES `client` (`idCli`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;