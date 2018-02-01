<?php
require('controleur_documents_juridiques.php');
include('header_perso.php');
?>

<style>

	#copyright
	{
		max-height: 500px;
		margin-top: 250px;
		margin-left: 550px;
	}

</style>

<!-- ......................................................................................... -->

<title>Copyright</title>

	<section>
		<h1>Copyright</h1>

			<div id="copyright">
				<?php $showFaq=$bdd->query('SELECT contenu FROM documents_juridiques WHERE nom=\'copyright\'');
							$insertFaq=$showFaq->fetch();
							echo nl2br($insertFaq['contenu']) ;
				?>
			</div>

	</section>

<?php include('footer.php'); ?>
