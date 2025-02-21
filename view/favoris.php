<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Monster Hunter - Favoris</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body>
    <header>
        <h1>Wiki Monster Hunter - Favoris</h1>
        <div class="auth-links">
            <?php if (isset($_SESSION['user'])): ?>
                <p>Bienvenue, <?= $_SESSION['user']['username'] ?> | <a href="deconnexion.php">Se déconnecter</a></p>
            <?php else: ?>
                <a href="connexion.php">Connexion</a> |
                <a href="inscription.php">Inscription</a>
            <?php endif; ?>
        </div>
    </header>

    <nav>
        <a href="<?= SERVER_URL ?>/">Accueil</a>
        <a href="<?= SERVER_URL ?>/monstres/">Monstres</a>
        <a href="<?= SERVER_URL ?>/armes/">Armes</a>
        <a href="<?= SERVER_URL ?>/armures/">Armures</a>
        <a href="<?= SERVER_URL ?>/items/">Items</a>
        <a href="<?= SERVER_URL ?>/favoris/">Favoris</a>
    </nav>

    <div class="hero">
        <h2>Vos Favoris</h2>
        <p>Retrouvez ici tous les éléments que vous avez ajoutés à vos favoris. Monstres, armes, armures et bien plus encore.</p>
    </div>

    <div class="gallery">
        <h3>Vos Éléments Favoris</h3>
        <div class="grid">
            <!-- Exemple de favori, à personnaliser -->
            <div class="card">
                <img src="https://imgs.search.brave.com/3-_Tk6T86ou4WD135q9nHKi4UZSPY2x5sAmz-O8yPCI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMxLm1pbGxlbml1/bS5vcmcvYXJ0aWNs/ZXMvNi80MS82Ni8w/Ni9ALzE3ODc3NTkt/ZXBlZS1ldC1ib3Vj/bGllci1hcnRpY2xl/X20tMS5wbmc" alt="Favori">
                <p>Favori 1</p>
            </div>
            <!-- Ajoute d'autres éléments favoris -->
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Wiki Monster Hunter. Tous droits réservés.</p>
    </footer>
</body>

</html>
