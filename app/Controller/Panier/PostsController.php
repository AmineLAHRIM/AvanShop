<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:28
 */

namespace App\Controller\Panier;

use App\App;
use App\Auth\UtilAuth;
use App\Table\ArticleTable;
use App\Table\PanierTable;
use App\Table\Produit_VirtuelTable;
use App\Table\UtilisateurTable;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{
    public function index()
    {
        $this->indexEspace();

    }

    public function indexEspace()
    {
        $auth=UtilAuth::getInstance();
        $panierId=$auth->getPanierId();
        $articles=ArticleTable::findbyIdpanier($panierId);
        App::getInstance()->setTitle("Panier");
        $form = new BootstrapForm();
        $this->render("panier.espace.index", compact("form","articles","panierId"));
    }

    public function deleteEspace()
    {
        if (!empty($_POST)) {

            $Article=ArticleTable::find($_POST['id']);
            $produitId=$Article->Id_ProduitV;

            $produit_virtuel=Produit_VirtuelTable::find($produitId);
            $lastOne=$produit_virtuel->Quantite_stock+$Article->Qte_Article;

            Produit_VirtuelTable::update($produitId,[
                'Quantite_stock'=>$lastOne
            ]);

            $result = ArticleTable::delete($_POST['id']);//je recupere pas en $_GET c'est tres dangeurex je recupere en $_POST par le petit form dan vendeur/posts/index.php

            if ($result) {

                header('Location: index.php?p=panier.espace.index');

            }

        }
        $this->render("panier.espace.delete");


    }

    public function pdfEspace()
    {
        if (isset($_POST['idpanier'])) {

            $auth=UtilAuth::getInstance();

            $contenthtml=$auth->getPanierId();


            $util=UtilisateurTable::find($auth->getUtilId());

            $panier=PanierTable::findbyIdutil($util->Idutil);
            $articles=ArticleTable::findbyIdpanier($panier->Id_Panier);

        }
        $this->render("panier.espace.pdf",compact("contenthtml","util","panier","articles"));


    }
    public function getHTMLPDF(){
        $auth=UtilAuth::getInstance();

        $util=UtilisateurTable::find($auth->getUtilId());

    }

}