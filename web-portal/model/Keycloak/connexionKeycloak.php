<?php
use Stevenmaguire\OAuth2\Client\Provider\Keycloak;
require_once './../../vendor/autoload.php';

//TOdo c'est ici que je mettrai la session des utilisateurs et récupérerai les données de l'utilisateur ainsi que son token pour qu'il puisse se connecter à d'autres services

$provider = new Keycloak([
    'authServerUrl' => 'http://localhost:8080/auth', // Pour la communication serveur à serveur
    'realm' => 'master',
    'clientId' => 'aae06b07-e193-4bdd-9c18-bbff9597f84e',
    'clientSecret' => 'eyJhbGciOiJIUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJmNWVjMDVlZS1mODA0LTQyMzUtYTBkNC0zNDdlYjAwMTI5ZGEifQ.eyJleHAiOjE3MzIwMjgwMjYsImlhdCI6MTcwMDQ5MjAyNiwianRpIjoiYWFlMDZiMDctZTE5My00YmRkLTljMTgtYmJmZjk1OTdmODRlIiwiaXNzIjoiaHR0cDovL2xvY2FsaG9zdDo4MDgwL2F1dGgvcmVhbG1zL21hc3RlciIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hdXRoL3JlYWxtcy9tYXN0ZXIiLCJ0eXAiOiJJbml0aWFsQWNjZXNzVG9rZW4ifQ.ZHhRN-VT1NrmQpQrW-VS2odDAANgS4jwHR4PFYUS9w0',
    'redirectUri' => 'https://localhost:8443/miaou.php', // Pour la redirection du navigateur
]);
if (!isset($_GET['code'])) {
    // Si nous n'avons pas de code d'autorisation, obtenir l'autorisation
    $authUrl = $provider->getAuthorizationUrl();
    header('Location: ' . $authUrl);
    exit;

    // Après l'autorisation, le serveur redirigera l'utilisateur ici
} else {
    // Essayer d'obtenir un jeton d'accès en utilisant le code d'autorisation
    try {
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
        // Vous pouvez maintenant utiliser ce jeton pour faire des requêtes vers Keycloak
    } catch (Exception $e) {
        exit('Erreur d\'authentification: ' . $e->getMessage());
    }
    // Faire des requêtes pour obtenir des informations sur l'utilisateur
    try {
        $user = $provider->getResourceOwner($accessToken);
        // Utiliser ces informations comme nécessaire
        printf('Hello %s!', $user->getName());
    } catch (Exception $e) {
        exit('Erreur lors de la récupération des informations utilisateur: ' . $e->getMessage());
    }
}
?>
