<?php   include("dbh.php");
  include('modele_accueil.php');
  while ($nbrcapt !=-1) {
      $nomobj = $res1[$nbrcapt]['nom_objet'];
      $photo = $res1[$nbrcapt]['photo'];
      $id = $res1[$nbrcapt]['id_objet'];
    	echo '<li><a href="vue_description.php?capteur='.$id.'"><img src="'.$photo.'.jpg"><br><span>'.$nomobj.'</span></a></li>';
      $nbrcapt -=1; };
  ?>
