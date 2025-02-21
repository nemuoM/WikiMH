<!-- inscription.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Wiki Monster Hunter</title>
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>

    <header>
        <h1>Inscription</h1>
    </header>

    <div class="form-container">
        <form action="register.php" method="POST">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">S'inscrire</button>
        </form>

        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a></p>
    </div>

</body>
</html>
