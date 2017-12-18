<!DOCTYPE html>
<html>
<head>
	<title>Créer mon profil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS">
</head>
<body>
	<div class="barre_decon"></div>
	<div class="barre_decob"></div>
	<div class="barre_decoj"></div>
	<img class="logo" title="Accueil" src="logo.jpg" alt="logo" height="20%" width="10%">
	<div class="titre">
		<span>Créer mon profil</span>
	</div>
	<div class="données1">
		<form method="post" action="index.php">
			Nom:
			<input type="text" name="nom" /><br>
			Prénom:
			<input type="text" name="prenom" /><br>
			Date de Naissance:
			<input type="text" name="naissance" /><br>
			Numéro de téléphone:
			<input type="text" name="numero" /><br>
			Mot de Passe:
			<input type="password" name="password" /><br>
			Confirmer mot de passe:
			<input type="password" name="passwordconfirmation" /><br>
			<input type="checkbox" name="CGU" />J'accepte les <a href="CGU.php">CGU</a><br>
			<input type="checkbox" name="Newsletter" />Je m'inscris à la Newsletter<br>
			<input type="submit" value="Continuer" />
		</form>
	</div>
</body>
</html>