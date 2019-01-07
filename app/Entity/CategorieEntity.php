<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 18/04/2018
 * Time: 14:46
 */

namespace App\Entity;


use Core\Entity\Entity;

class CategorieEntity extends Entity
{
    protected static $table = 'Categorie';


    public function getUrl()
    {
        return 'index.php?p=posts.category&id=' . $this->id;
    }
}