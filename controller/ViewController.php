<?php

/**
 * /controller/ViewController.php
 * 
 * Contrôleur pour les pages de vue uniquement
 *
 * @author Moumen
 * @date 02/2025
 */

class ViewController extends Controller
{

    /**
     * Action qui affiche la page d'accueil
     */
    public static function home($params)
    {
        $view = ROOT . '/view/home.php';
        $params = array();
        self::render($view, $params);
    }

    public static function monstres($params)
    {
        $view = ROOT . '/view/monstres.php';
        $params = array();
        self::render($view, $params);
    }
}
