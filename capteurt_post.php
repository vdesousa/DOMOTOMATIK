<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=domo;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


if (isset($_POST['etat']))
{
// récupération des variables POST:
$etat=($_POST['etat']);
// Insertion de l'état à l'aide d'une requête préparée

$req = $bdd->prepare('UPDATE capteur SET etat = :nvetat WHERE id_capteur=1');
$req->execute(array('nvetat' => $etat));

$req->closeCursor();
// Redirection du visiteur vers la page du capteur
header('Location: capteurt.php');
}


if (isset($_POST['voulue']))
{
// récupération des variables POST:
$voulue=($_POST['voulue']);
// Insertion de la valeur souhaitée à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE parametrer SET valeur_souhaitee = :nvvaleur WHERE id_capteur = 1');
$req->execute(array('nvvaleur' => $voulue));

$req->closeCursor();
// Redirection du visiteur vers la page du capteur
header('Location: capteurt.php');
}

if (isset($_POST['horaire_debut']) AND ($_POST['horaire_fin']))
{
// récupération des variables POST:
$horaire_debut=($_POST['horaire_debut']);
$horaire_fin=($_POST['horaire_fin']);
// Insertion de l'horaire souhaitée à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE parametrer SET heure_debut = :nvhoraire_debut, heure_fin = :nvhoraire_fin WHERE id_capteur = 1');
$req->execute(array(
	'nvhoraire_debut' => $horaire_debut,
	'nvhoraire_fin' => $horaire_fin
	));

$req->closeCursor();
// Redirection du visiteur vers la page du capteur
header('Location: capteurt.php');
}


else {
	header('Location: capteurt.php');
}
?>
