<?php
$requete=$bdd->query("SELECT id_maison, numero, rue, ville FROM maison WHERE id_utilisateur=$idutilisateur"); // On cherche toutes les maisons qui appartiennent à la personne
$donnees=$requete->fetchAll();
$requete->closeCursor();
?>
