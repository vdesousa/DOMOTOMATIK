<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<link rel="stylesheet" type="text/css" href="stylepiece.css">
	</head>
	<body>
		<header>
			<span class="open-slide">
     			<a href="#" onclick="openSlideMenu()">
        		<svg width="30" height="30">
            		<path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
            		<path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
            		<path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        		</svg>
      			</a>
    		</span>
			<div class="container">
				<div id="logo">
					<a href="accueil.php">
						<img src="LOGO.jpg" title="Accueil" alt="accueil">
					</a>
				</div>
				<div id="recherchedeco">
					<a href="boutique.php">Se déconnecter</a>
					<form>
						<input type="text" name="barre_recherche" placeholder="Rechercher..." />
					</form>
				</div>
			</div>
		</header>
		<div id="side-menu" class="side-nav">
            <div class="acces_profil">
                <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
                <img src="Photo_de_profil.png">
                <a class="mon_profil" href="#">Prénom NOM</a>
            </div>
            <div class="acces_rapide">
                <p>Accés Rapide</p>
                <a href="#">Séjour</a>
                <a href="#">Cuisine</a>
                <a href="#">Chambre 1</a>
                <a href="#">Chambre 2</a>
                <a href="#">Salon</a>
            </div>
        </div>
  		<script>
  		    function openSlideMenu(){document.getElementById('side-menu').style.width = '250px';}
     

    		function closeSlideMenu(){document.getElementById('side-menu').style.width = '0';}

 		</script>
 		<div class="content">
<div id="corps">
            <h1>Séjour</h1>
            <div class="ligne1">
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
            <div class="ligne2">
            <div class="capteur">
                <div class="nom_capteur">
                    <p>Présence aux fenêtres</p>            
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
            <div class="ajout">
                <form>
                    <input type="submit" class="ajout_piece"
                     value="Ajouter un capteur">
                </form>    
            </div>
            </div>
        </div>
  <?php include("footer.php")?>