<?php
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
if ($x==0)
{
  header("location:vue_ajout_domicile.php");
}
elseif($x==1)
{
  foreach($donnees as $donnee)
  {
    $idmaisons[]=$donnee['id_maison'];
    $numero[]=$donnee['numero'];
    $rue[]=$donnee['rue'];
    $ville[]=$donnee['ville'];
  }

  $idmaison=$donnee['id_maison'];
  $_SESSION['id_maison_choisie']=$donnee['id_maison'];
  $_SESSION['position_maison']=0;
  $_SESSION['nbr_maisons']=1;
  ?>
  <h2>Choix du domicile :</h2>
  <div class="ligne">
    <div class="maison"><p><a href="tableaudebord.php?id_maison=<?php echo $idmaisons[0] ?>"><?php echo $numero[0] . " " . $rue[0] . '<br/>' . $ville[0]?></a></p></div>
    <div class='maison2'><p><a href=vue_ajout_domicile.php>Ajouter un domicile</a></p></div>
  </div>

  <?php
}
elseif($x>1)
{
  $a=0;
  echo '<h2>Choix du domicile :</h2>';
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
  ?>

  <?php
  $i=0;
  $nbr_lignes=$_SESSION['nbr_lignes_maisons'];

  while($nbr_lignes!=0)
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
  $nbr_lignes-=1;
  }
  if ($_SESSION['nbr_maisons_restantes']==0)
  {?>
    <div class="ligne">
      <div class='maison2'>
        <p><a href=vue_ajout_domicile.php>Ajouter un domicile</a></p>
      </div>
    </div>
  <?php
  }

  if($_SESSION['nbr_maisons_restantes']!=0)
  {
    ?>
    <div class='ligne'>
    <?php
    $nbr_maisons_restantes=$_SESSION['nbr_maisons_restantes'];
    while($nbr_maisons_restantes!=0)
    {
      ?>
      <div class='maison'>
      <p><a href=<?php echo 'tableaudebord.php?id_maison='. $idmaisons[$i] .'&position_maison='. $i;?>><?php echo $numero[$i] . " " . $rue[$i] . '<br/>' . $ville[$i]?></a></p>
      </div>
    <?php
    $i+=1;
    $nbr_maisons_restantes-=1;
    }
  ?><div class='maison2'>
        <p><a href=vue_ajout_domicile.php>Ajouter un domicile</a></p>
      </div>
    </div>
  <?php
  }
}?>
