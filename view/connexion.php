<!-- connexion.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Wiki Monster Hunter</title>
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>

    <header>
        <h1>Connexion</h1>
    </header>

    <div class="form-container">
        <form action="login.php" method="POST">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Se connecter</button>
        </form>

        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>
    </div>

</body>
</html>
