<?php session_start();
if (!isset($_SESSION['userDetails'])) {
    echo "Coucou";
    header('Location: ./../view/portail-connexion/formulaireAuthentification.php');
    exit();
}

$userDetails = $_SESSION['userDetails'];
$displayName = isset($userDetails['cn']) ? $userDetails['cn'][0] : "Utilisateur";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/stylePageBienvenue.css">
    <title>Espace Miaou</title>
</head>
<body>
<h1>Bonjour, <?php echo $displayName; ?>!</h1>
<p>Bienvenue sur votre espace Miaou. Utilisez les liens ci-dessous pour naviguer.</p>

<form action="../../controller/deconnexion.php" method="post">
    <button type="submit">Se déconnecter</button>
</form>
</body>
</html>

