<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Monster Hunter - Armures</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body>
    <header>
        <h1>Wiki Monster Hunter - Armures</h1>
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
        <h2>Armures de Monster Hunter</h2>
        <p>Découvrez les différentes armures créées à partir des matériaux récoltés sur les monstres vaincus. Choisissez la meilleure pour vous défendre.</p>
    </div>

    <div class="gallery">
        <h3>Galerie d'Armures</h3>
        <div class="grid">
            <div class="card">
                <img src="https://imgs.search.brave.com/oI88l2ckFwLTpCV4pMTKhn6FBeAPLDImlw2a5_Vt2Do/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMud2lraWEubm9j/b29raWUubmV0L21v/Z2FwZWRpYS9pbWFn/ZXMvMC8wMC9NSFJp/c2UtUmF0aGFsb3Nf/UmVuZGVyXzAwMS5w/bmcvcmV2aXNpb24v/bGF0ZXN0L3NjYWxl/LXRvLXdpZHRoLWRv/d24vNTAwP2NiPTIw/MjEwMTA3MTUxNDQ5/JnBhdGgtcHJlZml4/PWZy" alt="Armure de Chasseur">
                <p>Armure de Rathalos, résistante au feu</p>
            </div>
            <!-- Ajoute d'autres cartes pour les différentes armures -->
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Wiki Monster Hunter. Tous droits réservés.</p>
    </footer>
</body>

</html>
