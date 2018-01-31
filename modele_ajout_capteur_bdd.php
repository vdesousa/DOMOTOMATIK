<?php
session_start();
include("dbh.php");
include("securite.php");


/*Initialisation des variables*/
$idutilisateur=securite::sql($_SESSION['id_personne']);
$idmaison=securite::sql($_SESSION['id_maison_choisie']);
$nompiece=securite::sql($_POST['piece']);
$nomcapteur=securite::sql($_POST['capteur']);

/*Requêtes préliminaires*/
$r1 = $bdd->query("SELECT id_piece FROM piece WHERE id_maison='$idmaison' AND nom_de_piece='$nompiece'");
$r1 = $r1->fetch();
$idpiece = $r1['id_piece'];

/*$r2 = $bdd->query("SELECT id_cemac FROM cemac WHERE id_maison='$idmaison' AND nom_de_piece='$nompiece'");
$r2 = $r2->fetch();
$idcemac = $r2['id_cemac'];*/

/*Insertion du capteur dans la BDD*/
$r3 = $bdd->prepare("INSERT INTO capteur(id_capteur, id_utilisateur, id_cemac, id_piece, type, valeur_temps_reel, allume_ou_eteint)
 VALUES (NULL, :idutilisateur, :idcemac, :idpiece, :nomcapteur, :valeurtempsreel, :allumeoueteint)");

$r3->execute(array(
  ':idutilisateur' => $idutilisateur,
  ':idcemac' => 153,
  ':idpiece' => $idpiece,
  ':nomcapteur' => $nomcapteur,
  ':valeurtempsreel' => 0,
  ':allumeoueteint' => 1, ));

/*Redirection vers la vue*/
header("Location : vue_piece.php",TRUE,301);
exit();

?>
