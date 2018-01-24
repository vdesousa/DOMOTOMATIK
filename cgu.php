<?php
require('modele_documents_juridiques.php');
include('header_admin.php');
include('footer.php');


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CGU</title>
	<link rel="stylesheet" type="text/css" href="styletdb.css">
</head>
<body>
	<section>
<style>
section
{
	width: 100%;
	position: absolute;
	bottom: 10%;
}

textarea
{
	display: inline-block;
	margin-left: 65px;
	width: 90%;
	height: 500px;
}
input[type="submit"]
{
	position: absolute;
	left: 60px;
}
</style>
	<h1>Conditions Générales d'Utilisation</h1>
	<form action="cgu.php" method="post">
		<textarea name="cgu">
<?php $showCGU=$pdo->query('SELECT contenu FROM documents_juridiques WHERE nom=\'CGU\'');
			$insertCGU=$showCGU->fetch();
			echo $insertCGU['contenu'] ;
?>
</textarea></br>
		<input type="submit" name="register" value="Enregistrer"/>
	</form>
	</section>
</body>
</html>
