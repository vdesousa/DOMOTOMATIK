<?php
$email = $_POST['email'];
$code = $_POST['code'];
$req1 = $bdd->query("SELECT * FROM confirmation WHERE email = '$email'");
$res1 = $req1->fetchAll();


?>
