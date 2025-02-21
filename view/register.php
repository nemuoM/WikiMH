<?php
// register.php

// Simuler un enregistrement sans base de données (exemple uniquement)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Enregistrer l'utilisateur dans la base de données (exemple non fonctionnel)
    // Dans un cas réel, tu devrais insérer ces données dans ta base de données

    echo "Inscription réussie pour $username!";
    // Rediriger l'utilisateur après l'inscription ou afficher un message de succès
}
?>
