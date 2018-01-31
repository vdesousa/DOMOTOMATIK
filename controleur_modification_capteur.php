<?php
if isset($_POST['submit']){
  include('dbh.php');
  $nom=$_POST['nom'];
  $prix=$_POST['prix'];
  $description=$_POST['description'];
  $req = $bdd->prepare('UPDATE boutique(nom, prix, description) SET(:nom, :prix, :description WHERE id=:id');
    $req->execute(array(
    'id' => $_SESSION['id'],
    'nom' => $nom,
    'prix' => $prix,
    'description' => $description,
    ));
}
if isset($_POST['delete']){
  include('dbh.php');
  $req = $bdd->prepare('DELETE FROM boutique WHERE id=:id LIMIT 1');
    $req->execute(array(
    'id' => $_SESSION['id'],
    ));

}
 ?>
