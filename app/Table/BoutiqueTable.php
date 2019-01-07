<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 01/05/2018
 * Time: 01:41
 */

namespace App\Table;


use Core\Table\Table;

class BoutiqueTable extends Table
{
    protected static $table = 'Boutique';

    public static function find($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Id_boutique={$index}", null, true);
    }

}