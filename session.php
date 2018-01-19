<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

$_SESSION['prenom'] = 'Jean';
$_SESSION['id_personne'] = 1;
$_SESSION['id_maison'] = 27;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Connexion</title>
    </head>
    <body>
        <p> Bonjour <?php echo $_SESSION['prenom'] ?>. Cliquez <a href="tableaudebord.php">ici</a>.</p>
    </body>
</html>