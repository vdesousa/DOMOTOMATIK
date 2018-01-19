<?php
session_start();

if (isset($_POST['submit'])) {
    try{
      $bdd = new PDO('mysql:host=localhost;dbname=bdd_5e;charset=utf8', 'root', 'root');
    }
    catch (Exception $e){
      die('Erreur : '.$e->getMessage());
    }}
    else {header("Location: Enregistrement2.php");
          exit();
        }

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_SESSION['email'];
    $numero =  $_POST['numero'];
    $password = $_POST['password'];
    $passwordconfirmation = $_POST['passwordconfirmation'];
    if (isset($_POST['Newsletter']))
      {$newsletter = "oui";
    } else {$newsletter = "non";}
    $adresse = $_POST['adresse'];
    $codepostal = $_POST['codepostal'];
    $ville = $_POST['ville'];

    //erreurs
    if(empty($nom) || empty($prenom) ||
    empty($numero) || empty($password)) {
      header("Location: Enregistrement2.php?enregistrement=vide");
      exit();
    } else {
      //caractères valides
              if (!preg_match("/^[a-zA-Z ]*$/", $nom) || !preg_match("/^[a-zA-Z ]*$/", $prenom)) {
                  header("Location: Enregistrement2.php?enregistrement=invalidenoms");
                  exit();
              } else {
                    if (!preg_match("/^[0-9]*$/", $numero)) {
                    header("Location: Enregistrement2.php?enregistrement=invalidetel");
                    exit();
                } else {
                  if (!preg_match("/^[a-zA-Z0-9 ]*$/", $adresse)) {
                    header("Location: Enregistrement2.php?enregistrement=invalideadr");
                    exit();
                  } else {
                    if (!preg_match("/^[0-9]*$/", $codepostal)) {
                      header("Location: Enregistrement2.php?enregistrement=invalidecp");
                      exit();
                    } else {
                      if (!preg_match("/^[a-zA-Z -]*$/", $ville)) {
                        header("Location: Enregistrement2.php?enregistrement=invalidevil");
                        exit();
                      } else {                  }

                      // mot de passe égaux
                      if ($password != $passwordconfirmation) {
                        header("Location: Enregistrement2.php?enregistrement=mdp");
                        exit();
                    } else {
                  if (isset($_POST['CGU'])) {
                    //Hash mdp
                    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
                    //inserer
                        $req = $bdd->prepare("INSERT INTO personne(nom, prenom, email, telephone, mot_de_passe) VALUES(:nom, :prenom, :email, :numero, :password)");
                        $req->execute(array(
                        	'nom' => $nom,
                        	'prenom' => $prenom,
                        	'email' => $email,
                        	'numero' => $numero,
                        	'password' => $hashedpassword,
                        	));
                        $id_personne = $bdd->lastInsertId();
                        $date = date("Y-m-d");
                        $req2 = $bdd->prepare("INSERT INTO utilisateur(id_personne, newsletter, date_adhesion, adresse, codepostal, ville) VALUES(:id_personne, :newsletter, :date_adhesion, :adresse, :codepostal, :ville)");
                        $req2->execute(array(
                          'id_personne' => $id_personne,
                          'newsletter' => $newsletter,
                          'date_adhesion' => $date,
                          'adresse' => $adresse,
                          'codepostal' => $codepostal,
                          'ville' => $ville,
                          ));
                          session_destroy();
                          // if ($req->execute()) {
                          header("Location: Enregistrement2.php?enregistrement=succes");
                          exit();
                        // } else {header("Location: Enregistrement2.php?enregistrement=erreur");
                        // exit();}
                  } else {
                    header("Location: Enregistrement2.php?enregistrement=CGU");
                    exit();
                  }
                }
              }
            }
          }
        }
      }
?>