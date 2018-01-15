<?php
try
{$bdd = new PDO('mysql:host=localhost;port=3306;dbname=bdd_5e;charset=utf8', 'root', 'root');}
catch (Exception $e)
{die('Erreur : '.$e->getMessage());} // Connexion bdd
if(isset($_GET['id_maison']))
{
  $_SESSION['id_maison_choisie']=$_GET['id_maison'];
}

if(isset($_GET['position_maison']))
{
  $_SESSION['position_maison']=$_GET['position_maison'];
}

if(isset($_SESSION['id_maison_choisie']) && isset($_SESSION['position_maison']))
{
  $positionmaison=$_SESSION['position_maison']+1;
  if($_SESSION['nbr_maisons']==1)
  {
    echo '<h2>Contrôle du domicile :</h2>';
  }
  elseif($_SESSION['nbr_maisons']>1)
  {
    echo '<h2>Contrôle du domicile '. $positionmaison .' :</h2>';
  }
  $idutilisateur=$_SESSION['id_personne'];
  $requete=$bdd->prepare("SELECT nom_de_piece, id_piece FROM piece WHERE id_maison=?"); // On vise toutes les pièces de la maison
  $requete->execute(array($_SESSION['id_maison_choisie']));
  $donnees=$requete->fetchAll();

  $a=0;
  $pieces=[];
  $idpieces=[];

  foreach($donnees as $donnee)
  {
    $pieces[]=$donnee['nom_de_piece'];
    $idpieces[]=$donnee['id_piece'];
    $a+=1;
  } //On récupère le nombre de pièces et leurs noms
  $_SESSION['nb_pieces']=$a;
  $_SESSION['pieces']=$pieces;
  $_SESSION['id_pieces']=$idpieces;
  $_SESSION['nombre_lignes_pieces']=floor($a/5); //floor=arrondi entier inférieur
  $_SESSION['nombre_pieces_restantes']=$a%5; // On veut 5 pièces par ligne
  $requete->closeCursor();



  $i=0;
  while($_SESSION['nombre_lignes_pieces']!=0)
  {
    ?>
    <div class="ligne">
      <?php
      $count=0;
      while($count!=5)
      {
        ?>
        <div class="piece">
          <p><a href=vue_piece.php?piece=<?php echo $_SESSION['id_pieces'][$i]?>><?php echo $_SESSION['pieces'][$i]?></a></p>

        </div>
        <?php
        $i+=1;
        $count++ ;
      }
      ?>
    </div>
  <?php
  $_SESSION['nombre_lignes_pieces']-=1;
  }

  if($_SESSION['nombre_pieces_restantes']!=0)
  {
    ?>
    <div class='ligne'>
    <?php
    while($_SESSION['nombre_pieces_restantes']!=0)
    {
      ?>
      <div class='piece'>
      <p><a href=vue_piece.php?piece=<?php echo $_SESSION['id_pieces'][$i]?>><?php echo $_SESSION['pieces'][$i]?></a></p>
      </div>
    <?php
    $i+=1;
    $_SESSION['nombre_pieces_restantes']-=1;
    }
  ?>
    </div>
  <?php
  }
}
?>
