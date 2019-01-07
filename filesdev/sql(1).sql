INSERT INTO `Utilisateur` (`Idutil`, `Nom`, `Prenom`, `Sexe`, `Tele`, `Adresse`, `Code_Postal`, `Pays`, `Email`, `Login`, `Pass`)
VALUES
  (1, 'Rkaini', 'Ayoub', 'M', 620195467, 'Ain Mezouar Hay Saada', 40000, 'Maroc', 'rkainiayoub.ra@gmail.com', 'login1',
      'pass1'),
  (2, 'Lahrim', 'Amine', 'F', 63452681, 'Sidi Youssef Ben Ali', 43000, 'Maroc', 'lahrimamine@gmail.com', 'login2',
      'pass2'),
  (3, 'Halima', 'Halouma', 'F', 6345672, 'Daoudiate', 42000, 'Maroc', 'halima.ha@gmail.com', 'login3', 'pass3'),
  (4, 'Karim', 'Ahmedi', 'M', 66679709, 'Mehamid', 40000, 'Maroc', 'karimahmedi@gmail.com', 'login4', 'pass4');

INSERT INTO `Administrateur` (`Id_Admin`, `Idutil`) VALUES
  (1, 2),
  (2, 1);

INSERT INTO `Client` (`Id_Client`, `Idutil`) VALUES
  (1, 3),
  (2, 4);

INSERT INTO `Panier` (`Id_Panier`, `Date_Panier`, `Id_Client`, `Idutil`) VALUES
  (1, '2018-04-10 00:00:00', 1, 3),
  (2, '2018-04-11 00:00:00', 2, 4);


INSERT INTO `Commande` (`Id_Commande`, `Date_Commande`, `Id_Panier`) VALUES
  (1, '2018-04-10', 1),
  (2, '2018-04-18', 2);

INSERT INTO `Paiement` (`Id_Paiement`, `Date_Paiement`, `Id_Commande`) VALUES
  (1, '2018-04-20', 1),
  (2, '2018-04-26', 2);

INSERT INTO `Facture` (`Id_Facture`, `Date_Facture`, `Montant_Facture`, `Id_Paiement`) VALUES
  (1, '2018-04-20', 1200, 1),
  (2, '2018-04-26', 100, 2);


INSERT INTO `Vendeur` (`Id_vendeur`, `Id_Client`, `Idutil`) VALUES
  (1, 1, 3),
  (2, 2, 3);

INSERT INTO `Boutique` (`Id_boutique`, `Nom_boutique`, `Short_descriptionB`, `Long_DescriptionB`, `Logo_boutique`, `Id_vendeur`, `Id_Client`, `Idutil`)
VALUES
  (1, 'Boutique1', 'short1', 'loong1', 'logo1', 1, 1, 3),
  (2, 'Boutique2', 'short2', 'loong2', 'logo2', 2, 2, 3);

INSERT INTO `Rank` (`Id_Rank`, `1_starnbr`, `2_starnbr`, `3_starnbr`, `4_starnbr`, `5_starnbr`, `Commentaire`) VALUES
  (1, 1, 2, 3, 4, 5, NULL),
  (2, 5, 2, 3, 3, 1, NULL);

INSERT INTO Dimension (Dimension.Longeur_Dimension, Dimension.Largeur_Dimension, Dimension.Hauteur_Dimension, Dimension.Poid_Dimension)
VALUES
  (10, 20, 30, 20),
  (11, 22, 33, 20),
  (111, 222, 333, 30);

INSERT INTO Wish_List (Wish_List.Id_Client, Wish_List.Idutil) VALUES
  (1, 3),
  (2, 4);

INSERT INTO Support (Support.Idutil) VALUES
  (2)
