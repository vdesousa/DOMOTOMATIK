<?php   include("dbh.php");
  $req1 = $bdd->query("SELECT `nom_objet`, `photo` FROM `boutique`");
  $res1 = $req1->fetchAll();
  ?>
