<?php
require('controleur_documents_juridiques.php');
include('header_admin.php');
?>



<style>
section
{
	width: 100%;
	bottom: 10%;
}

textarea
{
	display: inline-block;
	margin-left: 65px;
	margin-top: 20px;
	width: 90%;
	height: 500px;
}
input[type="submit"]
{
	margin-left: 60px;
}
</style>

<!-- ................................................................................. -->

<title>CGU</title>

	<section>

	<h1>Conditions Générales d'Utilisation</h1>

		<form action="espace_administrateur.php" method="post">
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

<?php include('footer_admin.php'); ?>
