<?php
require "./../model/connectionLDAPS.php";
//Connexion au LDAPS
$ldap_conn = connectionLDAPS::getInstance()->getConnection();

if(isset($_POST['username']) && isset($_POST['password'])){
    echo "test";
}

?>