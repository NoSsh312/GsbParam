-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 17 avr. 2023 à 16:07
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
-- Base de données : `ryu_m2gsbparamv1`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(32) NOT NULL,
  `mdp` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `mdp`) VALUES
(1, 'LeBoss', '$2y$10$bFgb1XanKXBGUznpmEPdZe.2rjpt.ub6dLZfNFMiUf.h/o.FKX3Rq'),
(2, 'LeChefProjet', '$2y$10$6E1TzKDFKn0F/alWffPgg.DosEd661AAoxDk6qJLSetD/qwAVnT9.');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_commentaire` varchar(200) DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `date_avis` date DEFAULT current_timestamp(),
  `id_produit` char(32) NOT NULL,
  `idCli` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `avis_produit_FK` (`id_produit`),
  KEY `avis_client0_FK` (`idCli`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `titre_commentaire`, `commentaire`, `date_avis`, `id_produit`, `idCli`) VALUES
(1, 'Le premier Avis', 'Ceci est le commentaire du premier avis', '2023-04-17', 'c01', 29),
(2, 'Deuxieme  commentaire', 'Ceci est le deuxieme commentaire', '2023-04-17', 'c02', 29),
(3, 'Ici test 3 allo', 'test', '2023-04-17', 'c01', 30),
(4, 'teeeet', 'ttttttttt', '2023-04-17', 'c02', 30),
(5, 'gklbjwhlkgfqdggqdg', 'fdqgfqgdfgqg', '2023-04-17', 'c04', 29),
(6, 'dsdsqfdsfd', 'fdqsfdfqssf', '2023-04-17', 'c05', 29),
(7, 'dgdsgsg', 'rfesqgfdsgsd', '2023-04-17', 'c06', 29);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` char(32) NOT NULL,
  `libelle` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

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
(28, 'Ryu', '$2y$10$bQv9qafeFpKDE5wT9.RgSuBvOIff5Q4n3JkopuOdGOXfz6m6OVHJG', 'vang', 'adresse', 'test', '45545', '0645645121', 'test@test.fr'),
(29, 'test', '$2y$10$V.b1d/76Gpg3ngXB2m3Jxuw4apfVjUkmMFCsVrHSourt3tPISY5C.', 'test', 'test', 'test', '11111', '1111111111', 'test@test.test'),
(30, 'test3', '$2y$10$b2PCt/HoRuAAoemt.OIZtuaGaxHuT7k55si3NBDU2D6p35m.eWKVC', 'test3', 'test3', 'test3', '22222', '3333333333', 'test3@test3.test3');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `nomPrenomClient` char(32) DEFAULT NULL,
  `adresseRueClient` char(32) DEFAULT NULL,
  `cpClient` char(5) DEFAULT NULL,
  `villeClient` char(32) DEFAULT NULL,
  `mailClient` char(50) DEFAULT NULL,
  `idCli` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_client_FK` (`idCli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `detail_cmd`
--

DROP TABLE IF EXISTS `detail_cmd`;
CREATE TABLE IF NOT EXISTS `detail_cmd` (
  `id_produit` char(32) NOT NULL,
  `id_unite` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `qteAch` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`,`id_unite`,`qte`,`id`),
  KEY `detail_cmd_commande0_FK` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_marque` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `label_marque`) VALUES
(1, 'Novathrix'),
(2, 'Sephora'),
(3, 'Nina richi'),
(4, 'Jupiter'),
(5, 'Mercure'),
(6, 'Mars');

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `idCli` int(11) NOT NULL,
  `id` char(32) NOT NULL,
  `note` int(11) NOT NULL,
  `id_avis` int(11) NOT NULL,
  PRIMARY KEY (`idCli`,`id`),
  KEY `possede_produit0_FK` (`id`),
  KEY `possede_avis_FK` (`id_avis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`idCli`, `id`, `note`, `id_avis`) VALUES
(29, 'c01', 1, 1),
(29, 'c02', 4, 2),
(29, 'c04', 3, 5),
(29, 'c05', 1, 6),
(29, 'c06', 3, 7),
(30, 'c01', 5, 3),
(30, 'c02', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` char(32) NOT NULL,
  `description` char(50) DEFAULT NULL,
  `image` char(100) DEFAULT NULL,
  `desc_detail` varchar(200) DEFAULT NULL,
  `id_categorie` char(32) NOT NULL,
  `id_marque` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produit_categorie_FK` (`id_categorie`),
  KEY `produit_marque_FK` (`id_marque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `description`, `image`, `desc_detail`, `id_categorie`, `id_marque`) VALUES
