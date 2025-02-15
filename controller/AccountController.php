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
            $pwd = self::serialize($_POST['pwd']);

            $email = strtolower($email);

            //Hachage du pwd avec Bcrypt
            $cost = ['cost' => 10];
            $pwd = password_hash($pwd, PASSWORD_BCRYPT, $cost);

            if (DbManager::addUser($email, $username, $pwd)) {
                echo json_encode(['success' => "Inscription réussi !"]);
            } else {
                echo json_encode(['error' => "Échec de l'inscription. Cette identifiant est déjà existant."]);
            }
        }
    }

    public static function login($params)
    {
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
            $username = self::serialize($_POST['username']);
            $pwd = self::serialize($_POST['pwd']);

            DbManager::getConnexion($username, $pwd, true);
        }
    }
}
