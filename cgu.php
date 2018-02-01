<?php
require('controleur_documents_juridiques.php');
include('header_admin.php');
?>

<link rel="stylesheet" type="text/css" href="style_admin.css">
<title>CGU</title>

	<section>

	<h1>Conditions Générales d'Utilisation</h1>

		<form action="cgu.php" method="post">
			<textarea name="cgu">
				<?php $showCGU=$bdd->query('SELECT contenu FROM documents_juridiques WHERE nom=\'CGU\'');
							$insertCGU=$showCGU->fetch();
							echo $insertCGU['contenu'] ;
							?>
						</textarea></br>

						<input type="submit" name="register" value="Enregistrer" onclick="modifierCgu()"/>
		</form>
	</section>

	<script>
	function modifierCgu(){
		alert('La modification a bien été prise en compte.');
	}
	</script>

<?php include('footer.php'); ?>
