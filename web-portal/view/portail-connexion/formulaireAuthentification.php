<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="../style/stylePageConnexion.css">
    <script>
        // Fonction pour ouvrir et fermer le popup
        function toggleInfoPopup() {
            var popup = document.getElementById("infoPopup");
            if (popup.style.display === "none" || !popup.style.display) {
                popup.style.display = "block";
            } else {
                popup.style.display = "none";
            }
        }
    </script>
</head>
<body>
<div id="titrePlusImage">
    <h1 id="titreMiaou">Bienvenue sur le portail CATS <img src="./../images/patte-de-chat.png" class="logo"></h1>
</div>
<div class="login-container">
    <h1>Connectez-vous</h1>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p id='message_erreur'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form method="post" action="./../../controller/verificationAuthentification.php">
        <div class="input-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Connexion</button>

    </form>

    <div class="button-group">
        <button onclick="toggleInfoPopup()">Informations</button>
        <a href="Informations.html"><button>Nous contacter</button></a>
    </div>

</div>

<!-- Popup pour les informations -->
<div id="infoPopup">
    <h2>Informations sur le site</h2>

    <p>Bienvenue sur CATS (Central Authentication & Technology Services), votre solution tout-en-un pour la gestion et la sécurisation de données. Nous apprécions votre confiance dans notre projet innovant.</p>

    <p>CATS est dédié à simplifier votre expérience digitale en regroupant des services essentiels comme le stockage de données et un service FTP robuste pour la gestion de fichiers et dossiers. Notre plateforme est conçue pour vous offrir efficacité et commodité.</p>

    <p>Nous prenons la sécurité au sérieux. CATS assure des communications sécurisées et protégées sur le site, vous garantissant tranquillité d'esprit et protection optimale de vos informations.</p>

    <p>Pour rejoindre notre communauté CATS, contactez notre support pour créer un compte. Cliquez sur "Nous contacter" sur le portail de connexion pour toute assistance ou pour débuter votre expérience CATS.</p>

    <button onclick="toggleInfoPopup()">Fermer</button>
</div>


</body>
</html>
