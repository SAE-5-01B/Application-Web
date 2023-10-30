<?php
require "connectionLDAPS.php";
/**
 * Cette fonction permet d'autentifier un utilisateur au LDAP
 * @param string $username
 * @param string $password
 * @return boolean
 */
function authentificationAuLDAP($username, $password){
    $ldap_conn = connectionLDAPS::getInstance()->getConnection();
    if ($ldap_conn) {
        if (@ldap_bind($ldap_conn, "cn=admin,dc=mondomaine,dc=local", "adminpassword")) {
            $search = ldap_search($ldap_conn, "dc=mondomaine,dc=local", "(uid=" . $username . ")");
            if ($search) {
                $entries = ldap_get_entries($ldap_conn, $search);
                if ($entries["count"] > 0) {
                    $userdn = $entries[0]["dn"];
                    if (@ldap_bind($ldap_conn, $userdn, $password)) {
                        return $entries[0]; // Retourne les détails de l'utilisateur
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>