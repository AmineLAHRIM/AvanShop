<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 01/05/2018
 * Time: 01:41
 */

namespace App\Table;


use Core\Table\Table;

class Produit_VirtuelTable extends Table
{
    protected static $table = 'Produit_Virtuel';
    protected static $primarykey = 'Id_ProduitV';

    public static function find($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Id_ProduitV={$index}", null, true);
    }

    public static function findbyIdboutique($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Id_boutique={$index}", null, false);
    }

    public static function allordred()
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} ORDER BY nbrrank DESC ", null, false);
    }

    public static function findbyIdcategorie($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Id_Categorie={$index}", null, false);
    }


}