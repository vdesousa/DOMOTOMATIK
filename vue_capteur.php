<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stylecapteur.css">
		<link rel="stylesheet" href="footer.css">
		<script type="text/javascript">
			function Autotab(box, longueur, texte){
    		if (texte.length > longueur-1) {
        	document.getElementById('TB'+box).focus();
    		}
			}
		</script>
	</head>

	<?php include("header_perso.php"); ?>
	<body>
		<section>
			<?php include("controleur_capteur.php"); ?>
			<div class="options">
				<div class="suppression">
					<form name="suppression_capteur" method="post" action="modele_capteur.php">
						<input type="hidden" name="supp_cap" value="true">
						<input type="submit" value="Supprimer le capteur">
					</form>
				</div>
				<div class="ariane">
					<p><a href="vue_piece.php">Retour à la pièce</a></p>
				</div>
			</div>
			<div class="remplir"></div>
		</section>
  </body>
	<?php include("footer.php"); ?>

</html>
