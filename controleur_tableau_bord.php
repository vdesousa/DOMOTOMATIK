<?php
include("dbh.php"); // Connexion bdd
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
    include("controleur_barre_etat.php");
    echo '<h2>Contrôle du domicile :</h2>';
  }
  elseif($_SESSION['nbr_maisons']>1)
  {
    include("controleur_barre_etat.php");
    echo '<h2>Contrôle du domicile n°'. $positionmaison .' :</h2>';
  }

  $idutilisateur=$_SESSION['id_personne'];
  $requete=$bdd->prepare("SELECT nom_de_piece, id_piece, complement FROM piece WHERE id_maison=?"); // On vise toutes les pièces de la maison
  $requete->execute(array($_SESSION['id_maison_choisie']));
  $donnees=$requete->fetchAll();

  $a=0;
  $complement=[];
  $pieces=[];
  $idpieces=[];
  foreach($donnees as $donnee)
  {
    $pieces[]=$donnee['nom_de_piece'];
    $idpieces[]=$donnee['id_piece'];
    $complement[]=$donnee['complement'];
    $a+=1;
  } //On récupère le nombre de pièces et leurs noms
  $_SESSION['nb_pieces']=$a;
  $_SESSION['pieces']=$pieces;
  $_SESSION['id_pieces']=$idpieces;
  $_SESSION['complement_piece']=$complement;
  $_SESSION['nombre_lignes_pieces']=floor($a/5); //floor=arrondi entier inférieur
  $_SESSION['nombre_pieces_restantes']=$a%5; // On veut 5 pièces par ligne
  $requete->closeCursor();


  $i=0;
  $nbr_lignes=$_SESSION['nombre_lignes_pieces'];
  while($nbr_lignes!=0)
  {
    ?>
    <div class="ligne2">
      <?php
      $count=0;
      while($count!=5)
      {
        ?>
        <div class="piece">
          <p><a href=vue_piece.php?piece=<?php echo $_SESSION['id_pieces'][$i]?>><?php echo $_SESSION['pieces'][$i]?><?php if($_SESSION['complement_piece'][$i]!=NULL) {echo ' '.$_SESSION['complement_piece'][$i]; }?></a></p>

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

  if($_SESSION['nombre_pieces_restantes']==0)
  {
    ?><div class="ligne2">
      <div class="piece2">
        <p><a href=vue_ajout_piece.php>Ajouter une pièce</a></p>
      </div>
    </div><?php
  }

  if($_SESSION['nombre_pieces_restantes']!=0)
  {
    $nbr_pieces_restantes=$_SESSION['nombre_pieces_restantes'];
    ?>
    <div class='ligne2'>
      <?php
      while($nbr_pieces_restantes!=0)
      {
        ?>
        <div class='piece'>
        <p><a href=vue_piece.php?piece=<?php echo $_SESSION['id_pieces'][$i]?>><?php echo $_SESSION['pieces'][$i]?><?php if($_SESSION['complement_piece'][$i]!=NULL) {echo ' '.$_SESSION['complement_piece'][$i]; }?></a></p>
        </div>
      <?php
      $i+=1;
      $nbr_pieces_restantes-=1;
      }
      ?>
        <div class="piece2">
          <p><a href=vue_ajout_piece.php>Ajouter une pièce</a></p>
        </div>
    </div>
  <?php
  }
}
?>
