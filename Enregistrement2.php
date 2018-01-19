<?php include("headerhc.php")?>
	<div class="donnees1">
		<span>Créer mon profil</span>
		<form method="post" action="index2.php">
			<label>Nom:
			<input type="text" name="nom" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidenoms") {echo "<p>Veuillez utiliser que des lettres</p>";}?><br>
			<label>Prénom:
			<input type="text" name="prenom" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidenoms") {echo "<p>Veuillez utiliser que des lettres</p>";}?><br>
			<label>Numéro de téléphone:
			<input type="text" name="numero" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidetel") {echo "<p>Veuillez utiliser que des chiffres</p>";}?><br>
			<label>Mot de Passe:
			<input type="password" name="password" /></label><br>
			<label>Confirmer mot de passe:
			<input type="password" name="passwordconfirmation" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="mdp") {echo "<p>Les mots de passe ne correspondent pas</p>";}?><br>
			<label>Adresse:
			<input type="text" name="adresse" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<p>Adresse invalide</p>";}?><br>
			<label>Code Postal:
			<input type="text" name="codepostal" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="cp") {echo "<p>Code Postal invalide</p>";}?><br>
			<label>Ville:
			<input type="text" name="ville" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="vil") {echo "<p>Ville invalide</p>";}?><br>
			<input type="checkbox" name="CGU" />J'accepte les <a href="CGU.php">CGU</a><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="CGU") {echo "<p>Veuillez accepter les CGU</p>";}?><br>
			<input type="checkbox" name="Newsletter" />Je m'inscris à la Newsletter<br>
			<input type="submit" name="submit" value="Continuer" /><br>
			<?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="vide") {echo "<p>Veuillez remplir tous les champs</p>";}?>
		</form>
	</div>
<?php include("footer.php")?>
