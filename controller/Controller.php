<?php

/**
 * /controller/Controller.php
 * class technique pour définir les membres communs aux controllers
 * 
 * @author Moumen
 * @date 02/2024
 */

class Controller
{
    public static function render($view, $param)
    {
        extract($param);
        require_once $view;
    }
}
