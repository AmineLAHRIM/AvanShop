#------------------------------------------------------------
#        Script MySQL. AVAASHOP WEBSITE AMINELAHRIM AYOUBRAKINI
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur (
  Idutil      INT NOT NULL AUTO_INCREMENT,
  Nom         VARCHAR(25),
  Prenom      VARCHAR(25),
  Sexe        VARCHAR(25),
  Tele        INT,
  Adresse     VARCHAR(25),
  Code_Postal INT,
  Pays        VARCHAR(25),
  Email       VARCHAR(25),
  Login       VARCHAR(25),
  Pass        VARCHAR(25),
  PRIMARY KEY (Idutil)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client (
  Id_Client INT NOT NULL AUTO_INCREMENT,
  Idutil    INT NOT NULL,
  PRIMARY KEY (Id_Client, Idutil)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Vendeur
#------------------------------------------------------------

CREATE TABLE Vendeur (
  Id_vendeur INT NOT NULL AUTO_INCREMENT,
  Id_Client  INT NOT NULL,
  Idutil     INT NOT NULL,
  PRIMARY KEY (Id_vendeur, Id_Client, Idutil)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Panier
#------------------------------------------------------------

CREATE TABLE Panier (
  Id_Panier INT NOT NULL AUTO_INCREMENT,
  Id_Client INT,
  Idutil    INT,
  PRIMARY KEY (Id_Panier)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Wish List
#------------------------------------------------------------

CREATE TABLE Wish_List (
  Id_wish   INT NOT NULL AUTO_INCREMENT,
  Id_Client INT,
  Idutil    INT,
  PRIMARY KEY (Id_wish)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Commande
#------------------------------------------------------------

CREATE TABLE Commande (
  Id_Commande   INT NOT NULL AUTO_INCREMENT,
  Date_Commande DATE,
  Id_Panier     INT,
  PRIMARY KEY (Id_Commande)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Facture
#------------------------------------------------------------

CREATE TABLE Facture (
  Id_Facture      INT NOT NULL AUTO_INCREMENT,
  Date_Facture    DATE,
  Montant_Facture FLOAT,
  Id_Paiement     INT,
  PRIMARY KEY (Id_Facture)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Produit Virtuel
#------------------------------------------------------------

CREATE TABLE Produit_Virtuel (
  Id_ProduitV       INT NOT NULL AUTO_INCREMENT,
  Libelle_Produit   VARCHAR(25),
  Prix_Unitaire     FLOAT,
  ShortdescriptionP VARCHAR(25),
  Longdescription   VARCHAR(25),
  TagP              VARCHAR(25),
  Quantite_stock    INT,
  Prix_promotion    FLOAT,
  PrixLivraison     FLOAT,
  Id_Rank           INT,
  Id_dimension      INT,
  Id_Categorie      INT,
  Id_boutique       INT,
  PRIMARY KEY (Id_ProduitV)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Rank
#------------------------------------------------------------

CREATE TABLE Rank (
  Id_Rank   INT NOT NULL AUTO_INCREMENT,
  1_starnbr INT,
  2_starnbr INT,
  3_starnbr INT,
  4_starnbr INT,
  5_starnbr INT,
  #Commentaire VARCHAR(25),
  PRIMARY KEY (Id_Rank)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Dimension
#------------------------------------------------------------

CREATE TABLE Dimension (
  Id_dimension      INT NOT NULL AUTO_INCREMENT,
  Longeur_Dimension FLOAT,
  Largeur_Dimension FLOAT,
  Hauteur_Dimension FLOAT,
  Poid_Dimension    FLOAT,
  PRIMARY KEY (Id_dimension)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie (
  Id_Categorie  INT NOT NULL AUTO_INCREMENT,
  Nom_categorie VARCHAR(25),
  PRIMARY KEY (Id_Categorie)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Boutique
#------------------------------------------------------------

CREATE TABLE Boutique (
  Id_boutique        INT NOT NULL AUTO_INCREMENT,
  Nom_boutique       VARCHAR(25),
  Short_descriptionB VARCHAR(25),
  Long_DescriptionB  VARCHAR(25),
  Logo_boutique      VARCHAR(25),
  Id_vendeur         INT,
  Id_Client          INT,
  Idutil             INT,
  PRIMARY KEY (Id_boutique)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Administrateur
#------------------------------------------------------------

CREATE TABLE Administrateur (
  Id_Admin INT NOT NULL AUTO_INCREMENT,
  Idutil   INT NOT NULL,
  PRIMARY KEY (Id_Admin, Idutil)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Article
#------------------------------------------------------------

CREATE TABLE Article (
  Id_article  INT NOT NULL AUTO_INCREMENT,
  Nom_article VARCHAR(25),
  Qte_Article INT,
  Id_Panier   INT,
  Id_wish     INT,
  Id_ProduitV INT,
  PRIMARY KEY (Id_article)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Sous Categorie
#------------------------------------------------------------

CREATE TABLE Sous_Categorie (
  Idsouscategorie  INT NOT NULL AUTO_INCREMENT,
  nomsous_catgorie VARCHAR(25),
  Id_Categorie     INT,
  PRIMARY KEY (Idsouscategorie)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Paiement
#------------------------------------------------------------

CREATE TABLE Paiement (
  Id_Paiement   INT NOT NULL AUTO_INCREMENT,
  Date_Paiement DATE,
  Id_Commande   INT,
  PRIMARY KEY (Id_Paiement)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Produit
#------------------------------------------------------------

#CREATE TABLE Produit (
 # Id_Produit  INT NOT NULL AUTO_INCREMENT,
 # Id_ProduitV INT NOT NULL,
 # PRIMARY KEY (Id_Produit, Id_ProduitV)
#)
  #ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Image
#------------------------------------------------------------

CREATE TABLE Image (
  Id_Image    INT NOT NULL AUTO_INCREMENT,
  Src_image   VARCHAR(25),
  Id_ProduitV INT,
  PRIMARY KEY (Id_Image)
)
  ENGINE = InnoDB;

#------------------------------------------------------------
# Table: Support
#------------------------------------------------------------

CREATE TABLE Support (
  Id_Support INT NOT NULL AUTO_INCREMENT,
  Idutil     INT NOT NULL,
  PRIMARY KEY (Id_Support, Idutil)
)
  ENGINE = InnoDB;

ALTER TABLE Client
  ADD CONSTRAINT FK_Client_Idutil FOREIGN KEY (Idutil) REFERENCES Utilisateur (Idutil)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Vendeur
  ADD CONSTRAINT FK_Vendeur_Id_Client FOREIGN KEY (Id_Client) REFERENCES Client (Id_Client)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Vendeur
  ADD CONSTRAINT FK_Vendeur_Idutil FOREIGN KEY (Idutil) REFERENCES Utilisateur (Idutil)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Panier
  ADD CONSTRAINT FK_Panier_Id_Client FOREIGN KEY (Id_Client) REFERENCES Client (Id_Client)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Panier
  ADD CONSTRAINT FK_Panier_Idutil FOREIGN KEY (Idutil) REFERENCES Utilisateur (Idutil)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Wish_List
  ADD CONSTRAINT FK_Wish_List_Id_Client FOREIGN KEY (Id_Client) REFERENCES Client (Id_Client)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Wish_List
  ADD CONSTRAINT FK_Wish_List_Idutil FOREIGN KEY (Idutil) REFERENCES Utilisateur (Idutil)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Commande
  ADD CONSTRAINT FK_Commande_Id_Panier FOREIGN KEY (Id_Panier) REFERENCES Panier (Id_Panier)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Facture
  ADD CONSTRAINT FK_Facture_Id_Paiement FOREIGN KEY (Id_Paiement) REFERENCES Paiement (Id_Paiement)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Produit_Virtuel
  ADD CONSTRAINT FK_Produit_Virtuel_Id_Rank FOREIGN KEY (Id_Rank) REFERENCES Rank (Id_Rank)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Produit_Virtuel
  ADD CONSTRAINT FK_Produit_Virtuel_Id_dimension FOREIGN KEY (Id_dimension) REFERENCES Dimension (Id_dimension)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Produit_Virtuel
  ADD CONSTRAINT FK_Produit_Virtuel_Id_Categorie FOREIGN KEY (Id_Categorie) REFERENCES Categorie (Id_Categorie)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Produit_Virtuel
  ADD CONSTRAINT FK_Produit_Virtuel_Id_boutique FOREIGN KEY (Id_boutique) REFERENCES Boutique (Id_boutique)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Boutique
  ADD CONSTRAINT FK_Boutique_Id_vendeur FOREIGN KEY (Id_vendeur) REFERENCES Vendeur (Id_vendeur)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Boutique
  ADD CONSTRAINT FK_Boutique_Id_Client FOREIGN KEY (Id_Client) REFERENCES Client (Id_Client)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Boutique
  ADD CONSTRAINT FK_Boutique_Idutil FOREIGN KEY (Idutil) REFERENCES Utilisateur (Idutil)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Administrateur
  ADD CONSTRAINT FK_Administrateur_Idutil FOREIGN KEY (Idutil) REFERENCES Utilisateur (Idutil)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Article
  ADD CONSTRAINT FK_Article_Id_Panier FOREIGN KEY (Id_Panier) REFERENCES Panier (Id_Panier)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Article
  ADD CONSTRAINT FK_Article_Id_wish FOREIGN KEY (Id_wish) REFERENCES Wish_List (Id_wish)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Article
  ADD CONSTRAINT FK_Article_Id_Produit FOREIGN KEY (Id_Produit) REFERENCES Produit (Id_Produit)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE Article
  ADD CONSTRAINT FK_Article_Id_ProduitV FOREIGN KEY (Id_ProduitV) REFERENCES Produit_Virtuel (Id_ProduitV)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Sous_Categorie
  ADD CONSTRAINT FK_Sous_Categorie_Id_Categorie FOREIGN KEY (Id_Categorie) REFERENCES Categorie (Id_Categorie)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Paiement
  ADD CONSTRAINT FK_Paiement_Id_Commande FOREIGN KEY (Id_Commande) REFERENCES Commande (Id_Commande)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Produit
  ADD CONSTRAINT FK_Produit_Id_ProduitV FOREIGN KEY (Id_ProduitV) REFERENCES Produit_Virtuel (Id_ProduitV)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Image
  ADD CONSTRAINT FK_Image_Id_ProduitV FOREIGN KEY (Id_ProduitV) REFERENCES Produit_Virtuel (Id_ProduitV)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE Support
  ADD CONSTRAINT FK_Support_Idutil FOREIGN KEY (Idutil) REFERENCES Utilisateur (Idutil)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
