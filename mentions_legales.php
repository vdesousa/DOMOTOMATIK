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
		margin-top: 50px;
		width: 90%;
		height: 500px;
	}
	input[type="submit"]
	{
		margin-left: 60px;
	}
</style>

<!-- ..................................................................................................  -->

<title>Mentions légales</title>

	<section>

		<h1>Mentions légales</h1>
			<form action="espace_administrateur.php" method="post">
				<textarea name="ml">
					<?php $showMl=$bdd->query('SELECT contenu FROM documents_juridiques WHERE nom=\'mention_legale\'');
    						$insertMl=$showMl->fetch();
    						echo $insertMl['contenu'] ;
					?>
				</textarea></br>

				<input type="submit" name="register" value="Enregistrer" onclick="modifierMentionsLegales()"/>

			</form>
	</section>

	<script>
	function modifierMentionsLegales(){
		alert('La modification a bien été prise en compte.');
	}
	</script>

<?php include('footer.php'); ?>
