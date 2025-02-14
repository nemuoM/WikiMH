<?php

/**
 * Cette classe fournit une méthode de connexion à la BDD
 * 
 * @author Moumen
 * @date: 02/2025
 */

const HOST = '127.0.0.1';
const PORT = '3306';
const DBNAME = 'db_WikiMH';
const CHARSET = 'utf8';
const LOGIN = 'root';
const MDP = '';

class DbManager
{
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
    public static function getConnexion()
    {
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

    public static function addUser($email, $username, $mdp)
    {
        /*
        CREATE TABLE Utilisateur(
            U_id VARCHAR(5),
            U_Mail VARCHAR(255),
            U_Pseudo VARCHAR(50),
            U_MotDePasse VARCHAR(255),
            PRIMARY KEY(U_id)
        );
         */
        try {
            $sql = 'INSERT Utilisateur(U_mail, U_Pseudo, U_MotDePasse)';
            $sql .= 'VALUES (:m, :p, :mdp)';

            $stmt = self::$cnx->prepare($sql);
            $stmt->bindParam(':m', $email, PDO::PARAM_STR);
            $stmt->bindParam(':p', $username, PDO::PARAM_STR);
            $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);

            $stmt->execute();
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;

            header('Location: ' . SERVER_URL . '/welcome/');
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getUser($username, $mdp, $isConnection)
    {
        try {
            $sql = 'SELECT U_mail, U_Pseudo, U_MotDePasse FROM Utilisateurs WHERE U_Pseudo = :u';

            $stmt = self::$cnx->prepare($sql);
            $stmt->bindParam(':u', $username, PDO::PARAM_STR);
            $stmt->execute();

            $row = $stmt->fetch();
            if ($row && $isConnection) {
                $mail = $row['U_mail'];
                $mdpH = $row['U_MotDePasse'];

                if (password_verify($mdp, $mdpH)) {
                    $_SESSION['email'] = $mail;
                    $_SESSION['username'] = $username;
                    echo json_encode(['success' =>
                    'Échec de la connexion. Veuillez vérifier vos identifiants.']);
                } else {
                    echo json_encode(['error' => 'Échec de la connexion. Veuillez vérifier vos identifiants.']);
                }
            } else {
                echo json_encode(['error' => 'Échec de la connexion. Veuillez vérifier vos identifiants.']);
                return false;
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


    /**
     * Obtient tous les monstres de la base de données
     * @return bool|string a JSON encoded string on success or FALSE on failure.
     */
    public static function getMonsters()
    {
        $lesMonstres = array();

        try {
            if (self::$cnx == NULL) {
                self::$cnx = DbManager::getConnexion();
            }

            $sql = "SELECT M_id,M_Nom,M_Type,M_Taille,M_Poids,M_Faiblesse,M_description,M_Element,Im_id,T_Id FROM Monstre";
            $stmt = self::$cnx->query($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lesMonstres[] = $row;
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return json_encode($lesMonstres);
    }

    /**
     * Récupère un monstre spécifique
     * @param int $idMonster L'id du monstre
     * @return bool|string a JSON encoded string on success or FALSE on failure.
     */
    public static function getMonster(int $idMonster)
    {
        $theMonster = array();

        try {
            if (self::$cnx == NULL) {
                self::$cnx = DbManager::getConnexion();
            }

            $sql = "SELECT M_id,M_Nom,M_Type,M_Taille,M_Poids,M_Faiblesse,M_description,M_Element,Im_id,T_Id 
                    FROM Monstre
                    WHERE M_id = $idMonster";

            $stmt = self::$cnx->query($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $theMonster[] = $row;
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return json_encode($theMonster);
    }



    /**
     * Récupère les armes en fonction de ses paramètres
     * 
     * @example Récupérer toutes les armes
     * ```php
     * echo getWeapons(); //Récupérer toutes les armes
     * ```
     * 
     * * @example  Récupérer les armes avec un tranchant de 50
     * ```php
     * echo getWeapons(50); // Récupérer les armes avec un tranchant de 50
     * ```
     * 
     * * @example Récupérer les armes avec un élément "FIRE" et un dégât physique de 100
     * ```php
     * echo getWeapons(null, "FIRE", 100); //Récupérer les armes avec un élément "FIRE" et un dégât physique de 100
     * ```
     * 
     * * @example  Récupérer les armes avec un type "Épée" et un élément "Glace"
     * ```php
     * echo getWeapons(null, "ICE", null, "Dual Blades"); // Récupérer les armes avec un type "Dual Blades" et un élément "ICE"
     * ```
     * 
     * 
     * @param int $tranchant Le tranchant
     * @param string $element L'élément de l'arme
     * @param int $degat Les dégats physiques de l'arme
     * @param string $type Le type d'arme
     * 
     * @return bool|string a JSON encoded string on success or FALSE on failure.
     */
    public static function getWeapons(int $tranchant, string $element, int $degat, string $type)
    {

        $lesArmes = array();

        try {
            if (self::$cnx == NULL) {
                self::$cnx = DbManager::getConnexion();
            }

            $sql = "SELECT Eq_Id,A_Type,A_tranchant,A_Element,A_DegatPhysique,Im_id 
                    FROM Arme;";

            $stmt = self::$cnx->query($sql);

            $conditions = [];
            $params = [];

            if (!is_null($tranchant)) {
                $conditions[] = "A_tranchant = :tranchant";
                $params[':tranchant'] = $tranchant;
            }
            if (!is_null($element)) {
                $conditions[] = "A_Element = :element";
                $params[':element'] = $element;
            }
            if (!is_null($degat)) {
                $conditions[] = "A_DegatPhysique = :degat";
                $params[':degat'] = $degat;
            }
            if (!is_null($type)) {
                $conditions[] = "A_Type = :type";
                $params[':type'] = $type;
            }

            // Ajout de la clause WHERE si nécessaire
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $stmt = self::$cnx->prepare($sql);

            // Liaison des paramètres
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lesArmes[] = $row;
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return json_encode($lesArmes);
    }
}
