<?php

session_start();

if (isset($_POST['submit'])) {
    include("modele_connexion.php");



  //erreurs
  if (empty($email) || empty($password)) {
    header("Location: vue_connexion.php?champs=vides");
    exit();
  } else {
    if (count($res1) < 1) {
      header("Location: vue_connexion.php?utilisateur=inconnu");
      exit();
    } else {
        if (password_verify($password, $res1[0]["mot_de_passe"]) == FALSE) {
          header("Location: vue_connexion.php?mdp=faux");
          exit();
        } else {

          if (count($res2) < 1) {
            header("Location: espace_administrateur.php");
            exit();
          } else {

          header("Location: tableaudebord.php");
          exit();
        }
        }
      }
    }
  } else {
  header("Location: vue_connexion.php");
  exit();
}
?>
