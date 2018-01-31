<?php
include('dbh.php');
$capt=$_GET['capteur'];
$req1 = $bdd->query("SELECT * FROM boutique WHERE id_objet = '$capt'");
$res1 = $req1->fetchAll();
$nom=$res1[0]['nom_objet'];
$type=$res1[0]['type'];
$prix=$res1[0]['prix'];
$description=$res1[0]['description'];
$photo=$res1[0]['photo'];
?>
