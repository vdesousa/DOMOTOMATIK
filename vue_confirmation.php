<?php
		session_start();

?>
<?php include("headerhc.php")?>



		<h1>Créer mon profil</h1>
		<form method="post" action="controle_confirmation.php">
			<label>E-mail:</label>
			<input type="text" name="email" required /><?php if (isset($_GET["comfirmation"]) AND $_GET["confirmation"]=="erreur") {echo "<br><p class='erreur'>Votre email n'a pas encore été inscrit</p>";} ?><br><br>
			<label>Code d'activation:</label>
			<input type="text" name="code" required/><?php if (isset($_GET["code"]) AND $_GET["code"]=="faux") {echo "<br><p class='erreur'> Votre code est faux</p>";} ?><br><br>
			<input class="bouton" type="submit" name="submit" value="Valider" /><br>
			<?php if (isset($_GET["champs"]) AND $_GET["champs"]=="vides") {echo "<p>Veuillez remplir tous les champs</p>";} ?>
		</form>

<?php include("footer.php")?>
