<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:28
 */

namespace App\Controller;

use App\App;
use App\Auth\UtilAuth;
use App\Table\ArticleTable;
use App\Table\BoutiqueTable;
use App\Table\CategorieTable;
use App\Table\ClientTable;
use App\Table\ImageTable;
use App\Table\PanierTable;
use App\Table\Produit_VirtuelTable;
use App\Table\RankTable;
use App\Table\UtilisateurTable;
use App\Table\VendeurTable;
use App\Table\Wish_ListTable;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{


    public function home()
    {
        $articles = ArticleTable::getLast();
        $categories = CategorieTable::all();
        $this->render("posts.home", compact('articles', 'categories')
        );
    }

    public function category()
    {


        $app = App::getInstance();
        if (isset($_GET['id']) && isset($_GET['p'])) {
            $categorie = CategorieTable::find($_GET['id']);

        } else {
            $this->notFound();
        }


        if ($categorie == false) {

            $this->notFound();

        } else {
            $data = ArticleTable::getLast();
            $articles = ArticleTable::lastByCategory($_GET['id']);
            $categories = CategorieTable::all();
            $app->setTitle($categorie->titre);
        }

        $this->render("posts.category", compact("articles", "categories", "categorie", "data"));
    }

    public function single()
    {
        $article = ArticleTable::find($_GET['id']);
        $categorie = CategorieTable::find($article->categorie_id);

        if ($article === false) {
            App::getInstance()->notFound();
        }
        App::getInstance()->setTitle($article->titre);
        $this->render("posts.single", compact("article", "categorie"));

    }


    public function acceuil()
    {

        $produits_virtuel = Produit_VirtuelTable::all();
        $search = "";

        if (isset($_POST['search']) && isset($_POST['ok'])) {
            $search = $_POST['search'];

        } elseif (isset($_POST['ok2'])) {
            $catId=$_POST['Id_Categorie'];

            $produits_virtuel = Produit_VirtuelTable::findbyIdcategorie($catId);
        } elseif (isset($_GET['search'])) {
            $search = $_GET['search'];
        }elseif (isset($_GET['cat'])){
            $nomcat=$_GET['cat'];
            $cat=CategorieTable::findByNomCategorie($nomcat);


            $produits_virtuel = Produit_VirtuelTable::findbyIdcategorie($cat->Id_Categorie);

        }



        if (!isset($_POST['ok2']) && $search != "") {
            $this->AlgoSearch($produits_virtuel, $search);
            $produits_virtuel = Produit_VirtuelTable::allordred();

        } elseif (!isset($_POST['ok2']) && trim($search) == "") {
            foreach ($produits_virtuel as $p) {
                Produit_VirtuelTable::update($p->Id_ProduitV, [
                    'nbrrank' => '0'
                ]);
            }

        }


        App::getInstance()->setTitle("Product");
        $form = new BootstrapForm();
        $this->render("posts.acceuil", compact("form", "produits_virtuel"));


    }

    //Acceuil

    public function AlgoSearch($produits_virtuel, $search)
    {

        $search = explode(" ", $search);

        foreach ($produits_virtuel as $produit_virtuel) {
            $nbrrank = 0;
            $libelle = 0;
            $Tags = 0;
            $ShortdescriptionP = 0;
            $Longdescription = 0;
            $Rank = RankTable::find($produit_virtuel->Id_Rank);
            $start1 = $Rank->starnbr1;
            $start2 = $Rank->starnbr2;
            $start3 = $Rank->starnbr3;
            $start4 = $Rank->starnbr4;
            $start5 = $Rank->starnbr5;

            $SommeStars = ($start1 + $start2 + $start3 + $start4 + $start5);
            if ($SommeStars == 0) {
                $R = 0;
            } else {
                $R = (($start1 * 1) + ($start2 * 2) + ($start3 * 3) + ($start4 * 4) + ($start5 * 5)) / $SommeStars;

            }
            for ($i = 0; $i < count($search); $i++) {
                $libelle += substr_count($produit_virtuel->Libelle_Produit, $search[$i]);
                $Tags += substr_count($produit_virtuel->TagP, $search[$i]);

                $ShortdescriptionP += substr_count($produit_virtuel->ShortdescriptionP, $search[$i]);
                $Longdescription += substr_count($produit_virtuel->Longdescription, $search[$i]);

            }


            $SommeCoeff = $libelle + $Tags + $ShortdescriptionP + $Longdescription;
            if ($SommeCoeff == 0) {
                $nbrrank = 0;
            } else {

                $nbrrank = ((4 * $libelle) + (0.375 * $Tags) + (0.25 * $R) + (0.25 * $ShortdescriptionP) + (0.125 * $Longdescription));


            }
            $resultproduit_virtuel = Produit_VirtuelTable::update($produit_virtuel->Id_ProduitV, [
                'nbrrank' => $nbrrank
            ]);
        }
    }

    //Boutique

    public function boutique()
    {
        $auth = UtilAuth::getInstance();
        if (!$auth->logged()) {

            header('Location: index.php?p=posts.login');

        } elseif ($auth->isVendeur()) {
            header('Location: index.php?p=vendeur.produit_Virtuel.index');


            //goto Boutique Product
        } elseif (!empty($_POST)) {

            $resultVendeur = VendeurTable::create([
                'Id_Client' => $auth->getClientId(),
                'Idutil' => $auth->getId()
            ]);
            $auth->setVendeurId(App::getInstance()->getDatabase()->lastinsertid());


            /*(var_dump($auth->getVendeurId());
            var_dump($auth->getVendeurId(),$auth->getClientId(),$auth->getId());*/

            $resultBoutique = BoutiqueTable::create([
                'Nom_boutique' => $_POST['Nom_boutique'],
                'Short_descriptionB' => $_POST['Short_descriptionB'],
                'Long_DescriptionB' => $_POST['Long_DescriptionB'],
                'Logo_boutique' => "",
                'Id_vendeur' => $auth->getVendeurId(),
                'Id_Client' => $auth->getClientId(),
                'Idutil' => $auth->getId()

            ]);
            $auth->setBoutiqueId(App::getInstance()->getDatabase()->lastinsertid());
            if ($resultVendeur && $resultBoutique) {
                //(1)
                //header('Location: index.php?p=admin.posts.edit&id=' . App::getInstance()->getDatabase()->lastinsertid());
                header('Location: index.php?p=posts.splash');

            } else {
                $errors = true;
            }

        }
        App::getInstance()->setTitle("Boutique");
        $this->render("posts.boutique");
    }

    //Contactus
    public function contactus()
    {

        App::getInstance()->setTitle("Contact Us");
        $this->render("posts.contactus");
    }

    //Login
    public function login()
    {
        $auth = UtilAuth::getInstance();
        $errors = false;

        //click sur Login si deja logged
        if ($auth->getId()) {
            header('Location: index.php?p=posts.splash');
        } elseif (!empty($_POST)) {
            //auth

            if ($auth->login($_POST['Email'], $_POST['Pass'])) {
                //(1)
                //header('Location: index.php?p=admin.posts.edit&id=' . App::getInstance()->getDatabase()->lastinsertid());
                header('Location: index.php?p=posts.splash');

            } else {
                $errors = true;
            }

        }
        App::getInstance()->setTitle("Login");
        $this->render("posts.login");
    }

    //Product
    public function product()
    {

        $produit_virtuel = Produit_VirtuelTable::find($_GET['id']);
        $path = ROOT . '/public/';
        $imageSrc = ImageTable::findbyIdproduit_virtuel($produit_virtuel->Id_ProduitV) != null ? str_replace($path, "", ImageTable::findbyIdproduit_virtuel($produit_virtuel->Id_ProduitV)->Src_image) : 'img/placeholder-image.png';
        $auth = UtilAuth::getInstance();

        //si pas connecter aller s'authentifer et meme temps $auth remplire
        if (!$auth->logged()) {
            header('Location: index.php?p=posts.login');
        }


        if (isset($_POST['add'])) {
            $resultpanier = ArticleTable::create([
                'Nom_article' => $produit_virtuel->Libelle_Produit,
                'Qte_Article' => $_POST['qte'],
                'Id_Panier' => $auth->getPanierId(),
                'Id_wish' => $auth->getWishId(),
                'Id_ProduitV' => $produit_virtuel->Id_ProduitV

            ]);
            if ($resultpanier) {
                $newQte = $produit_virtuel->Quantite_stock - $_POST['qte'];
                Produit_VirtuelTable::update($produit_virtuel->Id_ProduitV, [
                    'Quantite_stock' => $newQte
                ]);
                header('Location: index.php?p=posts.product&id=' . $produit_virtuel->Id_ProduitV);

            }
        }


        App::getInstance()->setTitle("Product");
        $this->render("posts.product", compact("produit_virtuel", "imageSrc"));
    }


    //Signup
    public function signup()
    {
        $auth = UtilAuth::getInstance();

        if (!empty($_POST)) {

            $resultutilisateur = UtilisateurTable::create([
                'Nom' => $_POST['Nom'],
                'Prenom' => $_POST['Prenom'],
                'Sexe' => "",
                'Tele' => $_POST['Tele'],
                'Adresse' => $_POST['Adresse'],
                'Code_Postal' => "",
                'Pays' => "",
                'Email' => $_POST['Email'],
                'Login' => $_POST['Email'],
                'Pass' => sha1($_POST['Pass'])
            ]);
            $idutil = App::getInstance()->getDatabase()->lastinsertid();


            $resultclient = ClientTable::create([
                'Idutil' => $idutil
            ]);
            $idclient = App::getInstance()->getDatabase()->lastinsertid();
            $resultpanier = PanierTable::create([
                'Id_Client' => $idclient,
                'Idutil' => $idutil
            ]);
            $resultwish = Wish_ListTable::create([
                'Id_Client' => $idclient,
                'Idutil' => $idutil
            ]);
            //Save $_SESSION['utilauth'] and $_SESSION['clientauth']
            if (!$auth->getId()) {
                $auth->login($_POST['Email'], $_POST['Pass']);
            }
            $auth->setClientId($_SESSION['clientauth']);

            if ($resultutilisateur && $resultclient && $resultpanier && $resultwish) {
                //(1)
                //header('Location: index.php?p=admin.posts.edit&id=' . App::getInstance()->getDatabase()->lastinsertid());
                header('Location: index.php?p=posts.splash');

            } else {
                $errors = true;
            }

        }
        App::getInstance()->setTitle("Sign Up");
        $this->render("posts.signup");
    }

    //Splash
    public function splash()
    {
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            //var_dump($search);
            if (trim($search) == "") {
                //var_dump("d");
                header('Location: index.php?p=posts.acceuil');


            } else {

                header('Location: index.php?p=posts.acceuil&search=' . $_POST['search']);
            }
        }

        App::getInstance()->setTitle("HOME");
        $form = new BootstrapForm();
        $this->render("posts.splash", compact("form"));
    }


}