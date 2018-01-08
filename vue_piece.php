<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
        <link rel="stylesheet" href="style_piece.css">
        <title>Mon domicile</title>
	</head>
    
    <?php include("header_perso.php")?>
    <body>
        <div id="corps">
            <h1><?php echo $_POST['choix_piece'] ?></h1>
            <div class="tampon"></div>
            <!--<div class="ligne">
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Température</p>        
                    </div>
                    <div class="valeur">
                        <p>25°C</p>        
                    </div>
                    <a href="capteurt.php"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Luminosité</p>            
                    </div>
                    <div class="valeur">
                        <p>40 %</p>        
                    </div>
                    <a href="capteurl.php"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Présence</p>            
                    </div>
                    <div class="valeur">
                        <p>Non</p>        
                    </div>
                    <a href="#"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
            </div>
            <div class="ligne">
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Température</p>        
                    </div>
                    <div class="valeur">
                        <p>25°C</p>        
                    </div>
                    <a href="capteurt.php"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Luminosité</p>            
                    </div>
                    <div class="valeur">
                        <p>40 %</p>        
                    </div>
                    <a href="capteurl.php"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Présence</p>            
                    </div>
                    <div class="valeur">
                        <p>Non</p>        
                    </div>
                    <a href="#"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
            </div>
            <div class="ligne">
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>azerty</p>
                    </div>
                    <div class="valeur">
                        <p>Non</p>        
                    </div>
                    <a href="#"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Humidité</p>            
                    </div>
                    <div class="valeur">
                        <p>60 %</p>        
                    </div>
                    <a href="#"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
                <div class="capteur">
                    <div class="nom_capteur">
                        <p>Humidité</p>            
                    </div>
                    <div class="valeur">
                        <p>60 %</p>        
                    </div>
                    <a href="#"><img src="reglage.png" alt="reglage" id="reglage"></a>
                </div>
            </div>-->
            <?php include("controleur_piece.php") ?>
            <div class="redirections">
                <div class="change_piece">
                    <a href="tableaudebord.php">Changer de pièce</a>
                </div>
                <div class="ajout">
                    <a href="test_piece.php">Ajouter un capteur</a>
                </div>
                <div class="add_del_piece">
                    <a href="test_piece.php">Ajouter ou supprimer une pièce</a>
                </div>
            </div>
        </div>
    </body>
    <?php include("footer.php")?>

</html>