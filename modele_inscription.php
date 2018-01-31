<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_SESSION['email'];
$numero =  $_POST['numero'];
$password = $_POST['password'];
$passwordconfirmation = $_POST['passwordconfirmation'];
if (isset($_POST['Newsletter']))
  {$newsletter = "oui";
} else {$newsletter = "non";}
$numerop = $_POST['numerop'];
$rue = $_POST['rue'];
$complement = $_POST['complement'];
$codepostal = $_POST['codepostal'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];

?>
