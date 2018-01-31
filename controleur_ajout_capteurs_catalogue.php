<?php
if (isset($_POST['submit'])){
  include('dbh.php');}
  $nom=$_POST['nom'];
  $description=$_POST['description'];
  $type=$_POST['type'];
  $prix=$_POST['prix'];
  if ($type=="Température"){
    $photo="temperature";
  } elseif ($type=="Luminosité"){
      $photo="luminosite";
    } elseif ($type=="Humidité"){
        $photo="humidite";
      } elseif ($type=="Présence"){
          $photo="presence";
        } elseif ($type=="Fenêtre"){
            $photo="fenetre";
          } elseif ($type=="Détecteur de gaz") {
              $photo="detecteur";
            } elseif ($type=="Volets") {
                $photo="volets";
              } elseif ($type=="Caméra"){
                  $photo="camera";
                } elseif ($type=="Alarme"){
                    $photo="alarme";
                  } elseif ($type=="Porte"){
                      $photo="porte";
                    } elseif ($type=="CeMAC"){
                        $photo="Cemac";
                      }
              ;
echo $nom;
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


?>
