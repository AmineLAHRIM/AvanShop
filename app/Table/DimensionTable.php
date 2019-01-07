<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 01/05/2018
 * Time: 01:41
 */

namespace App\Table;


use Core\Table\Table;

class DimensionTable extends Table
{
    protected static $table = 'Dimension';
    protected static $primarykey = 'Id_dimension';


    public static function find($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Id_dimension={$index}", null, true);
    }


}