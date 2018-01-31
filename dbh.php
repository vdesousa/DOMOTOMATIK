<?php

/*Connexion BDD*/

try{
  $bdd = new PDO('mysql:host=localhost;dbname=bdd_5e;charset=utf8', 'root', 'root');

}
catch (Exception $e){
  die('Erreur : '.$e->getMessage());
}

?>
