<?php

include('dbh.php');

$req1=$bdd->prepare('SELECT * FROM capteur INNER JOIN pannes ON capteur.id_capteur = pannes.id_capteur WHERE id_utilisateur=:utilisateur GROUP BY capteur.id_capteur');
$req1->execute(array('utilisateur'=>$_GET['panne']));
?>
