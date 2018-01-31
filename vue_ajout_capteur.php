<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<link rel="stylesheet" href="style_ajout_capteur.css">
		<link rel="stylesheet" href="footer.css">
    <title>Ajouter un capteur</title>
	</head>

    <?php include("header_perso.php")?>
    <body>
        <section>
            <h2>Ajouter un capteur</h2>
            <?php include("controleur_ajout_capteur.php") ?>

            <div class="reference_produit">
                <p>Entrez la réference du produit : </p>
                    <input type="text" name="ref">
            </div>

            <div class="validation">
                    <input type="submit" value="Valider">
                </form>
            </div>

        </section>
				<div class="remplir_spe"></div>
    </body>
    <?php include("footer.php")?>
</html>
