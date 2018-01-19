<?php
session_start();

/*Connexion BDD*/
try{$bdd = new PDO('mysql:host=localhost;port=8889;dbname=bdd_5e;charset=utf8', 'root', 'root');}
catch (Exception $e){die('Erreur : '.$e->getMessage());}

$idmaison=$_SESSION['id_maison'];
$nompiece=$_POST['piece'];

$req3 = $bdd->prepare("INSERT INTO piece(id_piece, id_maison, nom_de_piece) VALUES (NULL, :idmaison, :nompiece)");
$req3->execute(array(':idmaison' => $idmaison, ':nompiece' => $nompiece ));


header("Location : vue_piece.php",TRUE,301);
exit();

?>
