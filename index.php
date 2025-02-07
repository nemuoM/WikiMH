<?php

/**
 * Point d'entrée principal de l'application.
 *
 * Ce fichier initialise l'environnement, analyse les paramètres de l'URL
 * et dirige l'utilisateur vers le contrôleur et l'action appropriés.
 *
 * @author Moumen
 * @date 02/2025
 */

// Définition des constantes globales
// SERVER_URL : Définit l'URL racine du serveur (à ajuster selon l'environnement)
define('SERVER_URL', "../../../..");
// ROOT : Définit le chemin absolu du répertoire racine du projet
define('ROOT', __DIR__);
// DEFAULT_CONTROLLER : Nom du contrôleur par défaut si aucun n'est spécifié
define('DEFAULT_CONTROLLER', 'view');
// DEFAULT_ACTION : Nom de l'action par défaut si aucune n'est spécifiée
define('DEFAULT_ACTION', 'accueil');

// Inclusion du fichier d'autoload pour charger automatiquement les classes nécessaires
require_once ROOT . '/autoload.php';

// Démarre une nouvelle session ou reprend une session existante
session_start();

// Analyse des paramètres de l'URL
if (isset($_GET) && !empty($_GET)) {
    // Extraction des paramètres de l'URL sous forme de variables
    extract($_GET);
} else {
    // Valeurs par défaut si aucun paramètre n'est spécifié dans l'URL
    $controller = DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;
}

// Gestion de la réinitialisation de la base de données
if ($controller == 'reinitilize') {
    // Inclusion du gestionnaire de base de données
    require_once 'model/DbManager.php';
    // Appel de la méthode pour réinitialiser la base de données
    DbManager::reset();
    // Redirection vers la page d'accueil après la réinitialisation
    header('Location: /');
    exit();
}

// Stockage des paramètres supplémentaires de l'URL dans un tableau associatif
$params = array();
foreach ($_GET as $key => $value) {
    if (($key != 'controller') && ($key != 'action')) {
        $params[$key] = $value;
    }
}

// Détermination du fichier du contrôleur demandé
$controller .= 'Controller'; // Ajout du suffixe "Controller" au nom du contrôleur
$filename = ROOT . '/controller/' . $controller . '.php';

// Vérification de l'existence du fichier du contrôleur
if (file_exists($filename)) {
    // Inclusion du fichier du contrôleur
    require_once ROOT . '/controller/' . $controller . '.php';
    
    // Vérification de l'existence de la méthode correspondant à l'action demandée
    if (method_exists($controller, $action)) {
        // Appel de la méthode du contrôleur avec les paramètres récupérés
        $controller::$action($params);
    } else {
        // Redirection vers une page d'erreur si l'action demandée n'existe pas
        header('Location: ' . SERVER_URL . '/erreur/');
    }
} else {
    // Redirection vers une page d'erreur si le fichier du contrôleur n'existe pas
    header('Location: ' . SERVER_URL . '/erreur/');
}

?>
