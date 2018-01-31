<?php
if isset($_POST['submit']){
  include('dbh.php');
  $nom=$_POST['photo'];
  $description=$_POST['description'];
  $type=$_POST['type'];
  $prix=$_POST['prix'];
  if ($type=="Température"){
    $photo="temperature";
  } else {
    if ($type=="Luminosité"){
      $photo="luminosite";
    } else {
      if ($type=="Humidité"){
        $photo="humidite";
      } else {
        if ($type=="Présence"){
          $photo="presence";
        } else {
          if ($type=="Fenêtre"){
            $photo="fenetre";
          } else {
            if ($type=="Détecteur de gaz") {
              $photo="detecteur";
            } else {
              if ($type=="Volets") {
                $photo="volets";
              } else {
                if ($type=="Caméra"){
                  $photo="camera";
                } else {
                  if ($type=="Alarme"){
                    $photo="alarme";
                  } else {
                    if ($type=="Porte"){
                      $photo="porte";

                    } else {
                      if ($type=="CeMAC"){
                        $photo="Cemac";
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  };
  $req = $bdd->prepare("INSERT INTO boutique(nom_objet, description, type, prix, photo) VALUES(:nom, :description, :type, :prix, :photo)");
  $req->execute(array(
    'nom' => $nom,
    'description' => $description,
    'type' => $type,
    'prix' => $prix,
    'photo' => $photo,
    ));
    header("Location: gestion_catalogue_admin.php");
    exit();
}

?>
