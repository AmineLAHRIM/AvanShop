<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 26/03/2018
 * Time: 18:09
 */

namespace Core;

//qui fait la configuration de db_name db_user .. from array config/config.php
//singleton
class Config
{
    private static $_instance;
    private $setting = [];

    //Cree l'objet si il n'exite pas
    //return objet de type Config qui a $setting[] et function get

    public function __construct()
    {
        $this->setting = require '../config/config.php';
    }

    //getInstance faire appeler pour cree l'instance et sauvgarder sur array $setting

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    //Recherche sur array $setting par la cle $key

    public function get($key)
    {//on na pas fait static car on sure que tout nos projet il y a une seule instance de Class Config (Singleton)
        if (!isset($this->setting[$key])) {
            return null;
        }
        return $this->setting[$key];
    }

}