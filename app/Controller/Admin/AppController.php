<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:28
 */

namespace App\Controller\Admin;


use App\App;
use Core\Auth\DBAuth;

//cette Class pour jouer une action intermedire entre PostsController et Class mere Contoroller
class AppController extends \App\Controller\AppController
{

    protected $template = "defaultbootstramp";

    public function __construct()
    {
        parent::__construct();
        //Auth
        $app = App::getInstance();
        $db = $app->getDatabase();
        $auth = new DBAuth($db);

        if (!$auth->logged()) {
            $this->forbidden();
        }
    }
}