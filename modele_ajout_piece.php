<?php
include("dbh.php");

/*Déclaration des variables utiles aux requêtes*/
$idutilisateur=$_SESSION['id_personne'];

/*Requêtes*/
$req1 = $bdd->query("SELECT * FROM maison WHERE id_utilisateur='$idutilisateur'");
$res1 = $req1->fetchAll();

$req2 = $bdd->query("SELECT nom_piece FROM type_piece");
$res2 = $req2->fetchAll();

$tab_dom=[];
$tab_pce=[];

foreach ($res1 as $r1) {
    $tab_temp=[];
    $tab_temp[]=$r1['numero'];
    $tab_temp[]=$r1['rue'];
    $tab_temp[]=$r1['complement'];
    $tab_temp[]=$r1['code_postal'];
    $tab_temp[]=$r1['ville'];
    $tab_temp[]=$r1['pays'];
    $tab_dom[]=$tab_temp;
}

foreach ($res2 as $r2) {
    $tab_pce[]=$r2['nom_piece'];
}

?>
