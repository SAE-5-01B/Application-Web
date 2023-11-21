<?php

/**
 * Cette méthode permet d'authentifier un utilisateur au Keycloak
 */
require 'connexionKeycloak.php';
function authenticateUser() {
    $keycloak = connexionKeycloak::getInstance()->getOIDC();
    try {
        $keycloak->authenticate();
        $token = $keycloak->getAccessToken();
        $userInfo = $keycloak->requestUserInfo();

        // Stockez les informations nécessaires dans la session
        $_SESSION['userDetails'] = $userInfo;
        $_SESSION['accessToken'] = $token;
    } catch (Exception $e) {
        // Gérer l'exception si l'authentification échoue
        echo 'Erreur d\'authentification: ' . $e->getMessage();
    }
}



?>