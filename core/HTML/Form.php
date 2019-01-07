<?php

namespace Core\HTML;

use DateTime;

/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 20/03/2018
 * Time: 13:18
 */

/**
 * Class Form  tab+Entrer
 * permet de generer un formulaire rapidement et simplement
 */
class Form
{
    /**
     * @var string Tag utiliser pour entourer les champs
     */
    public $surrond = 'p';
    /**
     * @var array Donnees utiliser par le formulaire
     */
    protected $data;

    /**
     * Form constructor.
     * @param array $data Donnees utiliser par le formulaire
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param $name string name de l'input a generer
     * @return string genere un input
     */
    public function input($name, $label, $option = [], $placeholder = "")
    {
        $type = isset($option['type']) ? $option['type'] : 'text';
        return $this->surrond('<input placeholder="' . $placeholder . '" type="' . $type . '" name="' . $label . '" value="' . $this->getValue($name) . '" />');

    }

    /**
     * @param $html string html a entourer
     * @return string
     */
    protected function surrond($html)
    {
        return "<{$this->surrond}>{$html}</{$this->surrond}>";
    }

    /**
     * @param $index string cle de input a recuperer
     * @return mixed|null
     */
    protected function getValue($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @return string generer un button submit
     */
    public function submit()
    {

        return $this->surrond('<button type="submit">Envoyer</button>');
    }

    public function Tostring()
    {
        echo __CLASS__;
    }

    public function date()
    {
        return new DateTime();
    }


}


