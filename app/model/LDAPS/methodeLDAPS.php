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
        // Connectez-vous d'abord avec un compte de service/administrateur
        if (@ldap_bind($ldap_conn, "cn=admin,dc=mondomaine,dc=local", "adminpassword")) {
            // Chercher le DN de l'utilisateur
            $search = ldap_search($ldap_conn, "dc=mondomaine,dc=local", "(cn=" . $username . ")");
            if ($search) {
                $entries = ldap_get_entries($ldap_conn, $search);
                if ($entries["count"] > 0) {
                    $userdn = $entries[0]["dn"];
                    // Connexion LDAP avec le DN complet et le mot de passe de l'utilisateur
                    if (@ldap_bind($ldap_conn, $userdn, $password)) {
                        return true;
                    } else {
                        return false;
                    }
                } else {

                    return false; // L'utilisateur n'a pas été trouvé
                }
            } else {
                return false; // La recherche LDAP a échoué
            }
        } else {
            return false; // Connexion avec le compte admin échouée
        }
    } else {
        return false; // Connexion LDAP échouée
    }
}




?>