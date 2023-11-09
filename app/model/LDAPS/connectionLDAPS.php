<?php
class connectionLDAPS
{
    private static $instance = null;
    private $ldap_conn;
    // Paramètres de la connexion LDAP pour Docker
    private $ldap_host_port = "ldap://ldap:389";
    private function __construct()
    {
        $this->ldap_conn = ldap_connect($this->ldap_host_port);
        ldap_set_option($this->ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new connectionLDAPS();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->ldap_conn;
    }
}
?>
