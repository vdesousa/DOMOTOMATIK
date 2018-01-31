<?php
include('headerhc.php');
include('dbh.php');
$capt=$_GET['capteur'];
$req1 = $bdd->query("SELECT * FROM boutique WHERE id_objet = '$capt'");
$res1 = $req1->fetchAll();
$nom=$res1[0]['nom_objet'];
$type=$res1[0]['type'];
$prix=$res1[0]['prix'];
$description=$res1[0]['description'];
$photo=$res1[0]['photo'];

?>
<h1><?php echo $nom?></h1>
<img class="description" src="<?php echo $photo?>.jpg">
<p>Type: <?php echo $type ?></p><br>
<p>Prix: <?php echo $prix ?></p><br>
<p>Description: <?php echo $description ?></p>

<?php include("footer.php") ?>
