<?php
include("dbh.php");
$email = $_POST['email'];
$password = $_POST['password'];
$req1 = $bdd->query("SELECT * FROM personne WHERE email = '$email'");
$res1 = $req1->fetchAll();
$id = $res1[0]['id_personne'];
$_SESSION['email'] = $email;
$_SESSION ['nom'] = $res1[0]['nom'];
$_SESSION ['prenom'] = $res1[0]['prenom'];
$_SESSION ['telephone'] = $res1[0]['telephone'];
$_SESSION['id_personne'] = $res1[0]['id_personne'];
$req2 = $bdd->query("SELECT * FROM utilisateur WHERE id_personne = '$id'");
$res2 = $req2->fetchAll();
$_SESSION['id_utilisateur'] = $res2[0]['id_utilisateur'];
?>
