<?php
session_start();
include('header_admin.php');
include('dbh.php');
$_SESSION['id']=$_GET['capteur'];
$capt=$_SESSION['id']
$req1 = $bdd->query("SELECT * FROM boutique WHERE id_objet = '$capt'");
$res1 = $req1->fetchAll();
$nom=$res1[0]['nom_objet'];
$type=$res1[0]['type'];
$prix=$res1[0]['prix'];
$description=$res1[0]['description'];
$photo=$res1[0]['photo'];

?>
<form method="post" action="controleur_modification_capteur.php">
<h1><input type="text" value="<?php echo $nom?>" name="nom"</h1>
<img class="description" src="<?php echo $photo?>.jpg">
<p>Type: <?php echo $type ?></p><br>
<p>Prix: <input type="text" value="<?php echo $prix ?>" name="prix"</p><br>
<p>Description: <input type="text" value="<?php echo $description ?>" name="description"</p><br>
<input type="submit" value="Valider" name="submit">
</form>
<form method="post" action="controleur_modification_capteur.php">
  <input type="submit" value="Supprimer le capteur" name="delete">
</form>
<?php include("footer.php") ?>
