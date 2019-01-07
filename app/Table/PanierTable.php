<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 22/03/2018
 * Time: 16:56
 */

namespace App\Table;

use Core\Table\Table;


class PanierTable extends Table
{

    protected static $table = 'Panier';
    protected static $primarykey = 'Id_Panier';

    public static function find($index)
    {
        $class_name = static::$table;

        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("SELECT * FROM {$class_name} WHERE Id_Panier={$index}", null, true);
    }


}