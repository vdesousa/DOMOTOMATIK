<?php
session_start();

if (isset($_POST['submit'])) {
  include("modele_confirmation.php");

  //erreurs
  if (empty($email) || empty($code)) {
    header("Location: vue_confirmation.php?champs=vides");
    exit();
  } else {
    if (count($res1) < 1) {
      header("Location: vue_confirmation.php?confirmation=erreur");
      exit();
    } else {
        if ($code != $res1[0]["code"]) {
          header("Location: vue_confirmation.php?code=faux");
          exit();
        } elseif($code == $res1[0]["code"]) {
          //commencer Enregistrement
          $_SESSION['email'] = $email;
          header("Location: vue_inscription.php");
          exit();
        }
      }
    }
  }

else {
  header("Location: vue_confirmation.php");
  exit();
}
?>
