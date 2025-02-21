<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Monster Hunter - Armes</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/general.css">
    <style>
        /* Style pour l'étoile de favoris */
        .fav-star {
            font-size: 30px;
            color: gray;
            cursor: pointer;
        }

        .fav-star.favori {
            color: gold;
        }
    </style>
</head>

<body>
    <header>
        <h1>Wiki Monster Hunter - Armes</h1>
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
        <h2>Les Armes Légendaires de Monster Hunter</h2>
        <p>Explorez une sélection d'armes puissantes pour affronter les créatures gigantesques du monde de Monster Hunter.</p>
    </div>

    <div class="gallery">
        <h3>Galerie d'Armes</h3>
        <div class="grid">
            <div class="card">
                <img src="https://imgs.search.brave.com/ZV6q5_Wt-iU6eeLCxzPE5wpNVK_Qm4cChEjq61t7sMg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMud2lraWEubm9j/b29raWUubmV0L21v/Z2FwZWRpYS9pbWFn/ZXMvMC8wMC9NSFJp/c2UtUmF0aGFsb3Nf/UmVuZGVyXzAwMS5w/bmcvcmV2aXNpb24v/bGF0ZXN0L3NjYWxl/LXRvLXdpZHRoLWRv/d24vNTAwP2NiPTIw/MjEwMTA3MTUxNDQ5/JnBhdGgtcHJlZml4/PWZy" alt="Arme Légendaire">
                <p>Exemple d'arme légendaire</p>
                <span class="fav-star" id="fav-1" onclick="toggleFavorite(1)">&#9734;</span> <!-- Étoile vide pour non favori -->
            </div>
            <!-- Ajoute d'autres cartes pour les différentes armes -->
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Wiki Monster Hunter. Tous droits réservés.</p>
    </footer>

    <script>
        // Fonction pour activer/désactiver le favori
        function toggleFavorite(id) {
            var star = document.getElementById('fav-' + id);
            if (star.classList.contains('favori')) {
                star.classList.remove('favori');
                star.innerHTML = "&#9734;"; // Etoile vide
                // Code pour enlever de la base de données (retirer du favori)
            } else {
                star.classList.add('favori');
                star.innerHTML = "&#9733;"; // Etoile remplie
                // Code pour ajouter à la base de données (ajouter au favori)
            }
        }
    </script>
</body>

</html>
