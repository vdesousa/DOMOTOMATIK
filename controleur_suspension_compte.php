<?php
session_start();
$idutilisateur=$_SESSION['id_utilisateur'];
require('modele_suspension_compte.php');


    if(isset($_POST['register'])){
      if($_POST['suspendre']=="oui"){
        $bdd->exec("UPDATE utilisateur SET etat='1' WHERE id_utilisateur='$idutilisateur'");
        header('Location: espace_administrateur.php');

      } else {
        if($_POST['suspendre']=="non"){
          $bdd->exec("UPDATE utilisateur SET etat='0' WHERE id_utilisateur='$idutilisateur'");
          header('Location: espace_administrateur.php');
        }
      }
    }
 ?>
