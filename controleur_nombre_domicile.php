<?php
session_start();
try
{$bdd = new PDO('mysql:host=localhost;port=3306;dbname=bdd_5e;charset=utf8', 'root', 'root');}
catch (Exception $e)
{die('Erreur : '.$e->getMessage());} // Connexion bdd

$idutilisateur=$_SESSION['id_personne'];

$requete=$bdd->query("SELECT id_maison, numero, rue, ville FROM maison WHERE id_utilisateur=$idutilisateur"); // On cherche toutes les maisons qui appartiennent à la personne
$donnees=$requete->fetchAll();
$x=0;

foreach ($donnees as $donnee)
{
  $x+=1;
}
if($x==1)
{
  $idmaison=$donnee['id_maison'];
  $_SESSION['id_maison_choisie']=$donnee['id_maison'];
  $_SESSION['position_maison']=0;
  $_SESSION['nbr_maisons']=1;
}
elseif($x!=1)
{
  echo '<h2>Choix du domicile :</h2>';
  $a=0;
  $idmaisons=[];
  $numero=[];
  $rue=[];
  $ville=[];
  $requete->closeCursor();
  $requete=$bdd->query("SELECT id_maison, numero, rue, ville FROM maison WHERE id_utilisateur=$idutilisateur"); // On cherche toutes les maisons qui appartiennent à la personne
  $donnees=$requete->fetchAll();
  foreach($donnees as $donnee)
  {
    $idmaisons[]=$donnee['id_maison'];
    $numero[]=$donnee['numero'];
    $rue[]=$donnee['rue'];
    $ville[]=$donnee['ville'];
    $a+=1;
  } //On récupère les ids, numeros, rues et villes de la personne

  $_SESSION['nbr_maisons']=$a;
  $_SESSION['id_maisons']=$idmaisons;
  $_SESSION['nbr_lignes_maisons']=floor($a/5);
  $_SESSION['nbr_maisons_restantes']=$a%5;
  $requete->closeCursor();
  ?>

  <?php
  $i=0;
  while($_SESSION['nbr_lignes_maisons']!=0)
  {
    ?>
    <div class="ligne">
      <?php
      $count=0;
      while($count!=5)
      {
        ?>
        <div class="maison">
          <p><a href=<?php echo 'tableaudebord.php?id_maison='. $idmaisons[$i] .'&position_maison='. $i;?>><?php echo $numero[$i] . " " . $rue[$i] . '<br/>' . $ville[$i]?></a></p>
        </div>
        <?php
        $i+=1;
        $count++ ;
      }
      ?>
    </div>
  <?php
  $_SESSION['nbr_lignes_maisons']-=1;
  }

  if($_SESSION['nbr_maisons_restantes']!=0)
  {
    ?>
    <div class='ligne'>
    <?php
    while($_SESSION['nbr_maisons_restantes']!=0)
    {
      ?>
      <div class='maison'>
      <p><a href=<?php echo 'tableaudebord.php?id_maison='. $idmaisons[$i] .'&position_maison='. $i;?>><?php echo $numero[$i] . " " . $rue[$i] . '<br/>' . $ville[$i]?></a></p>
      </div>
    <?php
    $i+=1;
    $_SESSION['nbr_maisons_restantes']-=1;
  }
  ?>
    </div>
  <?php

}
}
?>
