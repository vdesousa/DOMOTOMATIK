<?php
function conversion($var, $var2){

  if ($var2==="Température") {
    $var3=$var." °C";
    return $var3;
  }
  if ($var2==="Humidité") {
    $var3=$var." %";
    return $var3;
  }
  if ($var2==="Présence") {
    if ($var==0) {
      $var3="Non";
    } else {
      $var3="Oui";
    }
    return $var3;
  }
  if ($var2==="Luminosité") {
    if ($var==0) {
      $var3="Nulle";
    }
    elseif ($var==1) {
      $var3="Faible";
    }
    elseif ($var==2) {
      $var3="Moyenne";
    }
    elseif ($var==3) {
      $var3="Forte";
    }
    return $var3;
  }
  if ($var2==="Fenêtre") {
    if ($var==0) {
      $var3="Fermée";
    }
    elseif ($var==1) {
      $var3="Ouverte";
    }
    return $var3;
  }
  if ($var2==="Volets") {
    if ($var==0) {
      $var3="Non programmés";
    }
    elseif ($var==1) {
      $var3="Programmés";
    }
    return $var3;
  }
  if ($var2==="Porte") {
    if ($var==0) {
      $var3="Fermée";
    }
    elseif ($var==1) {
      $var3="Ouverte";
    }
    return $var3;
  }
  if ($var2==="Alarme") {
    if ($var==0) {
      $var3="Désactivée";
    }
    elseif ($var==1) {
      $var3="Activée";
    }
    return $var3;
  }
  if ($var2==="Caméra") {
    if ($var==0) {
      $var3="Désactivée";
    }
    elseif ($var==1) {
      $var3="Activée";
    }
    return $var3;
  }
  if ($var2==="Détecteur de gaz") {
    if ($var==0) {
      $var3="OK";
    }
    elseif ($var==1) {
      $var3="DANGER";
    }
    return $var3;
  }

}
?>
