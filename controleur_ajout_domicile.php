<?php
session_start();
include("dbh.php"); // Connexion bdd

if (!isset($_POST['complement']))
{
  $_POST['complement']=NULL;
}
$requete=$bdd->prepare("INSERT INTO maison(id_utilisateur, numero, rue, complement, code_postal, ville, pays) VALUES (:id_utilisateur, :numero, :rue, :complement, :code_postal, :ville, :pays)");
$requete->execute(array(
  'id_utilisateur'=>$_POST['id_utilisateur'],
  'numero'=>$_POST['numero'],
  'rue'=>$_POST['rue'],
  'complement'=>$_POST['complement'],
  'code_postal'=>$_POST['code_postal'],
  'ville'=>$_POST['ville'],
  'pays'=>$_POST['pays']
));
$requete->closeCursor();

header("location:tableaudebord.php");

?>
