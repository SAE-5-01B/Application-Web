<?php
require "./../model/connectionLDAPS.php";

// Connexion au LDAPS
$ldap_conn = connectionLDAPS::getInstance()->getConnection();

// Si on n'est pas connecté au LDAP, on ne poursuit pas
if(!$ldap_conn){
    header("Location: ./../view/pageAuthentificationEchoue.html");
    exit;
}

if(isset($_POST['username']) && isset($_POST['password'])){
    // Authentification
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($ldap_conn) {
        $ldaprdn = "cn=" . $username . ",cn=Groupe G3,dc=mondomaine,dc=local";
        // Connexion LDAP avec l'identifiant et le mot de passe de l'utilisateur
        if (@ldap_bind($ldap_conn, $ldaprdn, $password)) {
            $message = "Connexion LDAP réussie en tant que $username!";
        } else {
            $message = "Erreur d'authentification pour $username";
        }
    } else {
        $message = "Connexion LDAP échouée...";
    }

    echo $message;
}
?>
