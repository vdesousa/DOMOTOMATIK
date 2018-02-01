<?php
require('controleur_documents_juridiques.php');
include('header_perso.php');
?>

			<style>
				#mentions_legales
				{
					min-height: 2000px;
					margin-top: 100px;
					margin-bottom: 50px;
					margin-left: 15px;
				}
			</style>

<!-- ...........................................................................................  -->

<title>Mentions légales</title>

<section>

	<h1>Mentions légales</h1>

		<div id="mentions_legales">

			<?php
					$showMl=$bdd->query('SELECT contenu FROM documents_juridiques WHERE nom=\'mention_legale\'');
    			$insertMl=$showMl->fetch();
    			echo nl2br($insertMl['contenu']) ;
			?>

		</div>
		</section>

<?php include('footer.php'); ?>
