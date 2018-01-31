<?php
require('controleur_documents_juridiques.php');
include('header_admin.php');
?>


<title>FAQ</title>


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
	margin-top:50px;
	width: 90%;
	height: 500px;
}
input[type="submit"]
{
	margin-left: 60px;
}
</style>

<!-- .........................................................................................  -->

<section>

	<h1>Foire aux Questions</h1>

		<form action="espace_administrateur.php" method="post">
			<textarea name="faq">
				<?php $showFaq=$bdd->query('SELECT contenu FROM documents_juridiques WHERE nom=\'FAQ\'');
							$insertFaq=$showFaq->fetch();
							echo $insertFaq['contenu'] ;
				?>
			</textarea></br>

			<input type="submit" name="register" value="Enregistrer" onclick="modifierFaq()"/>
		</form>
	</section>

	<script>
	function modifierFaq(){
		alert('La modification a bien été prise en compte.');
	}
	</script>

<?php include('footer.php'); ?>
