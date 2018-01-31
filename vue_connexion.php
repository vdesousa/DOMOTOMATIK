<?php include("headerhc.php")?>
	<?php
			session_start();

	?>

		<h1>Se connecter</h1>
		<form method="post" action="controleur_connexion.php">
			<label>E-mail:</label>
			<input type="text" name="email" /><br><br>
			<label>Mot de Passe:</label>
			<input type="password" name="password" /><?php if (isset($_GET["mdp"]) AND $_GET["mdp"]=="faux") {echo "<span class=erreur>Mot de Passe éronné</span>";} ?><br><br>
			<?php if (isset($_GET["champs"]) AND $_GET["champs"]=="vides") {echo "<span class=erreur>Veuillez renseigner tous les champs</span><br>";} ?>
			<?php if (isset($_GET["utilisateur"]) AND $_GET["utilisateur"]=="inconnu") {echo "<span class=erreur>Votre email est éronné ou vous n'êtes pas inscrit</span><br>";} ?>
			<input class="bouton" type="submit" name="submit" value="Valider" /><br>
		</form>

<?php include("footer.php")?>
