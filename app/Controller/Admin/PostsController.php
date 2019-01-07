<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:28
 */

namespace App\Controller\Admin;

use App\Table\ArticleTable;
use App\Table\CategorieTable;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{
    //interface Admin
    public function index()
    {
        $this->indexArticle();
        $this->indexCategorie();
    }

    //Article
    public function indexArticle()
    {
        $articles = ArticleTable::all();
        $this->render("admin.article.index", compact('articles')
        );
    }

    public function indexCategorie()
    {
        $categories = CategorieTable::all();
        $form = new BootstrapForm($categories);

        $this->render("admin.categorie.index", compact('categories', 'form')
        );
    }

    public function addArticle()
    {

        $errors = false;
        if (!empty($_POST)) {

            $result = ArticleTable::create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id']
            ]);

            if ($result) {
                //(1)
                //header('Location: index.php?p=admin.posts.edit&id=' . App::getInstance()->getDatabase()->lastinsertid());
                header('Location: index.php?p=admin.posts.index');


            } else {
                $errors = true;
            }

        }

        $form = new BootstrapForm($_POST);
        $this->render("admin.article.add", compact("form", "errors"));


    }

    public function deleteArticle()
    {
        if (!empty($_POST)) {

            $result = ArticleTable::delete($_POST['id']);//je recupere pas en $_GET c'est tres dangeurex je recupere en $_POST par le petit form dan admin/posts/index.php
            if ($result) {
                header('Location: index.php?p=admin.posts.index');

            }

        }
        $this->render("admin.article.delete");


    }

    //Categorie

    public function editArticle()
    {
        if (!empty($_POST)) {

            $result = ArticleTable::update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id']
            ]);
            if ($result) {
                header('Location: index.php?p=admin.posts.index');
                ?>
                <div class="alert alert-success">L'article Bien ete Modifié</div>
                <?php
            }

        }

        //si tu ajoute et tu veux afficher les infos d'article ajouter sur form modifier tu doit recuperr id par header voir (1) sinon tu doit faire BootstrampForm($_POST) pour recuprer les donnes et si tu submit et action vers meme page (header) la page et les donnnes reste sur la page
        $article = ArticleTable::find($_GET['id']);
        $form = new BootstrapForm($article);
        $this->render("admin.article.edit", compact("form", "article"));


    }

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


    }


}