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

    /**
     * Obtient une connexion à la base de données.
     *
     * Cette méthode utilise le patron Singleton pour s'assurer qu'une seule instance
     * de connexion à la base de données est créée. Si la connexion n'existe pas déjà,
     * elle est créée en utilisant les informations de configuration spécifiées.
     *
     * @return PDO L'objet PDO représentant la connexion à la base de données.
     *
     * @throws PDOException Si une erreur survient lors de la connexion à la base de données.
     *
     * @example
     * ```php
     * \$connexion = MaClasse::getConnexion();
     * ```
     *
     * @global string HOST L'hôte de la base de données.
     * @global string PORT Le port de la base de données.
     * @global string DBNAME Le nom de la base de données.
     * @global string CHARSET Le jeu de caractères utilisé pour la connexion.
     * @global string LOGIN Le nom d'utilisateur pour la connexion à la base de données.
     * @global string MDP Le mot de passe pour la connexion à la base de données.
     */
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