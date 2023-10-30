<?php session_start();
require "./../model/LDAPS/methodeLDAPS.php";
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(authentificationAuLDAP($username, $password)){
        echo "Connexion réussie";
    }else{
        $_SESSION['error'] = "Connexion échouée";
        header('Location: ./../view/Authentification/formulaireAuthentification.php');
        exit();
    }

}
