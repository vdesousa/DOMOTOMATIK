<?php
include("dbh.php"); // Connexion bdd
$idpersonne=$_SESSION['id_personne'];
  include("modele_modif_client.php");
  header('location:espace_client.php?changement=1');
?>
