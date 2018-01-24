<?php
session_start();
$_SESSION['id_personne']=2;
$_SESSION['id_utilisateur']=1;
echo '<a href=tableaudebord.php>Tableau de bord</a><br/>';
echo '<a href="vue_ajout_domicile.php">Ajout domicile</a><br/>';
echo '<a href=espace_client.php>Espace client</a><br/>';
?>
