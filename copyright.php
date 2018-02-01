<?php
require('controleur_documents_juridiques.php');
include('header_admin.php');
?>


<link rel="stylesheet" type="text/css" href="style_admin.css">
<title>Copyright</title>

<section>

	<h1>Copyright</h1>

		<form action="copyright.php" method="post">
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

<?php include('footer_admin.php'); ?>
