<?php

include("dbh.php");

if (isset($_GET['piece'])) {

  $idpiece=$_GET['piece'];

  $req = $bdd->query("SELECT nom_de_piece FROM piece WHERE id_piece = '$idpiece'");
  $res = $req->fetch();
  $nomdelapiece = $res['nom_de_piece'];

}

?>
