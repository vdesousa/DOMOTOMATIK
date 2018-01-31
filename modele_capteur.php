<?php
  include("dbh.php");

  // Ouverture éventuelle de session
  if (!isset($_SESSION['id_capteur'])) {
    session_start();
  }

  // Variable pour les requêtes SQL
  $idcapteur=$_SESSION['id_capteur'];
  $nomcapteur=$_SESSION['nom_capteur'];

  // Fonction conv état --> valeurs
  function conv_etat($x){
    if($x==="Nulle"){
      return 0;
    } elseif ($x==="Faible") {
      return 1;
    } elseif ($x==="Moyenne") {
      return 2;
    } elseif ($x==="Fort") {
      return 3;
    } elseif ($x==="Désactivée") {
      return 0;
    } elseif ($x==="Activée") {
      return 1;
    }
  }

  // Obtention des valeurs
  $r1 = $bdd->prepare("SELECT * FROM capteur WHERE id_capteur= :idcapteur");
  $r1->execute(array(':idcapteur' => $idcapteur));
  $rs1 = $r1->fetch();

  $etat = $rs1['allume_ou_eteint'];
  $valeur_act = $rs1['valeur_temps_reel'];

  // Requêtes pour mettre à jour l'état
  if (isset($_POST['set_etat'])) {
    if ($_POST['etat']==='allume') {
      $r2 = $bdd->prepare("UPDATE capteur SET allume_ou_eteint = 1 WHERE id_capteur = :idcapteur");
      $r2->execute(array(':idcapteur' => $idcapteur));
      header('Location : vue_capteur.php',TRUE,301);
      exit();
    }
    elseif ($_POST['etat']==='eteint') {
      $r2 = $bdd->prepare("UPDATE capteur SET allume_ou_eteint = 0 WHERE id_capteur = :idcapteur");
      $r2->execute(array(':idcapteur' => $idcapteur));
      header('Location : vue_capteur.php',TRUE,301);
      exit();
    }
  }

  // Requête pour mettre à jour la valeur souhaitée
  if (isset($_POST['set_val'])) {
    if (isset($_POST['valeur_immediate'])) {
      $value=$_POST['valeur_immediate'];
      if ($nomcapteur==="Luminosité") {
        $value=conv_etat($value);
      }
    } elseif (isset($_POST['etat_immediat'])) {
      $value=$_POST['etat_immediat'];
      $value=conv_etat($value);
    }
    $r3 = $bdd->prepare("UPDATE capteur SET valeur_temps_reel = :valeur WHERE id_capteur = :idcapteur");
    $r3->execute(array(
      ':idcapteur' => $idcapteur,
      ':valeur' => $value
    ));
    header('Location : vue_capteur.php',TRUE,301);
    exit();
  }

  if (isset($_POST['prog_val'])) {
    if (isset($_POST['valeur_souhaitee'])) {
      $val_prog=$_POST['valeur_souhaitee'];
      if ($nomcapteur==="Luminosité") {
        $val_prog=conv_etat($val_prog);
      }
    } elseif (isset($_POST['etat_souhaite'])) {
      $val_prog=$_POST['etat_souhaite'];
      $val_prog=conv_etat($val_prog);
    }

  }

?>
