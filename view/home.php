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
        <h2>Bienvenue dans l'univers de Monster Hunter</h2>
        <p>Découvrez un monde rempli de créatures majestueuses, d'armes légendaires et d'équipements puissants.</p>
    </div>

    <div class="description">
        <h3>À propos de Monster Hunter</h3>
        <p>
            Monster Hunter est une série de jeux vidéo où vous incarnez un chasseur chargé de traquer et de vaincre des monstres imposants.
            Explorez des environnements variés, forgez des armes et des armures à partir des matériaux récoltés, et devenez le chasseur ultime.
        </p>
    </div>

    <div class="gallery">
        <h3>Galerie d'images</h3>
        <div class="grid">
            <div class="card">
                <img src="https://imgs.search.brave.com/yuONnR0p4DxOL16wfoSXk94etGYF_rdM3BhFS5atEI4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMud2lraWEubm9j/b29raWUubmV0L21v/Z2FwZWRpYS9pbWFn/ZXMvMC8wMC9NSFJp/c2UtUmF0aGFsb3Nf/UmVuZGVyXzAwMS5w/bmcvcmV2aXNpb24v/bGF0ZXN0L3NjYWxl/LXRvLXdpZHRoLWRv/d24vNTAwP2NiPTIw/MjEwMTA3MTUxNDQ5/JnBhdGgtcHJlZml4/PWZy" alt="Monstre en action">
                <p>Un Rathalos en plein vol</p>
            </div>
            <div class="card">
                <img src="https://imgs.search.brave.com/rnt2O9nNF6qdWG75nZnyfowmD6HOuv3MwEID8sCGNJk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMud2lraWEubm9j/b29raWUubmV0L21v/Z2FwZWRpYS9pbWFn/ZXMvMC8wZi9NSFdp/bGRzLUdTX1JlbmRl/cl8wMDEucG5nL3Jl/dmlzaW9uL2xhdGVz/dC9zY2FsZS10by13/aWR0aC1kb3duLzgw/MD9jYj0yMDI0MDgw/NjE1MzUxOCZwYXRo/LXByZWZpeD1mcg" alt="Arme légendaire">
                <p>L'épée longue, une arme redoutable</p>
            </div>
            <div class="card">
                <img src="https://imgs.search.brave.com/3-_Tk6T86ou4WD135q9nHKi4UZSPY2x5sAmz-O8yPCI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMxLm1pbGxlbml1/bS5vcmcvYXJ0aWNs/ZXMvNi80MS82Ni8w/Ni9ALzE3ODc3NTkt/ZXBlZS1ldC1ib3Vj/bGllci1hcnRpY2xl/X20tMS5wbmc" alt="Armure de chasseur">
                <p>Armure de Rathalos, résistante au feu</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Wiki Monster Hunter. Tous droits réservés.</p>
    </footer>
</body>

</html>