<?php

/*Connexion BDD*/

try{
<<<<<<< HEAD
  $bdd = new PDO('mysql:host=localhost;dbname=bdd_5e;charset=utf8', 'root', 'root');
=======
  $bdd = new PDO('mysql:host=localhost;port=3306;dbname=bdd_5e;charset=utf8', 'root', 'root');
>>>>>>> eb2e26fbfe6162c0d57978e0f9969ac9149c4b2f
}
catch (Exception $e){
  die('Erreur : '.$e->getMessage());
}

?>
