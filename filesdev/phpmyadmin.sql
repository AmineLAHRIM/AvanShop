-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 08, 2018 at 05:34 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `AvanShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `Id_Admin` int(11) NOT NULL,
  `Idutil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Article`
--

CREATE TABLE `Article` (
  `Id_article` int(11) NOT NULL,
  `Nom_article` varchar(25) DEFAULT NULL,
  `Qte_Article` int(11) DEFAULT NULL,
  `Id_Panier` int(11) DEFAULT NULL,
  `Id_wish` int(11) DEFAULT NULL,
  `Id_ProduitV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Article`
--

INSERT INTO `Article` (`Id_article`, `Nom_article`, `Qte_Article`, `Id_Panier`, `Id_wish`, `Id_ProduitV`) VALUES
(1, 'Lunettes Soleil', 21, 19, 10, 109),
(3, 'ofppt', 26, 17, 8, 125),
(4, 'Carte Mere', 4, 19, 10, 111);

-- --------------------------------------------------------

--
-- Table structure for table `Boutique`
--

CREATE TABLE `Boutique` (
  `Id_boutique` int(11) NOT NULL,
  `Nom_boutique` varchar(25) DEFAULT NULL,
  `Short_descriptionB` varchar(40) DEFAULT NULL,
  `Long_DescriptionB` varchar(101) DEFAULT NULL,
  `Logo_boutique` varchar(25) DEFAULT NULL,
  `Id_vendeur` int(11) DEFAULT NULL,
  `Id_Client` int(11) DEFAULT NULL,
  `Idutil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Boutique`
--

INSERT INTO `Boutique` (`Id_boutique`, `Nom_boutique`, `Short_descriptionB`, `Long_DescriptionB`, `Logo_boutique`, `Id_vendeur`, `Id_Client`, `Idutil`) VALUES
(15, 'abirlab', 'notre sotre tres propre pour', 'voila mon long description', '', 15, 50, 71),
(16, 'storetest', 'gggg', 'kkkkk', '', 16, 52, 73);

-- --------------------------------------------------------

--
-- Table structure for table `Categorie`
--

CREATE TABLE `Categorie` (
  `Id_Categorie` int(11) NOT NULL,
  `Nom_categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categorie`
--

INSERT INTO `Categorie` (`Id_Categorie`, `Nom_categorie`) VALUES
(1, 'Womens Clothing'),
(2, 'Mens Clothing'),
(3, 'Phones & Accessories'),
(4, 'Computer & Office'),
(5, 'Consumer Electronics'),
(6, 'Jewelry & Watches'),
(7, 'Home & Garden, Furniture'),
(8, 'Bags & Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `Id_Client` int(11) NOT NULL,
  `Idutil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`Id_Client`, `Idutil`) VALUES
(50, 71),
(51, 72),
(52, 73);

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
--

