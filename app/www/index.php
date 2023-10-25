<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="style/stylePageConnection.css">
</head>
<body>

<div>
    <h1>Bienvenue sur le portail Miaou</h1>
</div>

<div class="login-container">
    <h1>Connectez-vous</h1>
    <form method="post" action="./../controller/verificationAuthentification.php">
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
</div>
</body>
</html>

