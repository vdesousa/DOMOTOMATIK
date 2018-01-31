<?php

require_once('dbh.php');

$user=$bdd->query('SELECT * FROM personne INNER JOIN utilisateur ON personne.id_personne = utilisateur.id_utilisateur');
?>
