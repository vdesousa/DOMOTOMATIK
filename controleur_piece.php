<?php
    session_start();
    include("conversion_id_nom_piece.php");

    if (isset($nomdelapiece)){
      $_SESSION['choix_piece']=$nomdelapiece;
    }

    include("modele_piece.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_piece.css">
</head>

<h1><?php echo $_SESSION['choix_piece'] ?></h1>
<div class="tampon"></div>

<?php
    $i=0;
    if($_SESSION['nb_lignes']==0&&$_SESSION['nb_seuls']==0){
?>
        <p class="pas_capteur">Vous n'avez aucun capteur dans cette pièce.</p>
<?php
    }
    while($_SESSION['nb_lignes']!=0){
?>
        <div class="ligne">
    <?php
        $count=0;

        while($count!=3){
    ?>
            <div class="capteur">
                <div class="nom_capteur">
                    <p><?php echo $_SESSION['types'][$i]; ?></p>
                </div>
                <div class="valeur">
                    <p><?php echo $_SESSION['valeurs'][$i]; ?></p>
                </div>
                <a href="capteurt.php"><img src="reglage.png" alt="reglage" id="reglage"></a>
            </div>
        <?php
            $i+=1;
            $count++;
        }
        ?>
        </div>
<?php
        $_SESSION['nb_lignes']-=1;
    }

    if($_SESSION['nb_seuls']!=0){
?>
        <div class="ligne">
<?php
        while($_SESSION['nb_seuls']!=0){
?>
            <div class="capteur">
                <div class="nom_capteur">
                    <p><?php echo $_SESSION['types'][$i]; ?></p>
                </div>
                <div class="valeur">
                    <p><?php echo $_SESSION['valeurs'][$i]; ?></p>
                </div>
                <a href="capteurt.php"><img src="reglage.png" alt="reglage" id="reglage"></a>
            </div>
<?php
            $i+=1;
            $_SESSION['nb_seuls']-=1;
        }
?>
        </div>
<?php
    }
?>

</html>
