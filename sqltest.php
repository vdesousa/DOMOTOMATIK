<?php
try
{
    $bdd = new PDO('mysql:host=localhost; dbname=info;charset=utf8' , 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT valeur_en_temps_reel FROM capteur');

while ($donnees = $reponse->fetch())
{
    echo $donnees['nom'] . '<br />';
}

$reponse->closeCursor();

?>