<?php
$requete=$bdd->prepare("INSERT INTO maison(id_utilisateur, numero, rue, complement, code_postal, ville, pays) VALUES (:id_utilisateur, :numero, :rue, :complement, :code_postal, :ville, :pays)");
$requete->execute(array(
  'id_utilisateur'=>$_POST['id_utilisateur'],
  'numero'=>$_POST['numero'],
  'rue'=>$_POST['rue'],
  'complement'=>$_POST['complement'],
  'code_postal'=>$_POST['code_postal'],
  'ville'=>$_POST['ville'],
  'pays'=>$_POST['pays']
)); // On entre les données de l'utilisateur dans la base de données
$requete->closeCursor();
?>
