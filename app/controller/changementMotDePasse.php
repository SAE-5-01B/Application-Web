<?php
//Ce fichier permet de faire l'intermédiaire entre la vue et le modèle pour le changement de mot de passe
require "./../model/LDAP/methodeLDAP.php";
//$changementMotDePasse = passwordChange("ggonfiantini","gogo","gaga"); //Exemple utilisation de la fonction passwordChange

echo "test";




header('Location: ./../view/Utilisateurs/informationsUtilisateur.php');


?>