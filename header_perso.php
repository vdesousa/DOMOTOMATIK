<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<link rel="stylesheet" href="header_perso.css">
	</head>
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
						<img src="Photo_de_profil.png" alt="photo">
            <a class="mon_profil" href="espace_client.php"><?php include("controleur_nom_prenom.php")?></a>
        </div>
        <div class="acces_rapide">
            <p>Accès Rapide</p>
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
</html>
