<?php

session_start();

if (isset($_POST['submit'])) {
    include("dbh.php");}
    else {
 header("Location: vue_confirmation.php");
 exit();
}


  $email = $_POST['email'];
  $code = rand(000000,999999);
  $req1 = $bdd->query("SELECT * FROM confirmation WHERE email = '$email'");
  $res1 = $req1->fetchAll();
  $nbr = count($res1);
  if ($nbr > 0) {
    header("Location: vue_confirmation.php?email=existant");
    exit();
  }
  $req2 = $bdd->query("SELECT * FROM confirmation WHERE code = '$code'");
  $res2 = $req2->fetchAll();
  $nbr2 = count($res2);
  while ($nbr2 > 0) {
    $code = rand(000000,999999);
  }

  if (empty($email)) {
    header("Location: vue_confirmation.php?champs=vides");
    exit();
  } else {
    $req = $bdd->prepare("INSERT INTO confirmation(email, code) VALUES(:email, :code)");
    $req->execute(array(
      'email' => $email,
      'code' => $code,
      ));
      header("Location: vue_inscription.php");
      exit();
    }

?>
