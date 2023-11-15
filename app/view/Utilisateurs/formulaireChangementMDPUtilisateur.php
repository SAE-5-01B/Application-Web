<?php ?>

<!DOCTYPE html>
<html>
<head>
    <title>Changement de Mot de Passe</title>
    <link rel="stylesheet" type="text/css" href="./../style/stylePageInformationsUtilisateur.css">
    <link rel="stylesheet" href="./../style/styleBarreNavigation.css">
</head>
<body>
<div class="navbar">
    <nav class="navbar">
        <a href="espacePersonnelUtilisateur.php" class="nav-link">Talbeau de bord</a>
        <a href="./informationsUtilisateur.php" class="nav-link">Mes informations</a>
        <a href="./../../controller/deconnexion.php" class="nav-link">Se déconnecter</a>
    </nav>
</div>
<div id="contenuePage">
    <div class="container">
        <h1>Changement de Mot de Passe</h1>
        <form action="./../../controller/changementMotDePasse.php" method="post">
            <p>
                <label for="oldPassword">Ancien Mot de Passe:</label><br>
                <input type="password" id="oldPassword" name="oldPassword" required>
            </p>
            <p>
                <label for="newPassword">Nouveau Mot de Passe:</label><br>
                <input type="password" id="newPassword" name="newPassword" required>
            </p>
            <p>
                <label for="confirmPassword">Confirmez le Nouveau Mot de Passe:</label><br>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </p>
            <p>
                <input type="submit" value="Changer le Mot de Passe">
            </p>
        </form>
    </div>
</div>
</body>
</html>

