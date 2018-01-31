<?php
$requete=$bdd->prepare("SELECT nom, prenom FROM personne WHERE id_personne=?");
$requete->execute(array($idpersonne));
$donnees=$requete->fetchAll();
$requete->closeCursor();
?>
