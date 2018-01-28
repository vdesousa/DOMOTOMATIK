<?php
include("dbh.php"); // Connexion bdd
$idpersonne=$_SESSION['id_personne'];

if ($_POST['pass']!=$_POST['pass2']) // Si les mots de passes ne sont pas identiques, on affiche un message d'erreur sur la page espace client via une variable transférée par l'url
{
  header("location:espace_client.php?changement=0");
}
elseif ($_POST['pass']==$_POST['pass2'])
{
  include("modele_modif_client.php");
  header('location:espace_client.php?changement=1'); // On affiche cette fois un message de succès via la variable $_GET['changement']
}
?>
