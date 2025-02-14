<?php

/**
 * /controller/AccountController.php
 * 
 * Contrôleur afin d'intéragir avec les données utilisateurs.
 * 
 * @author: Moumen
 * @date: 02/2025
 */

class AccountController extends Controller
{
    private static function serialize($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function logout($params)
    {
        if (isset($_SESSION['email'])) {
            session_destroy();
            header('Location: ' . SERVER_URL);
        }
    }

    public static function register($params)
    {
        if (
            isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['pwd']) && !empty($_POST['pwd'])
            &&
            isset($_POST['username']) && !empty($_POST['username'])
        ) {
            $email = self::serialize($_POST['email']);
            $username = self::serialize($_POST['username']);
            $mdp = self::serialize($_POST['pwd']);

            $email = strtolower($email);

            //Hachage du mdp avec Bcrypt
            $cost = ['cost' => 10];
            $mdp = password_hash($mdp, PASSWORD_BCRYPT, $cost);

            AccountManager::addUser($email, $username, $mdp);
        }
    }
}
