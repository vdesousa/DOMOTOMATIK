<?php
$requete2=$bdd->prepare("SELECT nom, prenom, telephone, email, mot_de_passe FROM personne WHERE id_personne=?");
$requete2->execute(array($idpersonne)); // On récupère les informations personnelles dans la table personne
$donnees2=$requete2->fetchAll();
$requete2->closeCursor();
?>
