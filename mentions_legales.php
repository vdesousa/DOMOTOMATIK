<?php
require('controleur_documents_juridiques.php');
include('header_admin.php');
?>


<link rel="stylesheet" type="text/css" href="style_admin.css">
<title>Mentions légales</title>

	<section>

		<h1>Mentions légales</h1>
			<form action="mentions_legales.php" method="post">
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

<?php include('footer_admin.php'); ?>
