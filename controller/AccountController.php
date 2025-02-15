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
    /**
     * Nettoie et sécurise une chaîne de caractères.
     *
     * Cette méthode applique plusieurs opérations de nettoyage et de sécurisation à une chaîne de caractères :
     * suppression des espaces en début et fin de chaîne, suppression des antislashs et conversion des caractères
     * spéciaux en entités HTML. Cela permet de prévenir les attaques par injection et d'assurer que les données
     * sont sûres à utiliser dans des contextes HTML.
     *
     * @param string $data La chaîne de caractères à nettoyer et sécuriser.
     * @return string La chaîne de caractères nettoyée et sécurisée.
     */
    private static function serialize($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * Déconnecte l'utilisateur actuellement connecté.
     *
     * Cette méthode détruit la session de l'utilisateur actuellement connecté, mettant ainsi fin à sa session.
     * Après la déconnexion, l'utilisateur est redirigé vers la page d'accueil du site.
     *
     * @param array $params Tableau de paramètres (non utilisé dans cette méthode).
     */
    public static function logout($params)
    {
        if (isset($_SESSION['email'])) {
            session_destroy();
            header('Location: ' . SERVER_URL);
        }
    }

    /**
     * Enregistre un nouvel utilisateur.
     *
     * Cette méthode gère le processus d'inscription d'un nouvel utilisateur en vérifiant les données POST
     * fournies, en nettoyant et sécurisant les données, puis en ajoutant l'utilisateur à la base de données.
     * Si l'inscription réussit, un message de succès est renvoyé. Sinon, un message d'erreur est affiché.
     *
     * @param array $params Tableau de paramètres (non utilisé dans cette méthode).
     */
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

    /**
     * Gère la connexion d'un utilisateur.
     *
     * Cette méthode vérifie les informations d'identification fournies par l'utilisateur via les données POST.
     * Elle nettoie et sécurise les données, puis appelle une méthode pour vérifier les informations d'identification
     * et établir une session utilisateur si les informations sont correctes.
     *
     * @param array $params Tableau de paramètres (non utilisé dans cette méthode).
     */
    public static function login($params)
    {
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
            $username = self::serialize($_POST['username']);
            $pwd = self::serialize($_POST['pwd']);

            DbManager::getConnexion($username, $pwd, true);
        }
    }
}
