<?php
session_start();
include("dbh.php");

$idmaison=$_SESSION['id_maison_choisie'];
$nompiece=$_POST['piece'];

$req3 = $bdd->prepare("DELETE FROM piece WHERE nom_de_piece = :nompiece");
$req3->execute(array(':nompiece' => $nompiece ));


header("Location : vue_piece.php",TRUE,301);
exit();

?>
