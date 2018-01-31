<?php
session_start();
include("dbh.php");
include("securite.php");

$idmaison=securite::sql($_SESSION['id_maison_choisie']);
$nompiece=securite::sql($_POST['piece']);

$req3 = $bdd->prepare("DELETE FROM piece WHERE nom_de_piece = :nompiece");
$req3->execute(array(':nompiece' => $nompiece ));

if ($_SESSION['choix_piece']===$nompiece) {
  header("Location : tableaudebord.php",TRUE,301);
  exit();
}
else{
  header("Location : vue_piece.php",TRUE,301);
  exit();
}

?>
