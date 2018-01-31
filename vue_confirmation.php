<?php include("headerhc.php")?>

	<?php
			session_start();

	?>
	<div class="confirmation">
		<span>Créer mon profil</span>
		<form method="post" action="controle_confirmation.php">
			<label>E-mail:
			<input type="text" name="email" /></label><?php if (isset($_GET["comfirmation"]) AND $_GET["confirmation"]=="erreur") {echo "<p>Votre email n'a pas encore été inscrit</p>";} ?><br>
			<label>Code d'activation:
			<input type="text" name="code" /></label><?php if (isset($_GET["code"]) AND $_GET["code"]=="faux") {echo "<p> Votre code est faux</p>";} ?><br>
			<input type="submit" name="submit" value="Valider" /><br>
			<?php if (isset($_GET["champs"]) AND $_GET["champs"]=="vides") {echo "<p>Veuillez remplir tous les champs</p>";} ?>
		</form>
	</div>
<?php include("footer.php")?>
