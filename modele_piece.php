<?php

/*Amène la fonction de conversion de données*/
include('conversion_donnees.php');

/*Connexion BDD*/
include("dbh.php");

/*Fonction sécurité*/
include("securite.php");

/*Récupération de l'id de l'utilisateur et de sa maison*/
$iduser = securite::sql($_SESSION['id_personne']);
$idmaison = securite::sql($_SESSION['id_maison_choisie']);
$nompiece = securite::sql($_SESSION['choix_piece']);

/*Requête préalable : obtention de l'id de la pièce choisie*/

$req = $bdd->query("SELECT id_piece FROM piece WHERE id_maison = '$idmaison' AND nom_de_piece = '$nompiece'");
$res = $req->fetch();
$idpiece = $res['id_piece'];

/*La formulation de la requête et son affichage*/
$requete = $bdd->query("SELECT * FROM capteur WHERE id_piece = '$idpiece'");
$donnees = $requete->fetchAll();

$a=0;
$types=[];
$valeurs=[];
$idcap=[];
$etats=[];

foreach ($donnees as $donnee):{
  $idcap[] = $donnee['id_capteur'];
  $types[] = $donnee['type'];
  $etats[] = $donnee['allume_ou_eteint'];
  $conv= conversion($donnee['valeur_temps_reel'], $donnee['type']);
  $valeurs[] = $conv;
  $a+=1;
} endforeach;

$c=count($etats);
$pastilles_etat=[];
for ($i=0; $i < $c; $i++) {
  if ($etats[$i]==0) {
    $pastilles_etat[] = "<img src='red_dot.png' alt='red' height='20' width='14' hspace='5'>";
  }
  elseif ($etats[$i]==1) {
    $pastilles_etat[] = "<img src='green_dot.png' alt='green' height='18' width='25' vspace='1'>";
  }
}

/*echo '<pre>';
print_r($types);
echo '</pre>';

echo '<pre>';
print_r($valeurs);
echo '</pre>';*/

$nb_lignes=floor($a/3);
$nb_seuls=$a%3;

/* echo '</br>';
echo $a." capteurs :";
echo '</br>';
echo $nb_lignes." ligne(s) de 3 capteurs + ";
echo $nb_seuls." capteur(s) seul(s).";
echo '</br></br>'; */

$_SESSION['types']=$types;
$_SESSION['valeurs']=$valeurs;
$_SESSION['id_capteurs']=$idcap;
$_SESSION['nb_lignes']=$nb_lignes;
$_SESSION['nb_seuls']=$nb_seuls;
$_SESSION['etats']=$pastilles_etat;

?>
