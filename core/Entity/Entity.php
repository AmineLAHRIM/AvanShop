<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 18/04/2018
 * Time: 14:46
 */


namespace Core\Entity;


class Entity
{


    public function __get($name)//$name c'est url ou extrait
    {
        //var_dump('Methode magique __get');
        /*il dit bon j'ai une savoir sur $name url donc il doit pas appliquer
         cette fonction magique mais a conditon de faire $this->$name et pas $name seulment
        */
        // TODO: Implement __get() method.
        $method = 'get' . ucfirst($name);//getUrl ou getExtrait
        $this->$name = $this->$method();//c'est bizare hh mais ca fonctionne
        return $this->$name;
    }
}