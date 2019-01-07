<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 21/03/2018
 * Time: 13:12
 */
session_start();
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
\App\App::load();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'posts.splash';

}

//initialisation des objets
$app = \App\App::getInstance();
$db = $app->getDatabase();
$p = explode('.', $p);
if ($p[0] === 'admin' || $p[0] === 'vendeur' || $p[0] === "panier") {

    $Controller = 'App\Controller\\' . ucfirst($p[0]) . '\\' . 'PostsController';

    //test sur l'action
    if ($p[2] === 'index') {
        $action = $p[2];
        //$Controller = 'App\Controller\\'.ucfirst($p[0]).'\\' . ucfirst($p[1]) . 'Controller';


    } else {
        if ($p[1] === 'posts') {
            $action = $p[2] . 'Article';


        } else {
            $action = $p[2] . ucfirst($p[1]);


        }


    }

} else {
    $action = $p[1];
    $Controller = 'App\Controller\\' . ucfirst($p[0]) . 'Controller';
}
/*var_dump("");
var_dump("");
var_dump("");
var_dump($Controller,$p,$action);*/

//Generer les Views HTML
$Controller = new $Controller();
$Controller->$action();



/*
if ($p === 'posts.home') {//<---- equivalent au  App/Controller/PostsController// laction home
    $Controller = new App\Controller\PostsController();
    $Controller->home();
} elseif ($p === 'posts.single') {
    $Controller = new App\Controller\PostsController();
    $Controller->single();
} elseif ($p === 'posts.category') {
    $Controller = new App\Controller\PostsController();
    $Controller->category();
} elseif ($p === 'users.login') {//<---- equivalent au  App/Controller/UsersController// laction login
    $Controller = new App\Controller\UsersController();
    $Controller->login();
} elseif ($p === 'admin.posts.index') {//<---- equivalent au  App/Controller/Admin/PostsController// laction index
    $Controller = new App\Controller\Admin\PostsController();
    $Controller->index();
} elseif ($p === 'admin.posts.add') {
    $Controller = new App\Controller\Admin\PostsController();
    $Controller->add();
} elseif ($p === 'admin.posts.edit') {
    $Controller = new App\Controller\Admin\PostsController();
    $Controller->edit();
} elseif ($p === 'admin.posts.delete') {
    $Controller = new App\Controller\Admin\PostsController();
    $Controller->delete();
}*/
/*if ($p === 'home') {
    require '../app/Views/posts/home.php';
} elseif ($p === 'posts.article') {
    require '../app/Views/posts/single.php';
} elseif ($p === 'posts.categorie') {
    require '../app/Views/posts/category.php';
} elseif ($p === 'login') {
    require '../app/Views/users/login.php';
} else {
    require '../app/Views/posts/home.php';
}*/
/*
if($p==='acceuil'){
    require '../app/Views/acceuil.php';
}elseif ($p==='product'){
    require '../app/Views/product.php';
}elseif ($p==='signup'){
    require '../app/Views/signup.php';
}elseif ($p==='login'){
    require '../app/Views/login.php';
}elseif ($p==='contactus'){
    require '../app/Views/contactus.php';
}elseif ($p==='boutique'){
    require '../app/Views/boutique.php';
}elseif ($p==='product'){
    require '../app/Views/product.php';
}*/

