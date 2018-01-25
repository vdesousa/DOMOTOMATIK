<?php
try
{$bdd = new PDO('mysql:host=localhost;port=3306;dbname=bdd_5e;charset=utf8', 'root', 'root');}
catch (Exception $e)
{die('Erreur : '.$e->getMessage());} // Connexion bdd

$idutilisateur=$_SESSION['id_utilisateur'];
$idpersonne=$_SESSION['id_personne'];

$requete=$bdd->prepare("SELECT numero, rue, complement, ville, code_postal, pays FROM utilisateur WHERE id_personne=?");
$requete->execute(array($idpersonne));
$donnees=$requete->fetchAll();
foreach ($donnees as $donnee)
{
  $complement=$donnee['complement'];
  $numero=$donnee["numero"];
  $rue=$donnee['rue'];
  $pays=$donnee['pays'];
  $ville=$donnee['ville'];
  $code_postal=$donnee['code_postal'];
}
$requete->closeCursor();

$requete2=$bdd->prepare("SELECT nom, prenom, telephone, email, mot_de_passe FROM personne WHERE id_personne=?");
$requete2->execute(array($idpersonne));
$donnees2=$requete2->fetchAll();
foreach ($donnees2 as $donnee2)
{
  $nom=$donnee2['nom'];
  $prenom=$donnee2['prenom'];
  $telephone=$donnee2['telephone'];
  $email=$donnee2['email'];
  $mdp=$donnee2['mot_de_passe'];
}
$requete->closeCursor();

$requete->closeCursor();
?>
