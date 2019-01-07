<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 01/05/2018
 * Time: 01:41
 */

namespace App\Table;


use Core\Table\Table;

class RankTable extends Table
{
    protected static $table = 'Rank';

    public static function find($index)
    {
        $class_name = static::$table;


        return static::query("SELECT * FROM {$class_name} WHERE Id_Rank={$index}", null, true);
    }

    public static function findbyId_ProduitV($index)
    {
        return static::query("SELECT a.* FROM Rank r INNER JOIN Produit_Virtuel p ON r.Id_Rank=p.Id_Rank WHERE Id_ProduitV={$index}", null, true);

    }

}