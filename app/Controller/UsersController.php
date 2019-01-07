<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 25/04/2018
 * Time: 22:12
 */

namespace App\Controller;

use App\App;
use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;

class UsersController extends AppController
{
    protected $template = "defaultbootstramp";

    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDatabase());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=admin.posts.index');
            } else {
                $errors = true;
            }

        }
        $form = new BootstrapForm($_POST);//si qui a poster sur cette page verifier qui en bas par la fonction en haut
        $this->render("users.login", compact("form", "errors"));
    }

}