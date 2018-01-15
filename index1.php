<?php

if (isset($_POST['submit'])) {
  include 'dbh.php';

  $email = mysqli_real_escape_string($conn, $_POST['email'])
  $code = mysqli_real_escape_string($conn, $_POST['code'])

  //erreurs
  if (empty($email) || empty($code)) {
    header("Location: Enregistrement.php?champs=vides")
    exit();
  } else {
    $sql = "SELECT * FROM confirmation WHERE confirmation_email=$email";
    $result = myqsli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: Enregistrement.php?confirmation=erreur")
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        if ($code != $row["confirmation_code"]) {
          header("Location: Enregistrement.php?code=faux")
          exit();
        } elseif($code == $row["confirmation_code"]) {
          //commencer Enregistrement
          $_SESSION['email'] = $row['confirmation_email']
          header("Location: Enregistrement2.php")
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
