<?php include('header_admin.php')?>
<form method="post" action="controleur_ajout_capteurs_catalogue.php">
  <label>Nom:
  <input type="text" name="nom" /></label><br>
  <label>Indiquez le type de capteur : </label>
      <select name="type" size="1">
          <option>--- Sélectionner un capteur ---</option>
          <option>CeMAC</option>
          <option>Température</option>
          <option>Humidité</option>
          <option>Présence</option>
          <option>Luminosité</option>
          <option>Fenêtre</option>
          <option>Détecteur de gaz</option>
          <option>Volets</option>
          <option>Caméra</option>
          <option>Alarme</option>
          <option>Porte</option>
      </select>
      <br>
  <label>Prix:
  <input type="text" name="prix" /></label><br>
  <label>Description:
  <input type="text" name="description" /></label><br>
  <input type="submit" name="submit" value="Continuer" />
</form>
<?php include('footer.php')?>
