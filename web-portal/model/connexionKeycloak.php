<?php
use Jumbojett\OpenIDConnectClient;
class connexionKeycloak {
    private static $instance = null;
    private $oidc;

    private function __construct() {
        $this->oidc = new OpenIDConnectClient(
            'http://keycloak-server:8080', // URL du serveur Keycloak
            'aae06b07-e193-4bdd-9c18-bbff9597f84e',// ID client de Keycloak
            'eyJhbGciOiJIUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJmNWVjMDVlZS1mODA0LTQyMzUtYTBkNC0zNDdlYjAwMTI5ZGEifQ.eyJleHAiOjE3MzIwMjgwMjYsImlhdCI6MTcwMDQ5MjAyNiwianRpIjoiYWFlMDZiMDctZTE5My00YmRkLTljMTgtYmJmZjk1OTdmODRlIiwiaXNzIjoiaHR0cDovL2xvY2FsaG9zdDo4MDgwL2F1dGgvcmVhbG1zL21hc3RlciIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hdXRoL3JlYWxtcy9tYXN0ZXIiLCJ0eXAiOiJJbml0aWFsQWNjZXNzVG9rZW4ifQ.ZHhRN-VT1NrmQpQrW-VS2odDAANgS4jwHR4PFYUS9w0'              // Clé secrète du client
        );
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new connexionKeycloak();
        }
        return self::$instance;
    }

    public function getOIDC() {
        return $this->oidc;
    }
}
?>