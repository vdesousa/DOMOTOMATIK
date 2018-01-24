<?php
session_start();
include("dbh.php");

$idmaison=$_SESSION['id_maison_choisie'];
$nompiece=$_POST['piece'];

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
