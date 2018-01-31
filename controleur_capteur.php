<?php
  session_start();

  if (isset($_POST['nom_capteur']) AND isset($_POST['id_capteur'])) {
    $_SESSION['choix_piece']=$_POST['choix_piece'];
    $_SESSION['nom_capteur']=$_POST['nom_capteur'];
    $_SESSION['id_capteur']=$_POST['id_capteur'];
  }

  $nomcapteur=$_SESSION['nom_capteur'];
  $idcapteur=$_SESSION['id_capteur'];

  include("modele_capteur.php");

  function egalite($x,$y){

    if (intval($y)===0) {
      $z='Nulle';
    } elseif (intval($y)===1) {
      $z='Faible';
    } elseif (intval($y)===2) {
      $z='Moyenne';
    } elseif (intval($y)===3) {
      $z='Forte';
    }

    if ($x===$z) {
      return true;
    } else{
      return false;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylecapteur.css">
  </head>
  <div class="titre">
    <h1><?php echo $_SESSION['choix_piece']; ?></h1>
    <h4><?php echo $_SESSION['nom_capteur']; ?></h4>
  </div>
  <h2>État actuel</h2>
  <div class="etat">
    <form method="post" action="modele_capteur.php">
      <input type="hidden" name="set_etat" value="true">
      <p>Configuration souhaitée :
        <?php if ($etat==1) { ?>
          <input type="radio" name="etat" value="allume" checked><label>Allumé</label>
          <input type="radio" name="etat" value="eteint"><label>Éteint</label>
          <input type="submit" value="Valider">
        <?php } else { ?>
          <input type="radio" name="etat" value="allume"><label>Allumé</label>
          <input type="radio" name="etat" value="eteint" checked><label>Éteint</label>
          <input type="submit" value="Valider">
        <?php } ?>
      </p>
    </form>

<?php if($nomcapteur==="Température" || $nomcapteur==="Volets" ||
$nomcapteur==="Alarme" || $nomcapteur==="Caméra" || $nomcapteur==="Luminosité"){ ?>

    <form method="post" action="modele_capteur.php">
      <input type="hidden" name="set_val" value="true">
      <?php if($nomcapteur==="Température" || $nomcapteur==="Luminosité"){ ?>
        <p>Choisissez la valeur souhaitée :
          <select name="valeur_immediate">
            <?php if($nomcapteur==="Température"){
                    for ($i=12; $i < 31; $i++) {
                      if ($i===intval($valeur_act)) { ?>
                        <option selected><?php echo $i ?></option>
              <?php   } else { ?>
                        <option><?php echo $i ?></option>
              <?php   }
                    } ?>
          </select> °C
            <?php } else {
                    $etats_lum=['Nulle', 'Faible', 'Moyenne', 'Forte'];
                    for ($j=0; $j<4; $j++){
                      if(egalite($etats_lum[$j],$valeur_act)){
                    ?>
                        <option selected><?php echo $etats_lum[$j]; ?></option>
                <?php } else { ?>
                        <option><?php echo $etats_lum[$j]; ?></option>
            <?php     }
                    } ?>
          </select>
          <?php    }
          } else { ?>
        <p>Choisissez l'état souhaité :
          <select name="etat_immediat">
            <?php if($nomcapteur==="Volets"){
                    if (intval($valeur_act)===0) { ?>
                      <option selected>Fermés</option>
                      <option>Ouverts</option>
              <?php } else { ?>
                      <option>Fermés</option>
                      <option selected>Ouverts</option>
              <?php } ?>
          </select>
            <?php } else {
                    if (intval($valeur_act)===0) { ?>
                      <option selected>Désactivée</option>
                      <option>Activée</option>
              <?php } else { ?>
                      <option>Désactivée</option>
                      <option selected>Activée</option>
              <?php } ?>
          </select>
          <p class="disclaimer"><em><span>Attention:</span> ne choisissez pas "éteint" si vous souhaitez désactiver </br>
            momentanément votre objet connecté, définissez simplement son état </br>
            sur "désactivé".</em></p>
            <?php } ?>
    <?php } ?>
          <input type="submit" value="Valider">
        </p>
    </form>
  </div>
  <div class="parametrage">
    <h2>Paramétrage</h2>
      <form method="post" action="modele_capteur.php">
        <input type="hidden" name="prog_val" value="true">
        <div class="valeur">
          <?php if($nomcapteur==="Température" || $nomcapteur==="Luminosité"){ ?>
            <p>Valeur souhaitée :
              <select name="valeur_souhaitee">
                <?php if($nomcapteur==="Température"){
                        for ($i=12; $i < 31; $i++) {
                          if ($i===intval($valeur_act)) { ?>
                            <option selected><?php echo $i ?></option>
                  <?php   } else { ?>
                            <option><?php echo $i ?></option>
                  <?php   }
                        } ?>
              </select> °C
                <?php } else {
                        $etats_lum=['Nulle', 'Faible', 'Moyenne', 'Forte'];
                        for ($j=0; $j<4; $j++){
                          if(egalite($etats_lum[$j],$valeur_act)){
                        ?>
                            <option selected><?php echo $etats_lum[$j]; ?></option>
                    <?php } else { ?>
                            <option><?php echo $etats_lum[$j]; ?></option>
                <?php     }
                        } ?>
              </select>
                <?php }
              } else { ?>
            <p>État souhaité :
              <select name="etat_souhaite">
                <?php if($nomcapteur==="Volets"){
                        if (intval($valeur_act)===0) { ?>
                          <option selected>Fermés</option>
                          <option>Ouverts</option>
                  <?php } else { ?>
                          <option>Fermés</option>
                          <option selected>Ouverts</option>
                  <?php } ?>
              </select>
                <?php } else {
                        if (intval($valeur_act)===0) { ?>
                          <option selected>Désactivée</option>
                          <option>Activée</option>
                  <?php } else { ?>
                          <option>Désactivée</option>
                          <option selected>Activée</option>
                  <?php } ?>
              </select>
                <?php } ?>
        <?php } ?>
            </p>
        </div>
      </form>
    <div class="horaire">
      <p>Choisissez sur quelle plage horaire:</p>
      <form method="post" action="modele_capteur.php">
        <input type="hidden" name="prog_heure" value="true">
        <div class="bloc_prog">
          <div class="bloc_valeur">
            <p>
              De :
              <input type="text" size="2" maxlength="2" name="heure_debut" id="TB1" tabindex="1" onkeyup="Autotab(2, this.size, this.value)">
              h <input type="text" size="2" maxlength="2" name="minutes_debut" id="TB2" tabindex="2" onkeyup="Autotab(3, this.size, this.value)">
            </p>
            <p>
              À :
              <input type="text" size="2" maxlength="2" name="heure_fin" id="TB3" tabindex="3" onkeyup="Autotab(4, this.size, this.value)">
              h <input type="text" size="2" maxlength="2" name="minutes_fin" id="TB4" tabindex="4">
            </p>
          </div>
          <div class="bloc_valider">
            <input type="submit" value="Valider">
          </div>
        </div>
      </form>
    </div>
  </div>

<?php } else{ ?>
  </div>
<?php } ?>

</html>
