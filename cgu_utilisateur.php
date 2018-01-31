<?php
require('controleur_documents_juridiques.php');
include('header_admin.php'); ?>

<style>
	#cgu
	{
			min-height: 2000px;
			margin-top: 100px;
			margin-bottom: 50px;
			margin-left: 15px;
	}
</style>

<!-- ....................................................................................... -->

<title>CGU</title>

	<section>

		<h1>Conditions Générales d'Utilisation</h1>

		<div id="cgu">
			<?php $showCGU=$bdd->query('SELECT contenu FROM documents_juridiques WHERE nom=\'CGU\'');
						$insertCGU=$showCGU->fetch();
						echo nl2br($insertCGU['contenu']) ;
			?>
		</div>

	</section>

<?php include('footer.php'); ?>
