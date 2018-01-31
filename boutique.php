<?php include("headerhc.php") ?>
<?php   include("dbh.php");
  $req1 = $bdd->query("SELECT `id_objet`, `nom_objet`, `photo` FROM `boutique`");
  $res1 = $req1->fetchAll();
  ?>
<h1>Catalogue</h1>
<ul>
  <?php
  $nbrcapt=count($res1);
  $nbrcapt-=1;
  while ($nbrcapt !=-1) {
      $nomobj = $res1[$nbrcapt]['nom_objet'];
      $photo = $res1[$nbrcapt]['photo'];
      $id = $res1[$nbrcapt]['id_objet'];
    	echo '<li><a href="description.php?capteur='.$id.'"><img src='.$photo.'.jpg"><br><span>'.$nomobj.'</span></a></li>';
      $nbrcapt -=1; };
  ?>
</ul>

<?php include("footer.php")?>
