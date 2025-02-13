<?php

/**
 * Cette classe fournit une méthode de connexion à la BDD
 * 
 * @author Moumen
 * @date: 02/2025
 */

 const HOST = '127.0.0.1';
 const PORT = '3306';
 const DBNAME = ''; // à définir
 const CHARSET = 'utf8';
 const LOGIN = 'root';
 const MDP = '';

 class DbManager{
    private static ?\PDO $cnx = null;

    public static function getConnexion() {
        if (self::$cnx == null) {
            try {
                $dsn = 'mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME . ';charset=' . CHARSET;
                self::$cnx = new PDO($dsn, LOGIN, MDP);
                self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return self::$cnx;
    }
 }
?>