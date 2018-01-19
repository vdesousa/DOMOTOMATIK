<?php include("headerhc.php")?>
	<?php
			session_start();

	?>
	<div class="connexion">
		<span>Créer mon profil</span>
		<form method="post" action="index3.php">
			<label>E-mail:
			<input type="text" name="email" /></label><br>
			<label>Mot de Passe:
			<input type="password" name="password" /></label><?php if (isset($_GET["mdp"]) AND $_GET["mdp"]=="faux") {echo "<p>Mot de Passe éronné</p>";} ?><br>
			<?php if (isset($_GET["champs"]) AND $_GET["champs"]=="vides") {echo "<p>Veuillez renseigner tous les champs</p><br>";} ?>
			<?php if (isset($_GET["utilisateur"]) AND $_GET["utilisateur"]=="inconnu") {echo "<p>Votre email est éronné ou vous n'êtes pas inscrit</p><br>";} ?>
			<input type="submit" name="submit" value="Valider" />
		</form>
	</div>
<?php include("footer.php")?>
