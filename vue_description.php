<?php
include('headerhc.php');
include('controleur_description.php');

?>

<h1><?php echo $nom?></h1>
<div class=descriptionc>
<img class="description" src="<?php echo $photo?>.jpg">
<div class=descriptionp>
<p>Type: <?php echo $type ?></p><br>
<p>Prix: <?php echo $prix ?></p><br>
<p>Description: <?php echo $description ?></p>
</div>
</div>
<?php include("footer.php") ?>
