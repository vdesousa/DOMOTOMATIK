<?php include("headerhc.php")?>
	<?php
			session_start();

	?>
	<div class="connexion">
		<span>Se connecter</span>
		<form method="post" action="index3.php">
			<label>E-mail:
			<input type="text" name="email" /></label><br>
			<label>Mot de Passe:
			<input type="password" name="password" /></label><?php if (isset($_GET["mdp"]) AND $_GET["mdp"]=="faux") {echo "<span class=erreur>Mot de Passe éronné</span>";} ?><br>
			<?php if (isset($_GET["champs"]) AND $_GET["champs"]=="vides") {echo "<span class=erreur>Veuillez renseigner tous les champs</span><br>";} ?>
			<?php if (isset($_GET["utilisateur"]) AND $_GET["utilisateur"]=="inconnu") {echo "<span class=erreur>Votre email est éronné ou vous n'êtes pas inscrit</span><br>";} ?>
			<input type="submit" name="submit" value="Valider" />
		</form>
	</div>
<?php include("footer.php")?>
