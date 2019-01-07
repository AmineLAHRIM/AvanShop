<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/03/2018
 * Time: 17:10
 */

namespace App\Table;

use App;
use Core\Table\Table;

class CategorieTable extends Table
{
    protected static $table = 'Categorie';

    /**
     * @param $index
     * @return \App\Entity\CategorieEntity
     */
    public static function find($index)
    {
        $class_name = static::$table;

        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("SELECT * FROM {$class_name} WHERE id={$index}", null, true);
    }

    public static function findByNomCategorie($index)
    {
        $class_name = static::$table;

        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("SELECT * FROM {$class_name} WHERE Nom_categorie=\"".$index."\"", null, true);
    }

}