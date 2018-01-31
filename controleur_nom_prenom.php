<?php
include("dbh.php"); //Connexion bdd
$idpersonne=$_SESSION['id_personne'];
include("modele_nom_prenom.php");

foreach($donnees as $donnee)
{
  $nom=$donnee['nom'];
  $prenom=$donnee['prenom'];
}
echo $nom.' '.$prenom;
?>
