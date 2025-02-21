<?php
// login.php

// Simuler une simple connexion sans base de données (exemple uniquement)
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simuler un utilisateur existant (à remplacer par une vraie logique de vérification)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['user'] = $username; // Enregistrer l'utilisateur dans la session
        header('Location: home.php'); // Rediriger vers la page d'accueil après connexion
    } else {
        echo 'Nom d\'utilisateur ou mot de passe incorrect';
    }
}
?>
