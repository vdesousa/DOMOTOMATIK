<?php

require_once('config.php');

$user=$pdo->query('SELECT * FROM personne INNER JOIN utilisateur ON personne.id_personne = utilisateur.id_utilisateur');

?>
