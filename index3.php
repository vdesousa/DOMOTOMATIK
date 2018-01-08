<?php

session_start();

if (isset($_POST['submit'])) {
  include 'dbh.php';

  $email = mysqli_real_escape_string($conn, $_POST['email'])
  $password = mysqli_real_escape_string($conn, $_POST['password'])

  //erreurs
  if (empty($email) || empty($password)) {
    header("Location: Enregistrement.php?champs=vides")
    exit();
  } else {
    $sql = "SELECT * FROM utilisateur WHERE utilisateur_email=$email";
    $result = myqsli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: connexion.php?connexion=erreur")
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        $checkpassword = password_verify($password, $row['utilisateur_password'])
        if ($checkpassword == false) {
          header("Location: connexion.php?connexion=erreur")
          exit();
        } elseif($checkpassword == true]) {
          //connecter
          $_SESSION['nom'] = $row['utilisateur_nom']
          $_SESSION['prenom'] = $row['utilisateur_prenom']
          $_SESSION['email'] = $row['utilisateur_email']
          $_SESSION['numero'] = $row['utilisateur_numero']
          $_SESSION['naissance'] = $row['utilisateur_naissance']
          $_SESSION['newsletter'] = $row['utilisateur_newsletter']
          $_SESSION['email'] = $row['utilisateur_email']

          header("Location: tableau_de_bord.php")
          exit();
        }
      }
    }
  }

} else {
  header("Location: Enregistrement.php?confirmation=erreur")
  exit();
}
?>
