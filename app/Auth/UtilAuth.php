<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 01/05/2018
 * Time: 02:08
 */

namespace App\Auth;


use App\App;
use App\Table\BoutiqueTable;
use App\Table\ClientTable;
use App\Table\PanierTable;
use App\Table\VendeurTable;
use App\Table\Wish_ListTable;


class UtilAuth
{
    private static $_instance;
    private static $db;
    private $UtilId;
    private $ClientId;
    private $VendeurId;
    private $BoutiqueId;
    private $PanierId;
    private $AdminId;
    private $WishId;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new UtilAuth();
            self::$db = App::getInstance()->getDatabase();

        }
        return self::$_instance;
    }

    public function getClientId()
    {
        return $this->ClientId;
    }


    public function setClientId($ClientId)
    {
        if (!isset($_SESSION['clientauth'])) {
            $_SESSION['clientauth'] = $ClientId;
            $this->ClientId = $_SESSION['clientauth'];
        }

    }

    /**
     * @return mixed
     */
    public function getUtilId()
    {
        return $this->UtilId;
    }

    /**
     * @param mixed $UtilId
     */
    public function setUtilId($UtilId)
    {
        $this->UtilId = $UtilId;
    }

    /**
     * @return mixed
     */
    public function getVendeurId()
    {

        return $this->VendeurId;
    }

    /**
     * @param mixed $VendeurId
     */
    public function setVendeurId($VendeurId)
    {
        $this->VendeurId = $VendeurId;
    }

    /**
     * @return mixed
     */
    public function getBoutiqueId()
    {
        return $this->BoutiqueId;
    }

    /**
     * @param mixed $BoutiqueId
     */
    public function setBoutiqueId($BoutiqueId)
    {
        $this->BoutiqueId = $BoutiqueId;
    }

    /**
     * @return mixed
     */
    public function getPanierId()
    {
        return $this->PanierId;
    }

    /**
     * @param mixed $PanierId
     */
    public function setPanierId($PanierId)
    {
        $this->PanierId = $PanierId;
    }

    /**
     * @return mixed
     */
    public function getWishId()
    {
        return $this->WishId;
    }

    /**
     * @param mixed $WishId
     */
    public function setWishId($WishId)
    {
        $this->WishId = $WishId;
    }

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->AdminId;
    }

    /**
     * @param mixed $AdminId
     */
    public function setAdminId($AdminId)
    {
        $this->AdminId = $AdminId;
    }


    public function getId()
    {
        if ($this->logged()) {
            return $_SESSION['utilauth'];
        }
    }

    public function logged()
    {
        if (isset($_SESSION['utilauth'])) {
            //ClientId
            $this->UtilId = $_SESSION['utilauth'];
            $CurrentClient = ClientTable::findbyIdutil($this->UtilId);

            $this->ClientId = $CurrentClient->Id_Client;
            $_SESSION['clientauth'] = $CurrentClient->Id_Client;

            //PanierId
            $CurrentPanier = PanierTable::findbyIdutil($this->UtilId);
            $this->PanierId = $CurrentPanier->Id_Panier;
            $_SESSION['panierauth'] = $this->PanierId;

            //WishId
            $CurrentWish = Wish_ListTable::findbyIdutil($this->UtilId);
            $this->WishId = $CurrentWish->Id_wish;
            $_SESSION['wishauth'] = $this->WishId;
        }
        return isset($_SESSION['utilauth']);
    }

    public function login($email, $password)
    {
        $util = self::$db->prepare('SELECT * FROM Utilisateur WHERE Email= ?', [$email], null, true);
        if ($util) {

            if ($util->Pass === sha1($password)) {
                //UtilId
                $this->UtilId = $util->Idutil;
                $_SESSION['utilauth'] = $util->Idutil;;

                //ClientId
                $CurrentClient = ClientTable::findbyIdutil($util->Idutil);
                $this->ClientId = $CurrentClient->Id_Client;
                $_SESSION['clientauth'] = $CurrentClient->Id_Client;

                //PanierId
                $CurrentPanier = PanierTable::findbyIdutil($util->Idutil);
                $this->PanierId = $CurrentPanier->Id_Panier;
                $_SESSION['panierauth'] = $this->PanierId;

                //WishId
                $CurrentWish = Wish_ListTable::findbyIdutil($util->Idutil);
                $this->WishId = $CurrentWish->Id_wish;
                $_SESSION['wishauth'] = $this->WishId;

                return true;
            }
        }
        return false;

    }


    public function isVendeur()
    {
        if ($this->logged()) {

            $CurrentVendeur = VendeurTable::findbyIdutil($this->UtilId);
            if ($CurrentVendeur) {
                $this->VendeurId = $CurrentVendeur->Id_vendeur;
                $CurrentBoutique = BoutiqueTable::findbyIdutil($this->UtilId);
                $this->BoutiqueId = $CurrentBoutique->Id_boutique;

                return true;
            }
        }
        return false;
    }

    public function isAdmin()
    {
        if ($this->logged()) {
            $CurrentAdmin = ProduitVirtuelTable::findbyIdutil($this->UtilId);
            if ($CurrentAdmin) {
                $this->AdminId = $CurrentAdmin->Id_Admin;
                return true;
            }
        }
        return false;
    }


}