<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monstres - Wiki Monster Hunter</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body>

    <header>
        <h1>Galerie des mosntres</h1>
        <div class="auth-links">
            <!-- Vérification de l'utilisateur connecté -->
            <?php if (isset($_SESSION['user'])): ?>
                <p>Bienvenue, <?= $_SESSION['user']['username'] ?> | <a href="deconnexion.php">Se déconnecter</a></p>
            <?php else: ?>
                <a href="../view/connexion.php">Connexion</a> |
                <a href="../view/inscription.php">Inscription</a>
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

    <div class="gallery">
        <h2>Découvrez les créatures légendaires !</h2>
        <div class="grid">
            <div class="card">
                <img src="data:image/jpeg;base64,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" alt="Rathalos" class="monster-img" data-description="Le Rathalos, roi des cieux. Une créature majestueuse et redoutable, connue pour sa puissance et ses attaques enflammées." />
                <h2>Rathalos</h2>
                <p>Faiblesses</p>
                <p>Foudre</p>
            </div>
            <div class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7OO5Nep9x8s5Dno_lWNQT3RdwjlEKhlCfng&s" alt="Diablos" class="monster-img" data-description="Le Diablos, un monstre redouté pour sa capacité à creuser sous terre et ses attaques fulgurantes." />
                <h2>Diablos</h2>
                <p>Faiblesses</p>
                <p>Glace</p>
            </div>
            <div class="card">
                <img src="https://static.icy-veins.com/images/mh-wilds/portraits/chatacabara.webp" alt="Chatacabra" class="monster-img" data-description="Le Nergigante, un monstre ancien dont la puissance brute et l'agilité sont légendaires. Il est une menace pour tous." />
                <h2>Chatabra</h2>
                <p>Faiblesses</p>
                <p>Feu</p>

            <!-- Ajouter d'autres monstres ici -->
        </div>
    </div>

    <div id="monster-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 id="monster-title"></h3>
            <p id="monster-description"></p>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Wiki Monster Hunter. Tous droits réservés.</p>
    </footer>

    <script src="../js/monsters.js"></script>

</body>

</html>
