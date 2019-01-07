<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 01/05/2018
 * Time: 01:41
 */

namespace App\Table;


use Core\Table\Table;

class UtilisateurTable extends Table
{
    protected static $table = 'Utilisateur';

    public static function find($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE idutil={$index}", null, true);
    }

    public static function findbyEmail($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Email='{$index}'", null, true);
    }
}