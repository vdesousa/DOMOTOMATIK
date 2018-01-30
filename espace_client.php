<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<title>Espace client</title>
		<link rel="stylesheet" type="text/css" href="style_espace_client.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="header_perso.css">
  </head>
<?php include("header_perso.php") ?>
<?php include("controleur_profil_infos.php");?>
<section>
     <div class="donnees">
             <h2><center>Modifier les informations personnelles</center></h2></br>
             <div class="informations">
                      <form method="post" action="controleur_modif_client.php">
                        <div class="formulaire">
                          <div class="labels">
                            <label for="nom">Nom : </label>
                            <label for="prenom">Prénom : </label>
                            <label for="numero">Numéro : </label>
                            <label for="rue">Rue : </label>
                            <label for="complement">Complément : </label>
                            <label for="ville">Ville : </label>
                            <label for="cp">Code postal : </label>
                            <label for="pays">Pays : </label>
                            <label for="telephone">Numéro de téléphone : </label>
                            <label for="email">Email : </label>
                          </div>
                          <div class="infos">
                            <input type="text" name="nom" id="nom" value="<?php echo $nom ?>" required/>
                            <input type="text" name="prenom" id="prenom" value="<?php echo $prenom ?>" required/>
                            <input type="text" name="numero" id="numero" value="<?php echo $numero ?>" required/>
                            <input type="text" name="rue" id="rue" value="<?php echo $rue ?>" required/>
                            <input type="text" name="complement" id="complement" value="<?php echo $complement ?>"/>
                            <input type="text" name="ville" id="ville" value="<?php echo $ville ?>" required/>
                            <input type="text" name="cp" id="cp" value="<?php echo $code_postal ?>" required/>
                            <input type="text" name="pays" id="pays" value="<?php echo $pays ?>" required/>
                            <input type="tel" name="telephone" id="telephone" value="<?php echo $telephone ?>" required/>
                            <input type="text" name="email" id="email" value="<?php echo $email ?>" required/>
                          </div>
                        </div>
                        <input type="submit" value="Confirmer les modifications" id="modif2">
                      </form>
              </div>
    </div>
            <?php include("controleur_modif_ok.php")?>
</section>

<?php include("footer.php") ?>
