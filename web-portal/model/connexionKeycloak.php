<?php
require_once '../vendor/autoload.php';
use Jumbojett\OpenIDConnectClient;

$keycloakUrl = 'http://keycloak:8080/auth';
$realm = 'master';
$clientID = 'aae06b07-e193-4bdd-9c18-bbff9597f84e';
$clientSecret = 'eyJhbGciOiJIUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJmNWVjMDVlZS1mODA0LTQyMzUtYTBkNC0zNDdlYjAwMTI5ZGEifQ.eyJleHAiOjE3MzIwMjgwMjYsImlhdCI6MTcwMDQ5MjAyNiwianRpIjoiYWFlMDZiMDctZTE5My00YmRkLTljMTgtYmJmZjk1OTdmODRlIiwiaXNzIjoiaHR0cDovL2xvY2FsaG9zdDo4MDgwL2F1dGgvcmVhbG1zL21hc3RlciIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hdXRoL3JlYWxtcy9tYXN0ZXIiLCJ0eXAiOiJJbml0aWFsQWNjZXNzVG9rZW4ifQ.ZHhRN-VT1NrmQpQrW-VS2odDAANgS4jwHR4PFYUS9w0'; // Clé secrète de votre client Keycloak
$redirectUrl = 'https://localhost:8443/model/miaou.php'; // URL de redirection

try {
    $oidc = new OpenIDConnectClient($keycloakUrl, $clientID, $clientSecret);
    $oidc->setRedirectURL($redirectUrl);
    $oidc->addScope(['openid', 'profile', 'email']);

    $oidc->authenticate();
} catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
