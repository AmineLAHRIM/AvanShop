<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 18/04/2018
 * Time: 14:46
 */

namespace App\Entity;


use Core\Entity\Entity;

class Produit_VirtuelEntity extends Entity
{
    protected static $table = 'Produit_Virtuel';

    protected function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
        $html .= '<a href="' . $this->getUrl() . '">Voir la suite</a>';
        return $html;
    }

    protected function getUrl()
    {
        return 'index.php?p=vendeur.produit_Virtuel.show&id=' . $this->Id_ProduitV;
    }

    protected function getShort()
    {
        $html = '<p>' . substr($this->ShortdescriptionP, 0, 30) . '...</p>';
        $html .= '<a href="' . $this->getUrl() . '">Voir la suite</a>';
        return $html;
    }

    protected function getLong()
    {
        $html = '<p>' . substr($this->Longdescription, 0, 30) . '...</p>';
        $html .= '<a href="' . $this->getUrl() . '">Voir la suite</a>';
        return $html;
    }
}