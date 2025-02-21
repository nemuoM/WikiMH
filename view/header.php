<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Monster Hunter</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <header>
        <h1>Wiki Monster Hunter</h1>
        <div class="auth-links">
            <!-- Si l'utilisateur est connecté -->
            <!-- Supposons qu'on ait une variable PHP qui vérifie si l'utilisateur est connecté -->
            <?php if (isset($_SESSION['user'])): ?>
                <p>Bienvenue, <?= $_SESSION['user']['username'] ?> | <a href="deconnexion.php">Se déconnecter</a></p>
            <?php else: ?>
                <a href="connexion.php">Connexion</a> |
                <a href="inscription.php">Inscription</a>
            <?php endif; ?>
        </div>
    </header>
    <nav>
        <a href="/">Accueil</a>
        <a href="#monstres">Monstres</a>
        <a href="#armes">Armes</a>
        <a href="#armures">Armures</a>
        <a href="#items">Items</a>
        <a href="#favoris">Favoris</a>
    </nav>
