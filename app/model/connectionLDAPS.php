<?php

class connectionLDAPS{
    private static $instance = null;
    private $ldap_conn;

    // Paramètres de la connexion LDAP pour Docker
    private $ldap_host_port = "ldap://ldap:389";
    // Pour utiliser LDAPS (une fois mis en place), changez l'URL ci-dessus par:
    // private $ldap_host_port = "ldaps://ldap:636";

    private function __construct() {
        $this->ldap_conn = ldap_connect($this->ldap_host_port);
        // Assurez-vous d'avoir la version appropriée de LDAP
        ldap_set_option($this->ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);

        // Si vous passez à LDAPS, vous devriez aussi définir la vérification des certificats:
        // ldap_set_option($this->ldap_conn, LDAP_OPT_X_TLS_REQUIRE_CERT, LDAP_OPT_X_TLS_NEVER);
        // Notez que LDAP_OPT_X_TLS_NEVER est pour les environnements de test, il désactive la vérification des certificats.
        // Pour un environnement de production, vous devriez probablement utiliser LDAP_OPT_X_TLS_HARD.
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new connectionLDAPS();
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->ldap_conn;
    }
}
?>
