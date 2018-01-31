<?php
session_start();
include("dbh.php");

$idmaison=$_SESSION['id_maison_choisie'];
$nompiece=$_POST['piece'];

$req3 = $bdd->prepare("INSERT INTO piece(id_piece, id_maison, nom_de_piece) VALUES (NULL, :idmaison, :nompiece)");
$req3->execute(array(':idmaison' => $idmaison, ':nompiece' => $nompiece ));

$_SESSION['choix_piece']=$nompiece;

if ($_SESSION['choix_piece']!="--- Sélectionner une pièce ---") {
  header("Location : vue_piece.php",TRUE,301);
  exit();
}
else{
  header("Location : tableaudebord.php");
  exit();
}

?>
