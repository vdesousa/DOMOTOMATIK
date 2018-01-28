<?php
$requete=$bdd->prepare("UPDATE personne SET nom=:nom, prenom=:prenom, telephone=:telephone, email=:email, mot_de_passe=:mdp WHERE id_personne=$idpersonne");
$requete->execute(array(
  'nom'=>$_POST['nom'],
  'prenom'=>$_POST['prenom'],
  'telephone'=>$_POST['telephone'],
  'email'=>$_POST['email'],
  'mdp'=>$_POST['pass']
)); // On insère les données transmises par le formulaire qui correspondent à la table personne
$requete->closeCursor();

$requete2=$bdd->prepare("UPDATE utilisateur SET numero=:numero, rue=:rue, ville=:ville, code_postal=:code_postal, pays=:pays; complement=:complement WHERE id_personne=$idpersonne");
$requete2->execute(array(
  'numero'=>$_POST['numero'],
  'complement'=>$_POST['complement'],
  'rue'=>$_POST['rue'],
  'ville'=>$_POST['ville'],
  'code_postal'=>$_POST['cp'],
  'pays'=>$_POST['pays']
)); // On insère les données transmises par le formulaire qui correspondent à la table utilisateur
$requete2->closeCursor();
?>
