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

<!-- ...................................................................................  -->

<title>Copyright</title>

<section>

	<h1>Copyright</h1>

		<form action="espace_administrateur.php" method="post">
			<textarea name="copyright">
				<?php $showFaq=$bdd->query('SELECT contenu FROM documents_juridiques WHERE nom=\'copyright\'');
							$insertFaq=$showFaq->fetch();
							echo $insertFaq['contenu'] ;
				?>
			</textarea></br>

			<input type="submit" name="register" value="Enregistrer" onclick="modifierCopyright()"/>
	</form>

	</section>

	<script>
	function modifierCopyright(){
		alert('La modification a bien été prise en compte.');
	}
	</script>

<?php include('footer.php'); ?>
