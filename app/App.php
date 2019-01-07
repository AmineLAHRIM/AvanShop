<?php


/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 22/03/2018
 * Time: 19:33
 */

namespace App;

use Core\Config;
use Core\Database\MysqlDatabase;

//singleton
//qui gere la relation entre la Table/Config.php et Core/Database/MysqlDatabase.php
//et qui gere aussi la relation entre autolader et le load des pages php sur tous le projet par
//qui gere la relation entre les pages php et Base donnee par /App/getDatabase()
class App
{
    /*const DB_NAME = "phpmysql";
    const DB_USER = "root";
    const DB_PASS = "root";
    const DB_HOST = "localhost";*/

    private static $db_instance;//l'instance du base de donner
    private static $_instance;
    private $title = 'AvanShop';

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }


    public static function load()
    {
        require ROOT . '/app/Autoloader.php';
        Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        \Core\Autoloader::register();
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /*public function getStyle($page_name){
        return $page_name
    }*/

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title . ' | ' . $this->title;
    }

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        $config = Config::getInstance();
        if (self::$db_instance == null) {
            self::$db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return self::$db_instance;
    }

}