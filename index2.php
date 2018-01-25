<?php
session_start();

if (isset($_POST['submit'])) {
    include("dbh.php");
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
    $numerop = $_POST['numerop'];
    $rue = $_POST['rue'];
    $complement = $_POST['complement'];
    $codepostal = $_POST['codepostal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];

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
                        $req2 = $bdd->prepare("INSERT INTO utilisateur(id_personne, newsletter, date_adhesion, numero, rue, complement, code_postal, ville, pays) VALUES(:id_personne, :newsletter, :date_adhesion, :numero, :rue, :complement, :codepostal, :ville, :pays)");
                        $req2->execute(array(
                          'id_personne' => $id_personne,
                          'newsletter' => $newsletter,
                          'date_adhesion' => $date,
                          'numero' => $numerop,
                          'rue' => $rue,
                          'complement' => $complement,
                          'codepostal' => $codepostal,
                          'ville' => $ville,
                          'pays' => $pays,
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