CREATE TABLE `Commande` (
  `Id_Commande` int(11) NOT NULL,
  `Date_Commande` date DEFAULT NULL,
  `Id_Panier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Dimension`
--

CREATE TABLE `Dimension` (
  `Id_dimension` int(11) NOT NULL,
  `Longeur_Dimension` float DEFAULT NULL,
  `Largeur_Dimension` float DEFAULT NULL,
  `Hauteur_Dimension` float DEFAULT NULL,
  `Poid_Dimension` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Dimension`
--

INSERT INTO `Dimension` (`Id_dimension`, `Longeur_Dimension`, `Largeur_Dimension`, `Hauteur_Dimension`, `Poid_Dimension`) VALUES
(71, 0.5, 0.5, 0.5, 0.2),
(72, 0.5, 0.5, 0.5, 0.5),
(73, 1, 1, 1, 1),
(74, 0, 2, 2, 2),
(75, 1, 1, 1, 1),
(76, 2, 2, 2, 2),
(77, 1, 1, 1, 1),
(78, 1, 1, 1, 1),
(79, 1, 1, 1, 1),
(80, 1, 1, 1, 1),
(81, 1, 1, 1, 1),
(82, 1, 1, 1, 1),
(83, 1, 1, 1, 1),
(84, 1, 1, 1, 1),
(85, 0, 0, 0, 0),
(86, 1, 1, 1, 1),
(87, 0, 0, 0, 0),
(88, 1, 0.5, 0.8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Facture`
--

CREATE TABLE `Facture` (
  `Id_Facture` int(11) NOT NULL,
  `Date_Facture` date DEFAULT NULL,
  `Montant_Facture` float DEFAULT NULL,
  `Id_Paiement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Image`
--

CREATE TABLE `Image` (
  `Id_Image` int(11) NOT NULL,
  `Src_image` varchar(500) DEFAULT NULL,
  `Id_ProduitV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Image`
--

INSERT INTO `Image` (`Id_Image`, `Src_image`, `Id_ProduitV`) VALUES
(59, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/108/M90259400002__RAYBAN_RY1553JUNIOR-O-3615-46-16-130__2500x1400-face.jpg', 108),
(60, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/108/', 108),
(61, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/108/', 108),
(62, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/108/', 108),
(63, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/109/monture-cadre-de-lunette-avec-verre-lens-glasse.jpg', 109),
(64, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/109/', 109),
(65, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/109/', 109),
(66, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/109/', 109),
(67, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/110/MSi-Aegis-Ti-iki-GeForce-GTX-1080-ekran-kartli-canavar85722_0.jpg', 110),
(68, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/110/', 110),
(69, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/110/', 110),
(70, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/110/', 110),
(71, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/111/close-up-of-motherboard_4460x4460.jpg', 111),
(72, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/111/', 111),
(73, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/111/', 111),
(74, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/111/', 111),
(75, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/112/red-tee-with-pocket_4460x4460.jpg', 112),
(76, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/112/', 112),
(77, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/112/', 112),
(78, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/112/', 112),
(79, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/113/taking-notes-on-programming_4460x4460.jpg', 113),
(80, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/113/', 113),
(81, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/113/', 113),
(82, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/113/', 113),
(83, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/114/MYLEYON.jpg', 114),
(84, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/114/', 114),
(85, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/114/', 114),
(86, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/114/', 114),
(87, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/115/Vintage.jpg', 115),
(88, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/115/', 115),
(89, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/115/', 115),
(90, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/115/', 115),
(91, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/116/drone.jpg', 116),
(92, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/116/', 116),
(93, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/116/', 116),
(94, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/116/', 116),
(100, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/122/toy.jpeg', 122),
(101, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/122/', 122),
(102, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/122/', 122),
(103, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/122/', 122),
(104, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/123/robe.jpg', 123),
(105, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/123/', 123),
(106, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/123/', 123),
(107, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/123/', 123),
(108, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/124/robe2.jpg', 124),
(109, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/124/', 124),
(110, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/124/', 124),
(111, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/124/', 124),
(112, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/125/applocknew.png', 125),
(113, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/125/', 125),
(114, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/125/', 125),
(115, '/Users/aminelahrim/DEV/GrafikartPHP1/AvanShop/public/DATAIMG/15/125/', 125);

-- --------------------------------------------------------

--
-- Table structure for table `Paiement`
--

CREATE TABLE `Paiement` (
  `Id_Paiement` int(11) NOT NULL,
  `Date_Paiement` date DEFAULT NULL,
  `Id_Commande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Panier`
--

CREATE TABLE `Panier` (
  `Id_Panier` int(11) NOT NULL,
  `Id_Client` int(11) DEFAULT NULL,
  `Idutil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Panier`
--

INSERT INTO `Panier` (`Id_Panier`, `Id_Client`, `Idutil`) VALUES
(17, 50, 71),
(18, 51, 72),
(19, 52, 73);

-- --------------------------------------------------------

--
-- Table structure for table `Produit`
--

CREATE TABLE `Produit` (
  `Id_Produit` int(11) NOT NULL,
  `Id_ProduitV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Produit_Virtuel`
--

CREATE TABLE `Produit_Virtuel` (
  `Id_ProduitV` int(11) NOT NULL,
  `Libelle_Produit` varchar(25) DEFAULT NULL,
  `Prix_Unitaire` float DEFAULT NULL,
  `ShortdescriptionP` varchar(255) DEFAULT NULL,
  `Longdescription` varchar(1000) DEFAULT NULL,
  `TagP` varchar(25) DEFAULT NULL,
  `Quantite_stock` int(255) DEFAULT NULL,
  `Prix_promotion` float DEFAULT NULL,
  `PrixLivraison` float DEFAULT NULL,
  `Id_Rank` int(11) DEFAULT NULL,
  `Id_dimension` int(11) DEFAULT NULL,
  `Id_Categorie` int(11) DEFAULT NULL,
  `Id_boutique` int(11) DEFAULT NULL,
  `nbrrank` float(65,30) DEFAULT '0.000000000000000000000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Produit_Virtuel`
--

INSERT INTO `Produit_Virtuel` (`Id_ProduitV`, `Libelle_Produit`, `Prix_Unitaire`, `ShortdescriptionP`, `Longdescription`, `TagP`, `Quantite_stock`, `Prix_promotion`, `PrixLivraison`, `Id_Rank`, `Id_dimension`, `Id_Categorie`, `Id_boutique`, `nbrrank`) VALUES
(108, 'Lunettes', 200, 'VCKA Marque TR90 Anti Bleu Lumière', 'Lunettes de Lecture Lunettes de Protection Lunettes D\'ordinateur de Cadre En Titane Lunettes De Jeux', 'lunette, titane', 300, 0, 20, 126, 71, 6, 15, 0.000000000000000000000000000000),
(109, 'Lunettes Soleil', 250, 'D\'ordinateur de Cadre En Titane Lunettes', 'Marque TR90 Anti Bleu Lumière Lunettes de Lecture Lunettes de Protection Lunettes D\'ordinateur de Ca', 'soleil', 489, 200, 0, 127, 72, 6, 15, 0.000000000000000000000000000000),
(110, 'PC Gamer', 340, 'Gaming computer case', 'Noir Ordinateur PC ATX Gamer Gaming Case Boîtier Boîtier De L\'ordinateur Tour USB 3.0 Micro ATX Moye', 'gamer', 90, 0, 0, 128, 73, 4, 15, 0.000000000000000000000000000000),
(111, 'Carte Mere', 1000, 'POUR MSI GE620DX GE620', 'POUR MSI GE620DX GE620 GE60 MS-16G5 Mère MS-16G51 VER 1.0 DDR3 Non-', 'pc', 6, 800, 100, 129, 74, 4, 15, 0.000000000000000000000000000000),
(112, 'NIBESSER T-shirt', 220, 'Slim Tshirt 2018 Summer O-Neck T shirts ', 'NIBESSER 3XL 5XL T-shirt Women Loose Bat Short Sleeve Tops Tees Casual Female Slim Tshirt 2018 Summe', 't-shirt', 100, 200, 10, 130, 75, 1, 15, 0.000000000000000000000000000000),
(113, 'Macbook pro', 15000, 'MacBook Pro (Retina 13 pouces, début 201', 'MacBook Pro (Retina 13 pouces, début 2015) Nom du modèle :	MacBook Pro\r\n  Identifiant du modèle :	Mac', '', 110, 0, 0, 131, 76, 4, 15, 0.000000000000000000000000000000),
(114, 'MYLEYON Summer', 120, 'Summer Outdoor Swimming', 'MYLEYON Summer Outdoor Swimming Water Shoes Men And Women Beach Shoes Adult Unisex Flat Soft Walking', '', 100, 100, 0, 132, 77, 1, 15, 0.000000000000000000000000000000),
(115, 'Vintage', 40, 'leather square dial watches', 'Vintage leather square dial watches women fashion dress watch minimalist stylish small fresh quartz ', '', 90, 0, 0, 133, 78, 6, 15, 0.000000000000000000000000000000),
(116, 'Drone', 1500, 'Mini Baby Elfie Selfie 720P WIFI ', 'Baby Elfie Selfie 720P WIFI FPV w/ Altitude Hold Headless Mode G-sensor RC Drone Quadcore', '', 10, 1400, 0, 134, 79, 5, 15, 0.000000000000000000000000000000),
(122, 'Tank Kids Toy', 3000, 'Tank Kids Toy For Iphone IOS For Android', 'New Arrival JJRC 777-27 Remote Control Mini WiFi RC Car Camera Real-time Tank Kids Toy For Iphone', 'cars, voiture,', 90, 0, 100, 140, 85, 5, 15, 0.000000000000000000000000000000),
(123, 'Summer Girl Dress', 110, 'Summer Girl Dress Sleeveless Floral Chil', '2017 European Style Summer Girl Dress Sleeveless Floral Child Ball Gown Kids Dresses For Girls Weddi', '', 100, 0, 0, 141, 86, 2, 15, 0.000000000000000000000000000000),
(124, 'Summer Dress 2018', 500, 'Vestidos Girls Summer Dress 2018 Brand ', 'Vestidos Girls Summer Dress 2018 Brand Animal Unicorn Princess Dress Children Costume for Kids Cloth', '', 300, 0, 0, 142, 87, 1, 15, 0.000000000000000000000000000000),
(125, 'ofppt', 1200, 'loremasdfasdfasdfasdfasdfasdfasdfasdfasd', 'loremasdfasdfasdfasdfasdfasdfasdfasdfasdloremasdfasdfasdfasdfasdfasdfasdfasdfasdloremasdfasdfasdfasd', 'ofppt, syba', 4, 0, 0, 143, 88, 2, 15, 0.000000000000000000000000000000);

-- --------------------------------------------------------

--
-- Table structure for table `Rank`
--

CREATE TABLE `Rank` (
  `Id_Rank` int(11) NOT NULL,
  `starnbr1` int(11) DEFAULT NULL,
  `starnbr2` int(11) DEFAULT NULL,
  `starnbr3` int(11) DEFAULT NULL,
  `starnbr4` int(11) DEFAULT NULL,
  `starnbr5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rank`
--

INSERT INTO `Rank` (`Id_Rank`, `starnbr1`, `starnbr2`, `starnbr3`, `starnbr4`, `starnbr5`) VALUES
(126, 0, 0, 0, 0, 0),
(127, 0, 0, 0, 0, 0),
(128, 0, 0, 0, 0, 0),
(129, 0, 0, 0, 0, 0),
(130, 0, 0, 0, 0, 0),
(131, 0, 0, 0, 0, 0),
(132, 0, 0, 0, 0, 0),
(133, 0, 0, 0, 0, 0),
(134, 0, 0, 0, 0, 0),
(135, 0, 0, 0, 0, 0),
(136, 0, 0, 0, 0, 0),
(137, 0, 0, 0, 0, 0),
(138, 0, 0, 0, 0, 0),
(139, 0, 0, 0, 0, 0),
(140, 0, 0, 0, 0, 0),
(141, 0, 0, 0, 0, 0),
(142, 0, 0, 0, 0, 0),
(143, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Sous_Categorie`
--

CREATE TABLE `Sous_Categorie` (
  `Idsouscategorie` int(11) NOT NULL,
  `nomsous_catgorie` varchar(25) DEFAULT NULL,
  `Id_Categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Support`
--

CREATE TABLE `Support` (
  `Id_Support` int(11) NOT NULL,
  `Idutil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`) VALUES
(1, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91');

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `Idutil` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Sexe` varchar(255) DEFAULT NULL,
  `Tele` int(11) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Code_Postal` int(255) DEFAULT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Login` varchar(255) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Idutil`, `Nom`, `Prenom`, `Sexe`, `Tele`, `Adresse`, `Code_Postal`, `Pays`, `Email`, `Login`, `Pass`) VALUES
(71, 'Amine', 'LAHRIM', '', 123456789, 'marrakech sidi youssef ben ali', 0, '', 'aminelahrim@gmail.com', 'aminelahrim@gmail.com', '55cbe7fd00627a28668d1d7c9899bdb602dad69d'),
(72, 'Go', 'amine', '', 123456789, 'sidi youssef ', 0, '', 'amine@g.com', 'amine@g.com', 'd3fc13dc12d8d7a58e7ae87295e93dbaddb5d36b'),
(73, 'Test', 'Gtest', '', 123456789, 'marrakeh sidi youssef ben ali', 0, '', 'test@gmail.com', 'test@gmail.com', '55cbe7fd00627a28668d1d7c9899bdb602dad69d');

-- --------------------------------------------------------

--
-- Table structure for table `Vendeur`
--

CREATE TABLE `Vendeur` (
  `Id_vendeur` int(11) NOT NULL,
  `Id_Client` int(11) NOT NULL,
  `Idutil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Vendeur`
--

INSERT INTO `Vendeur` (`Id_vendeur`, `Id_Client`, `Idutil`) VALUES
(15, 50, 71),
(16, 52, 73);

-- --------------------------------------------------------

--
-- Table structure for table `Wish_List`
--

CREATE TABLE `Wish_List` (
  `Id_wish` int(11) NOT NULL,
  `Id_Client` int(11) DEFAULT NULL,
  `Idutil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Wish_List`
--

INSERT INTO `Wish_List` (`Id_wish`, `Id_Client`, `Idutil`) VALUES
(8, 50, 71),
(9, 51, 72),
(10, 52, 73);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`Id_Admin`,`Idutil`),
  ADD KEY `FK_Administrateur_Idutil` (`Idutil`);

--
-- Indexes for table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`Id_article`),
  ADD KEY `FK_Article_Id_Panier` (`Id_Panier`),
  ADD KEY `FK_Article_Id_wish` (`Id_wish`),
  ADD KEY `FK_Article_Id_ProduitV` (`Id_ProduitV`);

--
-- Indexes for table `Boutique`
--
ALTER TABLE `Boutique`
  ADD PRIMARY KEY (`Id_boutique`),
  ADD KEY `FK_Boutique_Id_vendeur` (`Id_vendeur`),
  ADD KEY `FK_Boutique_Id_Client` (`Id_Client`),
  ADD KEY `FK_Boutique_Idutil` (`Idutil`),
  ADD KEY `Id_boutique` (`Id_boutique`),
  ADD KEY `Id_boutique_2` (`Id_boutique`),
  ADD KEY `Id_boutique_3` (`Id_boutique`),
  ADD KEY `Id_boutique_4` (`Id_boutique`),
  ADD KEY `Id_boutique_5` (`Id_boutique`),
  ADD KEY `Id_boutique_6` (`Id_boutique`),
  ADD KEY `Id_boutique_7` (`Id_boutique`),
  ADD KEY `Id_boutique_8` (`Id_boutique`),
  ADD KEY `Id_boutique_9` (`Id_boutique`),
  ADD KEY `Id_boutique_10` (`Id_boutique`),
  ADD KEY `Id_boutique_11` (`Id_boutique`),
  ADD KEY `Id_boutique_12` (`Id_boutique`),
  ADD KEY `Id_boutique_13` (`Id_boutique`),
  ADD KEY `Id_boutique_14` (`Id_boutique`),
  ADD KEY `Id_boutique_15` (`Id_boutique`),
  ADD KEY `Id_boutique_16` (`Id_boutique`),
  ADD KEY `Id_boutique_17` (`Id_boutique`),
  ADD KEY `Id_boutique_18` (`Id_boutique`),
  ADD KEY `Id_boutique_19` (`Id_boutique`),
  ADD KEY `Id_boutique_20` (`Id_boutique`),
  ADD KEY `Id_boutique_21` (`Id_boutique`),
  ADD KEY `Id_boutique_22` (`Id_boutique`),
  ADD KEY `Id_boutique_23` (`Id_boutique`),
  ADD KEY `Id_boutique_24` (`Id_boutique`),
  ADD KEY `Id_boutique_25` (`Id_boutique`),
  ADD KEY `Id_boutique_26` (`Id_boutique`);

--
-- Indexes for table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`Id_Categorie`),
  ADD KEY `Id_Categorie` (`Id_Categorie`),
  ADD KEY `Id_Categorie_2` (`Id_Categorie`),
  ADD KEY `Id_Categorie_3` (`Id_Categorie`),
  ADD KEY `Id_Categorie_4` (`Id_Categorie`),
  ADD KEY `Id_Categorie_5` (`Id_Categorie`),
  ADD KEY `Id_Categorie_6` (`Id_Categorie`),
  ADD KEY `Id_Categorie_7` (`Id_Categorie`),
  ADD KEY `Id_Categorie_8` (`Id_Categorie`),
  ADD KEY `Id_Categorie_9` (`Id_Categorie`),
  ADD KEY `Id_Categorie_10` (`Id_Categorie`),
  ADD KEY `Id_Categorie_11` (`Id_Categorie`),
  ADD KEY `Id_Categorie_12` (`Id_Categorie`),
  ADD KEY `Id_Categorie_13` (`Id_Categorie`),
  ADD KEY `Id_Categorie_14` (`Id_Categorie`),
  ADD KEY `Id_Categorie_15` (`Id_Categorie`),
  ADD KEY `Id_Categorie_16` (`Id_Categorie`),
  ADD KEY `Id_Categorie_17` (`Id_Categorie`),
  ADD KEY `Id_Categorie_18` (`Id_Categorie`),
  ADD KEY `Id_Categorie_19` (`Id_Categorie`),
  ADD KEY `Id_Categorie_20` (`Id_Categorie`),
  ADD KEY `Id_Categorie_21` (`Id_Categorie`),
  ADD KEY `Id_Categorie_22` (`Id_Categorie`),
  ADD KEY `Id_Categorie_23` (`Id_Categorie`),
  ADD KEY `Id_Categorie_24` (`Id_Categorie`),
  ADD KEY `Id_Categorie_25` (`Id_Categorie`),
  ADD KEY `Id_Categorie_26` (`Id_Categorie`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`Id_Client`,`Idutil`),
  ADD KEY `FK_Client_Idutil` (`Idutil`),
  ADD KEY `Id_Client` (`Id_Client`),
  ADD KEY `Id_Client_2` (`Id_Client`),
  ADD KEY `Id_Client_3` (`Id_Client`),
  ADD KEY `Id_Client_4` (`Id_Client`),
  ADD KEY `Id_Client_5` (`Id_Client`),
  ADD KEY `Id_Client_6` (`Id_Client`);

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`Id_Commande`),
  ADD KEY `FK_Commande_Id_Panier` (`Id_Panier`);

--
-- Indexes for table `Dimension`
--
ALTER TABLE `Dimension`
  ADD PRIMARY KEY (`Id_dimension`),
  ADD KEY `Id_dimension` (`Id_dimension`),
  ADD KEY `Id_dimension_2` (`Id_dimension`),
  ADD KEY `Id_dimension_3` (`Id_dimension`),
  ADD KEY `Id_dimension_4` (`Id_dimension`),
  ADD KEY `Id_dimension_5` (`Id_dimension`),
  ADD KEY `Id_dimension_6` (`Id_dimension`),
  ADD KEY `Id_dimension_7` (`Id_dimension`),
  ADD KEY `Id_dimension_8` (`Id_dimension`),
  ADD KEY `Id_dimension_9` (`Id_dimension`),
  ADD KEY `Id_dimension_10` (`Id_dimension`),
  ADD KEY `Id_dimension_11` (`Id_dimension`),
  ADD KEY `Id_dimension_12` (`Id_dimension`),
  ADD KEY `Id_dimension_13` (`Id_dimension`),
  ADD KEY `Id_dimension_14` (`Id_dimension`),
  ADD KEY `Id_dimension_15` (`Id_dimension`),
  ADD KEY `Id_dimension_16` (`Id_dimension`),
  ADD KEY `Id_dimension_17` (`Id_dimension`),
  ADD KEY `Id_dimension_18` (`Id_dimension`),
  ADD KEY `Id_dimension_19` (`Id_dimension`),
  ADD KEY `Id_dimension_20` (`Id_dimension`),
  ADD KEY `Id_dimension_21` (`Id_dimension`),
  ADD KEY `Id_dimension_22` (`Id_dimension`),
  ADD KEY `Id_dimension_23` (`Id_dimension`),
  ADD KEY `Id_dimension_24` (`Id_dimension`),
  ADD KEY `Id_dimension_25` (`Id_dimension`),
  ADD KEY `Id_dimension_26` (`Id_dimension`);

--
-- Indexes for table `Facture`
--
ALTER TABLE `Facture`
  ADD PRIMARY KEY (`Id_Facture`),
  ADD KEY `FK_Facture_Id_Paiement` (`Id_Paiement`);

--
-- Indexes for table `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`Id_Image`),
  ADD KEY `FK_Image_Id_ProduitV` (`Id_ProduitV`);

--
-- Indexes for table `Paiement`
--
ALTER TABLE `Paiement`
  ADD PRIMARY KEY (`Id_Paiement`),
  ADD KEY `FK_Paiement_Id_Commande` (`Id_Commande`);

--
-- Indexes for table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`Id_Panier`),
  ADD KEY `FK_Panier_Id_Client` (`Id_Client`),
  ADD KEY `FK_Panier_Idutil` (`Idutil`),
  ADD KEY `Id_Panier` (`Id_Panier`),
  ADD KEY `Id_Panier_2` (`Id_Panier`),
  ADD KEY `Id_Panier_3` (`Id_Panier`),
  ADD KEY `Id_Panier_4` (`Id_Panier`),
  ADD KEY `Id_Panier_5` (`Id_Panier`),
  ADD KEY `Id_Panier_6` (`Id_Panier`);

--
-- Indexes for table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`Id_Produit`,`Id_ProduitV`),
  ADD KEY `FK_Produit_Id_ProduitV` (`Id_ProduitV`),
  ADD KEY `Id_Produit` (`Id_Produit`),
  ADD KEY `Id_Produit_2` (`Id_Produit`),
  ADD KEY `Id_Produit_3` (`Id_Produit`);

--
-- Indexes for table `Produit_Virtuel`
--
ALTER TABLE `Produit_Virtuel`
  ADD PRIMARY KEY (`Id_ProduitV`),
  ADD KEY `FK_Produit_Virtuel_Id_Rank` (`Id_Rank`),
  ADD KEY `FK_Produit_Virtuel_Id_dimension` (`Id_dimension`),
  ADD KEY `FK_Produit_Virtuel_Id_Categorie` (`Id_Categorie`),
  ADD KEY `FK_Produit_Virtuel_Id_boutique` (`Id_boutique`),
  ADD KEY `Id_ProduitV` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_2` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_3` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_4` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_5` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_6` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_7` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_8` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_9` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_10` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_11` (`Id_ProduitV`),
  ADD KEY `Id_ProduitV_12` (`Id_ProduitV`);

--
-- Indexes for table `Rank`
--
ALTER TABLE `Rank`
  ADD PRIMARY KEY (`Id_Rank`),
  ADD KEY `Id_Rank` (`Id_Rank`),
  ADD KEY `Id_Rank_2` (`Id_Rank`),
  ADD KEY `Id_Rank_3` (`Id_Rank`),
  ADD KEY `Id_Rank_4` (`Id_Rank`),
  ADD KEY `Id_Rank_5` (`Id_Rank`),
  ADD KEY `Id_Rank_6` (`Id_Rank`),
  ADD KEY `Id_Rank_7` (`Id_Rank`),
  ADD KEY `Id_Rank_8` (`Id_Rank`),
  ADD KEY `Id_Rank_9` (`Id_Rank`),
  ADD KEY `Id_Rank_10` (`Id_Rank`),
  ADD KEY `Id_Rank_11` (`Id_Rank`),
  ADD KEY `Id_Rank_12` (`Id_Rank`),
  ADD KEY `Id_Rank_13` (`Id_Rank`),
  ADD KEY `Id_Rank_14` (`Id_Rank`),
  ADD KEY `Id_Rank_15` (`Id_Rank`),
  ADD KEY `Id_Rank_16` (`Id_Rank`),
  ADD KEY `Id_Rank_17` (`Id_Rank`),
  ADD KEY `Id_Rank_18` (`Id_Rank`),
  ADD KEY `Id_Rank_19` (`Id_Rank`),
  ADD KEY `Id_Rank_20` (`Id_Rank`),
  ADD KEY `Id_Rank_21` (`Id_Rank`),
  ADD KEY `Id_Rank_22` (`Id_Rank`),
  ADD KEY `Id_Rank_23` (`Id_Rank`),
  ADD KEY `Id_Rank_24` (`Id_Rank`),
  ADD KEY `Id_Rank_25` (`Id_Rank`),
  ADD KEY `Id_Rank_26` (`Id_Rank`);

--
-- Indexes for table `Sous_Categorie`
--
ALTER TABLE `Sous_Categorie`
  ADD PRIMARY KEY (`Idsouscategorie`),
  ADD KEY `FK_Sous_Categorie_Id_Categorie` (`Id_Categorie`);

--
-- Indexes for table `Support`
--
ALTER TABLE `Support`
  ADD PRIMARY KEY (`Id_Support`,`Idutil`),
  ADD KEY `FK_Support_Idutil` (`Idutil`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`Idutil`),
  ADD KEY `Idutil` (`Idutil`),
  ADD KEY `Idutil_2` (`Idutil`),
  ADD KEY `Idutil_3` (`Idutil`),
  ADD KEY `Idutil_4` (`Idutil`),
  ADD KEY `Idutil_5` (`Idutil`),
  ADD KEY `Idutil_6` (`Idutil`);

--
-- Indexes for table `Vendeur`
--
ALTER TABLE `Vendeur`
  ADD PRIMARY KEY (`Id_vendeur`,`Id_Client`,`Idutil`),
  ADD KEY `FK_Vendeur_Id_Client` (`Id_Client`),
  ADD KEY `FK_Vendeur_Idutil` (`Idutil`),
  ADD KEY `Id_vendeur` (`Id_vendeur`),
  ADD KEY `Id_vendeur_2` (`Id_vendeur`);

--
-- Indexes for table `Wish_List`
--
ALTER TABLE `Wish_List`
  ADD PRIMARY KEY (`Id_wish`),
  ADD KEY `FK_Wish_List_Id_Client` (`Id_Client`),
  ADD KEY `FK_Wish_List_Idutil` (`Idutil`),
  ADD KEY `Id_wish` (`Id_wish`),
  ADD KEY `Id_wish_2` (`Id_wish`),
  ADD KEY `Id_wish_3` (`Id_wish`),
  ADD KEY `Id_wish_4` (`Id_wish`),
  ADD KEY `Id_wish_5` (`Id_wish`),
  ADD KEY `Id_wish_6` (`Id_wish`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Article`
--
ALTER TABLE `Article`
  MODIFY `Id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Boutique`
--
ALTER TABLE `Boutique`
  MODIFY `Id_boutique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `Id_Categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `Id_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `Id_Commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Dimension`
--
ALTER TABLE `Dimension`
  MODIFY `Id_dimension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `Facture`
--
ALTER TABLE `Facture`
  MODIFY `Id_Facture` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Image`
--
ALTER TABLE `Image`
  MODIFY `Id_Image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `Paiement`
--
ALTER TABLE `Paiement`
  MODIFY `Id_Paiement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `Id_Panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `Id_Produit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Produit_Virtuel`
--
ALTER TABLE `Produit_Virtuel`
  MODIFY `Id_ProduitV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `Rank`
--
ALTER TABLE `Rank`
  MODIFY `Id_Rank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `Sous_Categorie`
--
ALTER TABLE `Sous_Categorie`
  MODIFY `Idsouscategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Support`
--
ALTER TABLE `Support`
  MODIFY `Id_Support` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Idutil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `Vendeur`
--
ALTER TABLE `Vendeur`
  MODIFY `Id_vendeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Wish_List`
--
ALTER TABLE `Wish_List`
  MODIFY `Id_wish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD CONSTRAINT `FK_Administrateur_Idutil` FOREIGN KEY (`Idutil`) REFERENCES `Utilisateur` (`Idutil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `FK_Article_Id_Panier` FOREIGN KEY (`Id_Panier`) REFERENCES `Panier` (`Id_Panier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Article_Id_ProduitV` FOREIGN KEY (`Id_ProduitV`) REFERENCES `Produit_Virtuel` (`Id_ProduitV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Article_Id_wish` FOREIGN KEY (`Id_wish`) REFERENCES `Wish_List` (`Id_wish`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Boutique`
--
ALTER TABLE `Boutique`
  ADD CONSTRAINT `FK_Boutique_Id_Client` FOREIGN KEY (`Id_Client`) REFERENCES `Client` (`Id_Client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Boutique_Id_vendeur` FOREIGN KEY (`Id_vendeur`) REFERENCES `Vendeur` (`Id_vendeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Boutique_Idutil` FOREIGN KEY (`Idutil`) REFERENCES `Utilisateur` (`Idutil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `FK_Client_Idutil` FOREIGN KEY (`Idutil`) REFERENCES `Utilisateur` (`Idutil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `FK_Commande_Id_Panier` FOREIGN KEY (`Id_Panier`) REFERENCES `Panier` (`Id_Panier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Facture`
--
ALTER TABLE `Facture`
  ADD CONSTRAINT `FK_Facture_Id_Paiement` FOREIGN KEY (`Id_Paiement`) REFERENCES `Paiement` (`Id_Paiement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Image`
--
ALTER TABLE `Image`
  ADD CONSTRAINT `FK_Image_Id_ProduitV` FOREIGN KEY (`Id_ProduitV`) REFERENCES `Produit_Virtuel` (`Id_ProduitV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Paiement`
--
ALTER TABLE `Paiement`
  ADD CONSTRAINT `FK_Paiement_Id_Commande` FOREIGN KEY (`Id_Commande`) REFERENCES `Commande` (`Id_Commande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Panier`
--
ALTER TABLE `Panier`
  ADD CONSTRAINT `FK_Panier_Id_Client` FOREIGN KEY (`Id_Client`) REFERENCES `Client` (`Id_Client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Panier_Idutil` FOREIGN KEY (`Idutil`) REFERENCES `Utilisateur` (`Idutil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Produit`
--
ALTER TABLE `Produit`
  ADD CONSTRAINT `FK_Produit_Id_ProduitV` FOREIGN KEY (`Id_ProduitV`) REFERENCES `Produit_Virtuel` (`Id_ProduitV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Produit_Virtuel`
--
ALTER TABLE `Produit_Virtuel`
  ADD CONSTRAINT `FK_Produit_Virtuel_Id_Categorie` FOREIGN KEY (`Id_Categorie`) REFERENCES `Categorie` (`Id_Categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Produit_Virtuel_Id_Rank` FOREIGN KEY (`Id_Rank`) REFERENCES `Rank` (`Id_Rank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Produit_Virtuel_Id_boutique` FOREIGN KEY (`Id_boutique`) REFERENCES `Boutique` (`Id_boutique`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Produit_Virtuel_Id_dimension` FOREIGN KEY (`Id_dimension`) REFERENCES `Dimension` (`Id_dimension`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Sous_Categorie`
--
ALTER TABLE `Sous_Categorie`
  ADD CONSTRAINT `FK_Sous_Categorie_Id_Categorie` FOREIGN KEY (`Id_Categorie`) REFERENCES `Categorie` (`Id_Categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Support`
--
ALTER TABLE `Support`
  ADD CONSTRAINT `FK_Support_Idutil` FOREIGN KEY (`Idutil`) REFERENCES `Utilisateur` (`Idutil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Vendeur`
--
ALTER TABLE `Vendeur`
  ADD CONSTRAINT `FK_Vendeur_Id_Client` FOREIGN KEY (`Id_Client`) REFERENCES `Client` (`Id_Client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Vendeur_Idutil` FOREIGN KEY (`Idutil`) REFERENCES `Utilisateur` (`Idutil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Wish_List`
--
ALTER TABLE `Wish_List`
  ADD CONSTRAINT `FK_Wish_List_Id_Client` FOREIGN KEY (`Id_Client`) REFERENCES `Client` (`Id_Client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Wish_List_Idutil` FOREIGN KEY (`Idutil`) REFERENCES `Utilisateur` (`Idutil`) ON DELETE CASCADE ON UPDATE CASCADE;