('c01', 'Laino Shampooing Douche au Thé Vert BIO', 'images/laino-shampooing-douche-au-the-vert-bio-200ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud', 'CH', 1),
('c02', 'Klorane fibres de lin baume après shampooing', 'images/klorane-fibres-de-lin-baume-apres-shampooing-150-ml.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud', 'CH', 2),
('c03', 'Weleda Kids 2in1 Shower & Shampoo Orange fruitée', 'images/weleda-kids-2in1-shower-shampoo-orange-fruitee-150-ml.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'CH', 2),
('c04', 'Weleda Kids 2in1 Shower & Shampoo vanille douce', 'images/weleda-kids-2in1-shower-shampoo-vanille-douce-150-ml.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'CH', 3),
('c05', 'Klorane Shampooing sec à l\'extrait d\'ortie', 'images/klorane-shampooing-sec-a-l-extrait-d-ortie-spray-150ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'CH', 4),
('c06', 'Phytopulp mousse volume intense', 'images/phytopulp-mousse-volume-intense-200ml.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'CH', 5),
('c07', 'Bio Beaute by Nuxe Shampooing nutritif', 'images/bio-beaute-by-nuxe-shampooing-nutritif-200ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'CH', 6),
('f01', 'Nuxe Men Contour des Yeux Multi-Fonctions', 'images/nuxe-men-contour-des-yeux-multi-fonctions-15ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'FO', 2),
('f02', 'Tisane romon nature sommirel bio sachet 20', 'images/tisane-romon-nature-sommirel-bio-sachet-20.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'FO', 1),
('f03', 'La Roche Posay Cicaplast crème pansement', 'images/la-roche-posay-cicaplast-creme-pansement-40ml.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'FO', 3),
('f04', 'Futuro sport stabilisateur pour cheville', 'images/futuro-sport-stabilisateur-pour-cheville-deluxe-attelle-cheville.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'FO', 5),
('f05', 'Microlife pèse-personne électronique weegschaal', 'images/microlife-pese-personne-electronique-weegschaal-ws80.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'FO', 4),
('f06', 'Melapi Miel Thym Liquide 500g', 'images/melapi-miel-thym-liquide-500g.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'FO', 6),
('f07', 'Meli Meliflor Pollen 200g', 'images/melapi-pollen-250g.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'FO', 2),
('p01', 'Avène solaire Spray très haute protection', 'images/avene-solaire-spray-tres-haute-protection-spf50200ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'PS', 2),
('p02', 'Mustela Solaire Lait très haute Protection', 'images/mustela-solaire-lait-tres-haute-protection-spf50-100ml.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'PS', 1),
('p03', 'Isdin Eryfotona aAK fluid', 'images/isdin-eryfotona-aak-fluid-100-50ml.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'PS', 3),
('p04', 'La Roche Posay Anthélios 50+ Brume Visage', 'images/la-roche-posay-anthelios-50-brume-visage-toucher-sec-75ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'PS', 5),
('p05', 'Nuxe Sun Huile Lactée Capillaire Protectrice', 'images/nuxe-sun-huile-lactee-capillaire-protectrice-100ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'PS', 6),
('p06', 'Uriage Bariésun stick lèvres SPF30 4g', 'images/uriage-bariesun-stick-levres-spf30-4g.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'PS', 4),
('p07', 'Bioderma Cicabio creme SPF50+ 30ml', 'images/bioderma-cicabio-creme-spf50-30ml.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'PS', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produitcontenance`
--

DROP TABLE IF EXISTS `produitcontenance`;
CREATE TABLE IF NOT EXISTS `produitcontenance` (
  `id_produit` char(32) NOT NULL,
  `id_unite` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_produit`,`id_unite`,`qte`),
  KEY `Produitcontenance_unite_FK` (`id_unite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produitcontenance`
--

INSERT INTO `produitcontenance` (`id_produit`, `id_unite`, `qte`, `stock`, `prix`) VALUES
('c01', 2, 100, 50, '4.00'),
('c02', 2, 100, 50, '10.80'),
('c03', 2, 100, 50, '4.00'),
('c04', 2, 100, 50, '4.00'),
('c05', 2, 100, 50, '6.10'),
('c06', 2, 100, 50, '18.00'),
('c07', 2, 100, 50, '8.00'),
('f01', 2, 100, 50, '12.05'),
('f02', 6, 20, 50, '5.50'),
('f03', 2, 100, 50, '11.00'),
('f04', 6, 10, 50, '26.50'),
('f05', 7, 1, 50, '63.00'),
('f06', 1, 500, 50, '6.50'),
('f07', 1, 200, 50, '8.60'),
('p01', 2, 100, 50, '22.00'),
('p02', 2, 100, 50, '17.50'),
('p03', 2, 100, 50, '29.00'),
('p04', 2, 100, 50, '8.75'),
('p05', 2, 100, 50, '15.00'),
('p06', 1, 4, 50, '5.65'),
('p07', 2, 30, 50, '13.70');

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE IF NOT EXISTS `suggestion` (
  `id` char(32) NOT NULL,
  `id_produit` char(32) NOT NULL,
  PRIMARY KEY (`id`,`id_produit`),
  KEY `suggestion_produit0_FK` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `suggestion`
--

INSERT INTO `suggestion` (`id`, `id_produit`) VALUES
('c01', 'c02'),
('c01', 'c03'),
('c02', 'c01'),
('c03', 'c04');

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

DROP TABLE IF EXISTS `unite`;
CREATE TABLE IF NOT EXISTS `unite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_unite` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `unite`
--

INSERT INTO `unite` (`id`, `label_unite`) VALUES
(1, 'g'),
(2, 'mL'),
(3, 'L'),
(4, 'mg'),
(5, 'kg'),
(6, 'sachet'),
(7, 'exemplaire');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_client0_FK` FOREIGN KEY (`idCli`) REFERENCES `client` (`idCli`),
  ADD CONSTRAINT `avis_produit_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_client_FK` FOREIGN KEY (`idCli`) REFERENCES `client` (`idCli`);

--
-- Contraintes pour la table `detail_cmd`
--
ALTER TABLE `detail_cmd`
  ADD CONSTRAINT `detail_cmd_Produitcontenance_FK` FOREIGN KEY (`id_produit`,`id_unite`,`qte`) REFERENCES `produitcontenance` (`id_produit`, `id_unite`, `qte`),
  ADD CONSTRAINT `detail_cmd_commande0_FK` FOREIGN KEY (`id`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_avis_FK` FOREIGN KEY (`id_avis`) REFERENCES `avis` (`id`),
  ADD CONSTRAINT `possede_client_FK` FOREIGN KEY (`idCli`) REFERENCES `client` (`idCli`),
  ADD CONSTRAINT `possede_produit0_FK` FOREIGN KEY (`id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `produit_marque_FK` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id`);

--
-- Contraintes pour la table `produitcontenance`
--
ALTER TABLE `produitcontenance`
  ADD CONSTRAINT `Produitcontenance_produit_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `Produitcontenance_unite_FK` FOREIGN KEY (`id_unite`) REFERENCES `unite` (`id`);

--
-- Contraintes pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_produit0_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `suggestion_produit_FK` FOREIGN KEY (`id`) REFERENCES `produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
