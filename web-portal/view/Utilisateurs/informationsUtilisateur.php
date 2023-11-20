<?php
session_start();
/*
Informations que je peux avoir sur l'utilisateur:
array(14) {
  ["objectclass"]=&gt;
  array(3) {
    ["count"]=&gt;
    int(2)
    [0]=&gt;
    string(13) "inetOrgPerson"
    [1]=&gt;
    string(3) "top"
  }
  [0]=&gt;
  string(11) "objectclass"
  ["uid"]=&gt;
  array(2) {
    ["count"]=&gt;
    int(1)
    [0]=&gt;
    string(12) "jpatagueulle"
  }
  [1]=&gt;
  string(3) "uid"
  ["cn"]=&gt;
  array(2) {
    ["count"]=&gt;
    int(1)
    [0]=&gt;
    string(17) "James Patagueulle"
  }
  [2]=&gt;
  string(2) "cn"
  ["sn"]=&gt;
  array(2) {
    ["count"]=&gt;
    int(1)
    [0]=&gt;
    string(11) "Patagueulle"
  }
  [3]=&gt;
  string(2) "sn"
  ["givenname"]=&gt;
  array(2) {
    ["count"]=&gt;
    int(1)
    [0]=&gt;
    string(5) "James"
  }
  [4]=&gt;
  string(9) "givenname"
  ["userpassword"]=&gt;
  array(2) {
    ["count"]=&gt;
    int(1)
    [0]=&gt;
    string(10) "jp23051999"
  }
  [5]=&gt;
  string(12) "userpassword"
  ["count"]=&gt;
  int(6)
  ["dn"]=&gt;
  string(50) "uid=jpatagueulle,ou=utilisateurs,dc=example,dc=org"
}
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informations de l'Utilisateur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/stylePagesPersonnelUtilisateur.css">
    <link rel="stylesheet" href="./../style/styleBarreNavigation.css">
</head>
<body>
<div class="navbar">
    <nav class="navbar">

        <div id="gaucheNavBarre">
            <div id="imgAndCATS"><img src="./../images/patte-de-chat.png" alt="Logo du projet Miaou" class="logo"><a id="nomProjet">CATS </a></div>
        </div>

        <div id="millieuNavBarre">

            <a href="espacePersonnelUtilisateur.php" class="nav-link">Talbeau de bord</a>
            <a href="./informationsUtilisateur.php" class="nav-link">Mes informations</a>
            <a href="" class="nav-link">À propos</a>
        </div>

        <div id="droiteNavBarre">
            <a href="./../../controller/deconnexion.php" class="nav-link">Se déconnecter</a>
        </div>

    </nav>
</div>

<div id="contenuePage">
    <div class="container">
        <h1>Informations de l'utilisateur</h1>
        <?php
        // Récupération des informations de l'utilisateur
        $detailsUtilisateur = $_SESSION['userDetails'];

        // Affichage des informations
        if ($detailsUtilisateur) {
            echo "<p>Nom : " . htmlspecialchars($detailsUtilisateur['sn'][0]) . "</p>";
            echo "<p>Prénom : " . htmlspecialchars($detailsUtilisateur['givenname'][0]) . "</p>";
            echo "<p>Nom complet : " . htmlspecialchars($detailsUtilisateur['cn'][0]) . "</p>";
            echo "<p>UID : " . htmlspecialchars($detailsUtilisateur['uid'][0]) . "</p>";
            echo "<p>Groupe de l'utilisateur : " . htmlspecialchars($_SESSION['group']) . "</p>";


            echo "<form action='formulaireChangementMDPUtilisateur.php'>
                <button type='submit'>Changez le mot de passe</button>
                </form>";
        } else {
            echo "<p>Aucune information disponible.</p>";
        }
        ?>
    </div>

</div>

</body>
</html>

