<?php
$requete=$bdd->prepare('SELECT etat FROM capteur INNER JOIN piece ON capteur.id_piece=piece.id_piece WHERE id_maison=?');
$requete->execute(array($_SESSION['id_maison_choisie'])); // On récupère l'état des capteurs de la maison dans la bdd
$donnees=$requete->fetchAll();
$requete->closeCursor();
?>
