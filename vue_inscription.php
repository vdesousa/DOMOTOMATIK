<?php include("headerhc.php")?>
		<h1>Créer mon profil</h1>
		<form method="post" action="controle_inscription.php">
			<label>Nom:</label>
			<input type="text" name="nom" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidenoms") {echo "<br><span class='erreur'>Veuillez utiliser que des lettres</span>";}?><br><br>
			<label>Prénom:</label>
			<input type="text" name="prenom" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidenoms") {echo "<br><span class='erreur'>Veuillez utiliser que des lettres</span>";}?><br><br>
			<label>Numéro de téléphone:</label>
			<input type="text" name="numero" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="invalidetel") {echo "<br><span class='erreur'>Veuillez utiliser que des chiffres</span>";}?><br><br>
			<label>Mot de Passe:</label>
			<input type="password" name="password" required/><br><br>
			<label>Confirmer mot de passe:</label>
			<input type="password" name="passwordconfirmation" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="mdp") {echo "<br><span class='erreur'>Les mots de passe ne correspondent pas</span>";}?><br><br>
			<label>Numéro de rue:</label>
			<input type="text" name="numerop" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class='erreur'>Adresse invalide</span>";}?><br><br>
			<label>Rue:</label>
			<input type="text" name="rue" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class='erreur'>Adresse invalide</span>";}?><br><br>
			<label>Complément:</label>
			<input type="text" name="complement" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class='erreur'>Adresse invalide</span>";}?><br><br>
			<label>Code Postal:</label>
			<input type="text" name="codepostal" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="cp") {echo "<br><span class='erreur'>Code Postal invalide</span>";}?><br><br>
			<label>Ville:</label>
			<input type="text" name="ville" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="vil") {echo "<br><span class='erreur'>Ville invalide</span>";}?><br><br>
			<label>Pays:</label>
			<input type="text" name="pays" required/><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="adr") {echo "<br><span class='erreur'>Adresse invalide</span>";}?><br><br>
			<input type="checkbox" name="CGU" />J'accepte les <a href="CGU.php">CGU</a><?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="CGU") {echo "<br><span class='erreur'>Veuillez accepter les CGU</span>";}?><br><br>
			<input type="checkbox" name="Newsletter" />Je m'inscris à la Newsletter<br><br>
			<input class="bouton" type="submit" name="submit" value="Continuer" /><br><br>
			<?php if (isset($_GET["enregistrement"]) AND $_GET["enregistrement"]=="vide") {echo "<br><span class='erreur'>Veuillez remplir tous les champs</span>";}?>
		</form>


<?php include("footer.php")?>
