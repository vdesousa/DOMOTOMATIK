<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device_width">
		<link rel="stylesheet" href="style_ajout_domicile.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="header_perso.css">
    <title>Ajouter un domicile</title>
  </head>
  <?php include("header_perso.php")?>
    <section>
        <h2>Ajouter un domicile</h2>
      <form method="post" action="controleur_ajout_domicile.php">
        <div class="corps">
          <div class="labels">
            <label for="numero">Numéro :</label>
            <label for="rue">Rue :</label>
            <label for="complement">Complément :</label>
            <label for="ville">Ville :</label>
            <label for="code_postal">Code postal :</label>
            <label for="pays">Pays :</label>
          </div>
          <div class="donnees">
            <input type="text" name="id_personne" id="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur']?>" hidden/>
            <input type="text" name="numero" id="numero" required/>
            <input type="text" name="rue" id="rue" required/>
            <input type="text" name="complement" id="complement"/>
            <input type="text" name="ville" id="ville" required/>
            <input type="text" name="code_postal" id="code_postal" required/>
            <input type="text" name="pays" id="pays" required/>
          </div>
        </div>
        <input type="submit" value="Valider" class="validation">
      </form>

    </section>
  <?php include("footer.php")?>
