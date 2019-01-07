<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:28
 */

namespace App\Controller;

use Core\Controller\Controller;

//cette Class pour jouer une action intermedire entre PostsController et Class mere Contoroller
class AppController extends Controller
{
    protected $template = "default";

    public function __construct()
    {
        $this->viewPath = ROOT . "/app/Views/";

    }

    protected function loadModel($model_name)
    {

        //$this->$model_name = '\\App\\Table\\'.$model_name;

    }
}