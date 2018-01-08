<?php

if (isset($_POST['submit'])) {

    include_once 'dbh.php'

    $nom =  mysqli_real_escape_string($conn, $_POST['nom'];
    $prenom =  mysqli_real_escape_string($conn, $_POST['prenom'];
    $email = $_SESSION['confirmation_email'];
    $naissance =  mysqli_real_escape_string($conn, $_POST['naissance'];
    $numero =  mysqli_real_escape_string($conn, $_POST['numero'];
    $password =  mysqli_real_escape_string($conn, $_POST['password'];
    $passwordconfirmation =
    mysqli_real_escape_string($conn, $_POST['passwordconfirmation'];
    if (isset($_POST['Newsletter']))
      {$newsletter = mysqli_real_escape_string($conn, "oui";
    } else {mysqli_real_escape_string($conn, "non";}

    //erreurs
    if(empty($nom) || empty($prenom) || empty($naissance) ||
    empty($numero) || empty($password)) {
      header("Location: Enregistrement2.php?enregistrement=vide")
      exit();
    } else {
      //caractères valides
      if (!preg_match("/^[a-zA-Z]*$/", $nom) || !preg_match("/^[a-zA-Z]*$/", $prenom) ||
       !preg_match("/^[0-9]*$/", $naissance) || !preg_match("/^[0-9]*$/", $numero)) {
        header("Location: Enregistrement2.php?enregistrement=invalide")
        exit();
      } else {
        // mot de passe égaux
        if ($password == $passwordconfirmation) {
          header("Location: Enregistrement2.php?enregistrement=mdp")
          exit();
        } else {
          if (isset($_POST['CGU'])) {
            //Hash mdp
            $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
            //inserer
            $sql = "INSERT INTO Utilisateur (Utilisateur_nom, Utilisateur_prenom, Utilisateur_email, Utilisateur_naissance,
               Utilisateur_numero, Utilisateur_password, Utilisateur_newsletter)
               VALUES ('$nom', '$prenom', '$email', '$naissance', '$numero',
                  '$hashedpassword')"
                mysqli_query($conn, $sql);
                header("Location: Enregistrement2.php?enregistrement=succes")
                exit();
          } else {
            header("Location: Enregistrement2.php?enregistrement=CGU")
            exit();
          }
        }

      }




} else {
  header("Location: Enregistrement2.php");
  exit();
}
?>
