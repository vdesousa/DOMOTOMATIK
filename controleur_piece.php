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
        $valeurs[] = $donnee['valeur_temps_reel'];
        $a+=1;
    }
endforeach;


$nb_lignes=floor($a/3);
$nb_seuls=$a%3;

$_SESSION['types']=$types;
$_SESSION['valeurs']=$valeurs;
$_SESSION['nb_lignes']=$nb_lignes;
$_SESSION['nb_seuls']=$nb_seuls;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_piece.css">
</head>

<!--Le vrai truc intéressant-->
<?php
    $i=0;
    while($_SESSION['nb_lignes']!=0){
?>
        <div class="ligne">
    <?php
        $count=0;

        while($count!=3){
    ?>    
            <div class="nom_capteur">
                <p><?php echo $_SESSION['types'][$i]; ?></p>
            </div>
            <div class="valeur">
                <p><?php echo $_SESSION['valeurs'][$i]; ?></p>        
            </div>
            <a href="capteurt.php"><img src="reglage.png" alt="reglage" id="reglage"></a>
        <?php
            $i+=1;
            $count++;
        }    
        ?>    
        </div>
<?php
        $_SESSION['nb_lignes']-=1;
    }

    if($_SESSION['nb_seuls']!=0){
        while($_SESSION['nb_seuls']!=0){
?>
            <div class="nom_capteur">
                <p><?php echo $_SESSION['types'][$i]; ?></p>
            </div>
            <div class="valeur">
                <p><?php echo $_SESSION['valeurs'][$i]; ?></p>        
            </div>
            <a href="capteurt.php"><img src="reglage.png" alt="reglage" id="reglage"></a>    
<?php        
            $i+=1;
            $_SESSION['nb_seuls']-=1;
        }
    }
?>

</html>