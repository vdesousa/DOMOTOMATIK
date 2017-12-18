<!DOCTYPE html>
<?php
	session_start();

	$email = "email";
	$password ="password";

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { header("Location: Accueil.php");}
	if (isset($_POST['email']) && isset($_POST['password'])) 
	{ if ($_POST['email'] == $email && $_POST['password'] == $password)
        {
	       $_SESSION['logged_in'] = true;
	       header("Location: Accueil.php")
        }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Domotomatik</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS">
</head>
<body>
	<div class="barre_decon"></div>
	<div class="barre_decob"></div>
	<div class="barre_decoj"></div>
	<img class="logo" title="Accueil" src="logo.jpg" alt="logo" height="20%" width="10%">
	<div class="connexion">
		<form method="post" action="index.php">
			E-mail:
			<input type="text" name="email" /><br>
			Mot de Passe:
			<input type="password" name="password" /><br>
			<input type="submit" value="Se Connecter" />
		</form>
	</div>
</body>
</html>