<?php

session_start();

if (isset($_POST['submit'])) {
    include("dbh.php");
    }

  $email = $_POST['email'];
  $password = $_POST['password'];

  //erreurs
  if (empty($email) || empty($password)) {
    header("Location: connexion.php?champs=vides");
    exit();
  } else {
    $req1 = $bdd->query("SELECT * FROM personne WHERE email = '$email'");
    $res1 = $req1->fetchAll();
    $id = $res1[0]['id_personne'];
    if (count($res1) < 1) {
      header("Location: connexion.php?utilisateur=inconnu");
      exit();
    } else {
        if (password_verify($password, $res1[0]["mot_de_passe"]) == FALSE) {
          header("Location: connexion.php?mdp=faux");
          exit();
        } else {
          $_SESSION['email'] = $email;
          $_SESSION ['nom'] = $res1[0]['nom'];
          $_SESSION ['prenom'] = $res1[0]['prenom'];
          $_SESSION ['telephone'] = $res1[0]['telephone'];
          $_SESSION['id_personne'] = $res1[0]['id_personne'];
          $req2 = $bdd->query("SELECT * FROM utilisateur WHERE id_personne = '$id'");
          $res2 = $req2->fetchAll();
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
  header("Location: connexion.php");
  exit();
}
?>
