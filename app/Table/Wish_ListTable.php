<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 22/03/2018
 * Time: 16:56
 */

namespace App\Table;

use Core\Table\Table;


class Wish_ListTable extends Table
{

    protected static $table = 'Wish_List';
    protected static $primarykey = 'Id_wish';

    public static function find($index)
    {
        $class_name = static::$table;

        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("SELECT * FROM {$class_name} WHERE Id_wish={$index}", null, true);
    }


}