<?php
session_start();
include("dbh.php"); // Connexion bdd
include("modele_ajout_domicile.php");
if (!isset($_POST['complement']))
{
  $_POST['complement']=NULL;
}

header("location:tableaudebord.php");

?>
