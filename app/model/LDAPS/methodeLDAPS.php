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

/*
 * Cette fonction permet de vérifier si un utilisateur est un administrateur
 */
function isAdmin($username) {
    $ldap_conn = connectionLDAPS::getInstance()->getConnection();
    if ($ldap_conn) {
        // Se connecter d'abord avec un compte de service/administrateur
        if (@ldap_bind($ldap_conn, "cn=admin,dc=mondomaine,dc=local", "adminpassword")) {
            // Chercher le DN de l'utilisateur en utilisant l'attribut uid
            $search = ldap_search($ldap_conn, "dc=mondomaine,dc=local", "(uid=" . $username . ")");
            if ($search) {
                $entries = ldap_get_entries($ldap_conn, $search);
                if ($entries["count"] > 0) {
                    $userdn = $entries[0]["dn"];
                    // Vérifier si l'utilisateur est un membre du groupe "Administrateurs"
                    $searchGroup = ldap_search($ldap_conn, "dc=mondomaine,dc=local", "(&(objectClass=groupOfNames)(member=" . $userdn . ")(cn=Administrateurs))");
                    $groupEntries = ldap_get_entries($ldap_conn, $searchGroup);
                    if ($groupEntries["count"] > 0) {
                        return true; // L'utilisateur est un administrateur
                    } else {
                        return false; // L'utilisateur n'est pas un administrateur
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