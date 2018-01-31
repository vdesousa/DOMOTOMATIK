<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
        <link rel="stylesheet" href="style_piece.css">
				<link rel="stylesheet" href="footer.css">
        <title>Mon domicile</title>
	</head>

    <?php include("header_perso.php")?>

    <body>
        <div id="corps">
            <?php include("controleur_piece.php") ?>
            <div class="redirections">
                <div class="change_piece">
                    <a href="tableaudebord.php">Changer de pièce</a>
                </div>
                <div class="ajout">
                    <a href="vue_ajout_capteur.php">Ajouter un capteur</a>
                </div>
                <div class="add_piece">
                  	<a href="vue_ajout_piece.php">Ajouter une pièce</a>
                </div>
								<div class="del_piece">
										<a href="vue_suppr_piece.php">Supprimer une pièce</a>
								</div>
            </div>
        </div>
    </body>

    <?php include("footer.php")?>

</html>
