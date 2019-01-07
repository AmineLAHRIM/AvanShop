<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 01/05/2018
 * Time: 01:41
 */

namespace App\Table;


use Core\Table\Table;

class ImageTable extends Table
{
    protected static $table = 'Image';
    protected static $primarykey = 'Id_Image';

    public static function find($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Id_Image={$index}", null, true);
    }

    public static function findbyIdproduit_virtuel($index)
    {
        $class_name = static::$table;
        return static::query("SELECT * FROM {$class_name} WHERE Id_ProduitV={$index}", null, true);//<------------------------
    }

}