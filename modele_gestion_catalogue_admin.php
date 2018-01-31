<?php
include("dbh.php");
$req1 = $bdd->query("SELECT `id_objet`, `nom_objet`, `photo` FROM `boutique`");
$res1 = $req1->fetchAll();


?>
