<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/04/2018
 * Time: 09:25
 */

namespace Core\Controller;


class Controller
{
    protected $viewPath;
    protected $template;


    protected function render($view, $variables = [])
    {
        ob_start();//faire start un outils qui fait manipuler les resultats html
        extract($variables);
        require($this->viewPath . str_replace(".", "/", $view) . ".php");

        $content = ob_get_clean();//touts la app/Views html stocker sur ce varibale et vider depuis la page index
        require($this->viewPath . "templates/" . $this->template . ".php");

    }

    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        header('Location: index.php?p=404');
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

}