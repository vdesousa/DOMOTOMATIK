<?php

/*Ouverture de la session pour récupérer les infos*/
session_start();

/*Connexion BDD*/
try{$bdd = new PDO('mysql:host=localhost;port=8889;dbname=bdd_5e;charset=utf8', 'root', 'root');}
catch (Exception $e){die('Erreur : '.$e->getMessage());}


//************************ PREMIER EXEMPLE **************************************

/*Récupération de la varaible id_maison passée en session sinon ça merde dans la requête SQL
  (une sombre histoire de guillemets)*/
$idmaison = $_SESSION['id_maison'];

/*La formulation de la requête et son affichage*/
$requete = $bdd->query("SELECT nom_de_piece FROM piece WHERE id_maison = '$idmaison'");
$donnees = $requete->fetchAll();

/*FACULTATIF : L'affichage du nom des pièces appartenant au gars dont la session est ouverte
foreach ($donnees as $donnee):
{
    echo $donnee['nom_de_piece'];
    echo '</br>';
}
endforeach;*/

/*Le nombre de pièces du gars*/
$a=0;

foreach ($donnees as $donnee):
{
    $a+=1;
}
endforeach;






//**********************  PASSONS AUX CHOSES SÉRIEUSES *******************************

/*Récupération de l'id de l'utilisateur*/
$iduser = $_SESSION['id_personne'];

/*La formulation de la requête et son affichage*/
$requete = $bdd->query("SELECT * FROM capteur WHERE id_utilisateur = '$iduser'");
$donnees = $requete->fetchAll();
$a=0;
$types=[];
$valeurs=[];

foreach ($donnees as $donnee):
    {
        $types[] = $donnee['type'];
        echo $donnee['type']." ";
        $valeurs[] = $donnee['valeur_temps_reel'];
        echo '</br>';
        $a+=1;
    }
endforeach;

echo '<pre>';
print_r($types);
echo '</pre>';

echo '<pre>';
print_r($valeurs);
echo '</pre>';

$nb_lignes=floor($a/3);
$nb_seuls=$a%3;

echo '</br>';
echo $a." capteurs :";
echo '</br>';
echo $nb_lignes." ligne(s) de 3 capteurs + ";
echo $nb_seuls." capteur(s) seul(s).";
echo '</br></br>';

$_SESSION['types']=$types;
$_SESSION['valeurs']=$valeurs;
$_SESSION['nb_lignes']=$nb_lignes;
$_SESSION['nb_seuls']=$nb_seuls;

?>