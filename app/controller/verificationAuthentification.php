<?php
session_start();
require "./../model/LDAPS/methodeLDAPS.php";

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userDetails = authentificationAuLDAP($username, $password);
    if($userDetails){
        $_SESSION['userDetails'] = $userDetails;
        header('Location: ./../view/acceuilUtilisateur/acceuil.php');
        exit();
    }
    else {
        $_SESSION['error'] = "Connexion échouée";
        header('Location: ./../view/portail-connexion/formulaireAuthentification.php');
        exit();
    }
}
