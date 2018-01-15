<?php include("headerhc.php")?>
	<div class="titre">
		<span>Créer mon profil</span>
	</div>
	<?php
			session_start();

	?>
	<div class="connexion">
		<form method="post" action="index3.php">
			<label>E-mail:
			<input type="text" name="email" /></label><br>
			<label>Mot de Passe:
			<input type="text" name="password" /></label><br>
			<input type="submit" value="Valider" />
		</form>
	</div>
<?php include("footer.php")?>
