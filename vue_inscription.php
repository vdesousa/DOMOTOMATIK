<?php include("headerhc.php")?>
	<div class="donnees1">
		<span class=titre>Créer mon profil</span>
		<form method="post" action="controle_connexion.php">
			<label>Nom:
			<input type="text" name="nom" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidenoms") {echo "<br><span class=erreur>Veuillez utiliser que des lettres</span>";}?><br>
			<label>Prénom:
			<input type="text" name="prenom" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidenoms") {echo "<br><span class=erreur>Veuillez utiliser que des lettres</span>";}?><br>
			<label>Numéro de téléphone:
			<input type="text" name="numero" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidetel") {echo "<br><span class=erreur>Veuillez utiliser que des chiffres</span>";}?><br>
			<label>Mot de Passe:
			<input type="password" name="password" /></label><br>
			<label>Confirmer mot de passe:
			<input type="password" name="passwordconfirmation" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="mdp") {echo "<br><span class=erreur>Les mots de passe ne correspondent pas</span>";}?><br>
			<label>Numéro de rue:
			<input type="text" name="numerop" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class=erreur>Adresse invalide</span>";}?><br>
			<label>Rue:
			<input type="text" name="rue" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class=erreur>Adresse invalide</span>";}?><br>
			<label>Complément:
			<input type="text" name="complement" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class=erreur>Adresse invalide</span>";}?><br>
			<label>Code Postal:
			<input type="text" name="codepostal" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="cp") {echo "<br><span class=erreur>Code Postal invalide</span>";}?><br>
			<label>Ville:
			<input type="text" name="ville" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="vil") {echo "<br><span class=erreur>Ville invalide</span>";}?><br>
			<label>Pays:
			<input type="text" name="pays" /></label><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class=erreur>Adresse invalide</span>";}?><br>
			<input type="checkbox" name="CGU" />J'accepte les <a href="CGU.php">CGU</a><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="CGU") {echo "<br><span class=erreur>Veuillez accepter les CGU</span>";}?><br>
			<input type="checkbox" name="Newsletter" />Je m'inscris à la Newsletter<br>
			<input type="submit" name="submit" value="Continuer" /><br>
			<?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="vide") {echo "<br><span class=erreur>Veuillez remplir tous les champs</span>";}?>
		</form>
	</div>

<?php include("footer.php")?>
