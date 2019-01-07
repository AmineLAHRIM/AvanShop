<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:28
 */

namespace App\Controller\Panier;


//cette Class pour jouer une action intermedire entre PostsController et Class mere Contoroller

use App\App;
use App\Auth\UtilAuth;

class AppController extends \App\Controller\AppController
{
    protected $template = "default";


    public function __construct()
    {
        parent::__construct();
        //Auth
        $app = App::getInstance();
        $db = $app->getDatabase();
        $auth = UtilAuth::getInstance();

        if (!$auth->logged()) {
            $this->forbidden();
        }
    }

    protected function loadModel($model_name)
    {

        //$this->$model_name = '\\App\\Table\\'.$model_name;

    }
}