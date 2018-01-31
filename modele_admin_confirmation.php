<?php
include("dbh.php");
$req1 = $bdd->query("SELECT `email`, `code` FROM `confirmation`");
$res1 = $req1->fetchAll();
$nbruti=count($res1);
$nbruti-=1;
?>
