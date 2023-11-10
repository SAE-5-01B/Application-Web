<?php
session_start();
//Récupération des informations de l'utilisateur

$detailsUtilisateur = $_SESSION['userDetails'];
var_dump($detailsUtilisateur);

/*
Informations que je peux avoir sur l'utilisateur:

 array(22) { ["givenname"]=> array(2) { ["count"]=> int(1) [0]=> string(7) "Gaëtan" }
[0]=> string(9) "givenname" ["sn"]=> array(2) { ["count"]=> int(1) [0]=> string(11) "Gonfiantini" }
[1]=> string(2) "sn" ["cn"]=> array(2) { ["count"]=> int(1) [0]=> string(19) "Gaëtan Gonfiantini" }
[2]=> string(2) "cn" ["uid"]=> array(2) { ["count"]=> int(1) [0]=> string(12) "ggonfiantini" }
[3]=> string(3) "uid" ["userpassword"]=> array(2) { ["count"]=> int(1) [0]=> string(29) "{MD5}gRWEBDuERwTJu5pumd0F0w==" }
[4]=> string(12) "userpassword" ["uidnumber"]=> array(2) { ["count"]=> int(1) [0]=> string(4) "1000" }
[5]=> string(9) "uidnumber" ["gidnumber"]=> array(2) { ["count"]=> int(1) [0]=> string(3) "500" }
[6]=> string(9) "gidnumber" ["homedirectory"]=> array(2) { ["count"]=> int(1) [0]=> string(24) "/home/users/ggonfiantini" }
[7]=> string(13) "homedirectory" ["loginshell"]=> array(2) { ["count"]=> int(1) [0]=> string(17) "/usr/sbin/nologin" }
[8]=> string(10) "loginshell" ["objectclass"]=> array(4) { ["count"]=> int(3) [0]=> string(13) "inetOrgPerson" [1]=> string(12) "posixAccount" [2]=> string(3) "top" }
[9]=> string(11) "objectclass" ["count"]=> int(10) ["dn"]=> string(58) "cn=Gaëtan Gonfiantini,cn=Groupe G3,dc=mondomaine,dc=local" }
 */

//OHHHHH
?>


