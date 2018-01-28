<?php
$requete=$bdd->prepare("SELECT numero, rue, complement, ville, code_postal, pays FROM utilisateur WHERE id_personne=?");
$requete->execute(array($idpersonne)); // On récupère les informations personnelles dans la table utilisateur
$donnees=$requete->fetchAll();
$requete->closeCursor();
?>
