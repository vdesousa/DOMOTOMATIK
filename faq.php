<?php
require('controleur_documents_juridiques.php');
include('header_admin.php');
?>

<link rel="stylesheet" type="text/css" href="style_admin.css">
<title>FAQ</title>


<section>

	<h1>Foire aux Questions</h1>

		<form action="faq.php" method="post">
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

<?php include('footer_admin.php'); ?>
