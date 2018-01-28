<?php
include("dbh.php"); // Connexion bdd
// Dans cette page on récupère les informations personnelles de la personne connectée
$idutilisateur=$_SESSION['id_utilisateur'];
$idpersonne=$_SESSION['id_personne'];

include("modele_infos_utilisateur.php");
foreach ($donnees as $donnee)
{
  $complement=$donnee['complement'];
  $numero=$donnee["numero"];
  $rue=$donnee['rue'];
  $pays=$donnee['pays'];
  $ville=$donnee['ville'];
  $code_postal=$donnee['code_postal'];
}

include("modele_infos_personne.php");
foreach ($donnees2 as $donnee2)
{
  $nom=$donnee2['nom'];
  $prenom=$donnee2['prenom'];
  $telephone=$donnee2['telephone'];
  $email=$donnee2['email'];
  $mdp=$donnee2['mot_de_passe'];
}

?>
