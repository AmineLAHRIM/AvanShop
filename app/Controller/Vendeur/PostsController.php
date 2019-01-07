<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:28
 */

namespace App\Controller\Vendeur;


use App\App;
use App\Auth\UtilAuth;
use App\Table\CategorieTable;
use App\Table\DimensionTable;
use App\Table\ImageTable;
use App\Table\Produit_VirtuelTable;
use App\Table\RankTable;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{
    //interface Vendeur
    public function index()
    {
        $this->indexProduit_Virtuel();


    }

    //Produit
    public function indexProduit_Virtuel()
    {
        $auth = UtilAuth::getInstance();
        $produits_virtuel = Produit_VirtuelTable::findbyIdboutique($auth->getBoutiqueId());
        $this->render("vendeur.produit_Virtuel.index", compact('produits_virtuel')
        );
    }


    /*public function indexCategorie()
    {
        $categories = CategorieTable::all();
        $form = new BootstrapForm($categories);

        $this->render("vendeur.categorie.index", compact('categories', 'form')
        );
    }*/

    public function addProduit_Virtuel()
    {


        if (!empty($_POST)) {

            $auth = UtilAuth::getInstance();

            //create rank row
            $result_rank = RankTable::create([
                'starnbr1' => 0,
                'starnbr2' => 0,
                'starnbr3' => 0,
                'starnbr4' => 0,
                'starnbr5' => 0
            ]);
            $rankid = App::getInstance()->getDatabase()->lastinsertid();

            //create dismension row
            $result_dimension = DimensionTable::create([
                'Longeur_Dimension' => $_POST['Longeur_Dimension'],
                'Largeur_Dimension' => $_POST['Largeur_Dimension'],
                'Hauteur_Dimension' => $_POST['Hauteur_Dimension'],
                'Poid_Dimension' => $_POST['Poid_Dimension']
            ]);

            $dimensinoid = App::getInstance()->getDatabase()->lastinsertid();


            //create produit_virtuel row
            $result_produit_virtuel = Produit_VirtuelTable::create([
                'Libelle_Produit' => $_POST['Libelle_Produit'],
                'Prix_Unitaire' => $_POST['Prix_Unitaire'],
                'ShortdescriptionP' => $_POST['ShortdescriptionP'],
                'Longdescription' => $_POST['Longdescription'],
                'TagP' => $_POST['TagP'],
                'Quantite_stock' => $_POST['Quantite_stock'],
                'Prix_promotion' => $_POST['Prix_promotion'],
                'PrixLivraison' => $_POST['PrixLivraison'],
                'Id_Rank' => $rankid,
                'Id_dimension' => $dimensinoid,
                'Id_Categorie' => $_POST['Id_Categorie'],
                'Id_boutique' => $auth->getBoutiqueId(),
                'nbrrank' => '0'
            ]);
            $produit_virtuelid = App::getInstance()->getDatabase()->lastinsertid();

            //uplode images produit
            $path = ROOT . "/public/DATAIMG/{$auth->getVendeurId()}/{$produit_virtuelid}";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            for ($i = 0; $i < count($_FILES['img']['name']); $i++) {
                $tmp_name = $_FILES['img']['tmp_name'][$i];
                $type = $_FILES['img']['type'][$i];
                $name = $_FILES['img']['name'][$i];
                //$url = 'amin\\'.$auth->getVendeurId().'\\'.$produit_virtuelid.'\\'.$name;
                $url = $path . "/" . $name;
                move_uploaded_file($tmp_name, $url);
                //Create Image DB
                $result_image = ImageTable::create([
                    "Src_image" => $url,
                    "Id_ProduitV" => $produit_virtuelid
                ]);

            }


            $errors = true;
            if ($result_produit_virtuel && $result_rank && $result_dimension && $result_image) {
                //(1)
                //header('Location: index.php?p=admin.posts.edit&id=' . App::getInstance()->getDatabase()->lastinsertid());
                //header('Location: index.php?p=vendeur.produit_Virtuel.add');
                $errors = false;
                $_POST = null;

            }

        }

        $form = new BootstrapForm($_POST);
        $categorie = CategorieTable::all();

        $this->render("vendeur.produit_Virtuel.add", compact("form", "errors", "categorie"));


    }

    public function deleteProduit_Virtuel()
    {
        if (!empty($_POST)) {

            $result = Produit_VirtuelTable::delete($_POST['id']);//je recupere pas en $_GET c'est tres dangeurex je recupere en $_POST par le petit form dan vendeur/posts/index.php

            if ($result) {

                header('Location: index.php?p=vendeur.produit_Virtuel.index');

            }

        }
        $this->render("vendeur.produit_Virtuel.delete");


    }


    public function editProduit_Virtuel()
    {
        $produit_virtuel = Produit_VirtuelTable::find($_GET['id']);

        if (!empty($_POST)) {

            $auth = UtilAuth::getInstance();


            //create dismension row

            $result_dimension = DimensionTable::update($produit_virtuel->Id_dimension, [
                'Longeur_Dimension' => $_POST['Longeur_Dimension'],
                'Largeur_Dimension' => $_POST['Largeur_Dimension'],
                'Hauteur_Dimension' => $_POST['Hauteur_Dimension'],
                'Poid_Dimension' => $_POST['Poid_Dimension']
            ]);


            //create produit_virtuel row
            $result_produit_virtuel = Produit_VirtuelTable::update($produit_virtuel->Id_ProduitV, [
                'Libelle_Produit' => $_POST['Libelle_Produit'],
                'Prix_Unitaire' => $_POST['Prix_Unitaire'],
                'ShortdescriptionP' => $_POST['ShortdescriptionP'],
                'Longdescription' => $_POST['Longdescription'],
                'TagP' => $_POST['TagP'],
                'Quantite_stock' => $_POST['Quantite_stock'],
                'Prix_promotion' => $_POST['Prix_promotion'],
                'PrixLivraison' => $_POST['PrixLivraison'],
                'Id_Categorie' => $_POST['Id_Categorie'],

            ]);


            $errors = true;
            if ($result_produit_virtuel) {
                //(1)
                //header('Location: index.php?p=admin.posts.edit&id=' . App::getInstance()->getDatabase()->lastinsertid());
                //header('Location: index.php?p=vendeur.produit_Virtuel.add');
                $errors = false;


            }


        }


        //si tu ajoute et tu veux afficher les infos d'article ajouter sur form modifier tu doit recuperr id par header voir (1) sinon tu doit faire BootstrampForm($_POST) pour recuprer les donnes et si tu submit et action vers meme page (header) la page et les donnnes reste sur la page
        $produit_virtuel = Produit_VirtuelTable::find($_GET['id']);
        $dimension_produit = DimensionTable::find($produit_virtuel->Id_dimension);

        $form = new BootstrapForm($produit_virtuel);
        $formDimension = new  BootstrapForm($dimension_produit);
        $this->render("vendeur.produit_Virtuel.edit", compact("form", "formDimension", "errors"));


    }

    public function showProduit_Virtuel()
    {
        $produit_virtuel = Produit_VirtuelTable::find($_GET['id']);
        $dimension_produit = DimensionTable::find($produit_virtuel->Id_dimension);

        $form = new BootstrapForm($produit_virtuel);
        $formDimension = new  BootstrapForm($dimension_produit);
        $this->render("vendeur.produit_Virtuel.show", compact("form", "formDimension"));


    }
    /*
    public function addCategorie()
    {
        $errors = false;
        if (!empty($_POST)) {
            $result = CategorieTable::create(['titre' => $_POST['titre']]);


            if ($result) {
                //header('Location: index.php?p=admin.posts.edit&id=' . App::getInstance()->getDatabase()->lastinsertid());
                header('Location: index.php?p=admin.posts.index');
                ?>
                <div class="alert alert-success">La Categorie Bien ete Ajouté</div>
                <?php

            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render("admin.categorie.add", compact("form", "errors"));
    }

    public function deleteCategorie()
    {
        if (!empty($_POST)) {

            $result = CategorieTable::delete($_POST['id']);//je recupere pas en $_GET c'est tres dangeurex je recupere en $_POST par le petit form dan admin/posts/index.php
            if ($result) {
                header('Location: index.php?p=admin.posts.index');
                ?>
                <div class="alert alert-success">La Categorie Bien ete Supprimé</div>
                <?php
            }

        }
        $this->render("admin.categorie.delete");


    }

    public function editCategorie()
    {
        if (!empty($_POST)) {

            $result = CategorieTable::update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            if ($result) {
                header('Location: index.php?p=admin.posts.index');
                ?>
                <div class="alert alert-success">La Categorie Bien ete Modifié</div>
                <?php
            }

        }


        $categorie = CategorieTable::find($_GET['id']);
        $form = new BootstrapForm($categorie);

        $this->render("admin.categorie.edit", compact("form", "categorie"));


    }*/


}