<?php
try
{$bdd = new PDO('mysql:host=localhost;port=3306;dbname=bdd_5e;charset=utf8', 'root', 'root');}
catch (Exception $e)
{die('Erreur : '.$e->getMessage());} // Connexion bdd

if ($_POST['pass']!=$_POST['pass2'])
{
  header("location:espace_client.php?changement=0");
}
elseif ($_POST['pass']==$_POST['pass2'])
{
  $requete=$bdd->prepare("UPDATE personne SET nom=:nom, prenom=:prenom, telephone=:telephone, email=:email, mot_de_passe=:mdp WHERE id_personne=$idpersonne");
  $requete->execute(array(
    'nom'=>$_POST['nom'],
    'prenom'=>$_POST['prenom'],
    'telephone'=>$_POST['telephone'],
    'email'=>$_POST['email'],
    'mdp'=>$_POST['pass']


  ));
  $requete->closeCursor();

  $requete2=$bdd->prepare("UPDATE utilisateur SET numero=:numero, rue=:rue, ville=:ville, code_postal=:code_postal, pays=:pays; complement=:complement WHERE id_personne=$idpersonne");
  $requete2->execute(array(
    'numero'=>$_POST['numero'],
    'complement'=>$_POST['complement'],
    'rue'=>$_POST['rue'],
    'ville'=>$_POST['ville'],
    'code_postal'=>$_POST['cp'],
    'pays'=>$_POST['pays']
  ));
  $requete2->closeCursor();

  header('location:espace_client.php?changement=1');

}
?>
