<?php
session_start();

if (isset($_POST['submit'])) {
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_5e;charset=utf8', 'root', 'root');
  }
  catch (Exception $e){
    die('Erreur : '.$e->getMessage());
  }
$email = $_POST['email'];
$code = $_POST['code'];



  //erreurs
  if (empty($email) || empty($code)) {
    header("Location: Enregistrement.php?champs=vides");
    exit();
  } else {
    // $sql = "SELECT * FROM confirmation WHERE confirmation_email=$email";
    // $result = $mysqli->escape_string($sql);
    // $resultCheck = mysqli_num_rows($sql);
    $req1 = $bdd->query("SELECT * FROM confirmation WHERE email = '$email'");
    $res1 = $req1->fetchAll();
    if (count($res1) < 1) {
      header("Location: Enregistrement.php?confirmation=erreur");
      exit();
    } else {
        if ($code != $res1[0]["code"]) {
          header("Location: Enregistrement.php?code=faux");
          exit();
        } elseif($code == $res1[0]["code"]) {
          //commencer Enregistrement
          $_SESSION['email'] = $email;
          header("Location: Enregistrement2.php");
          exit();
        }
      }
    }
  }

else {
  header("Location: Enregistrement.php");
  exit();
}
?>
