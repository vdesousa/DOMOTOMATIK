<?php
$requete=$bdd->prepare("SELECT nom_de_piece, id_piece, complement FROM piece WHERE id_maison=?");
$requete->execute(array($_SESSION['id_maison_choisie'])); // On récupère des informations sur les pièces de la maison
$donnees=$requete->fetchAll();
$requete->closeCursor();
?>
