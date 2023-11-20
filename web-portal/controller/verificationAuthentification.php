<?php
session_start();
require './../model/Keycloak/methodeKeycloak.php';
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des informations du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Authentifie l'utilisateur via Keycloak
        authenticateUser();

        // Ici, vous pouvez ajouter une logique supplémentaire si nécessaire,
        // comme la vérification des rôles de l'utilisateur, etc.

        // Redirige vers la page d'accueil ou la page de l'utilisateur après une authentification réussie
        header('Location: ./../view/Utilisateurs/espacePersonnelUtilisateur.php');
        exit();
    } catch (Exception $e) {
        // Si l'authentification échoue, stockez le message d'erreur dans la session
        $_SESSION['error'] = 'Erreur d\'authentification: ' . $e->getMessage();
        // Redirige de nouveau vers le formulaire de connexion
        header('Location: ./../view/portail-connexion/formulaireConnexion.php');
        exit();
    }
} else {
    // Redirige vers la page de connexion si la méthode de requête n'est pas POST
    header('Location: ./../view/portail-connexion/formulaireConnexion.php');
    exit();
}
?>
