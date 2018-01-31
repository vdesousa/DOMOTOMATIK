<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device_width">
		<link rel="stylesheet" href="style_ajout_capteur.css">
    <link rel="stylesheet" href="footer.css">
    <title>Modifier une pièce</title>
  </head>

  <?php include("header_perso.php")?>
  <body>
    <section>
        <h2>Supprimer une pièce</h2>
        <?php include("controleur_suppr_piece.php") ?>
        <div class="validation">
            <input type="submit" value="Valider">
        </div>
      </form>
    </section>
    <div class="remplir"></div>
  </body>
  <?php include("footer.php")?>

</html>
