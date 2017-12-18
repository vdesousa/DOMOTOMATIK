<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<link rel="stylesheet" type="text/css" href="styleperso.css">
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
 			<form class="donnees">
                    <h2><center>Informations personnelles</center></h2></br>
                    <div class="informations">
                            <div>
                                <figure>
                                    <img class="petite_photo" src="Photo_de_profil.png" alt="Photo de profil"><br/>
                                    <figcaption><a href="Modifier_photo.php">[Modifier]</a></figcaption>
                                </figure>
                            </div>
                            <div class="infos">
                                    <form method="post" action="">
                                            <label for="identifiant">Identifiant : </label><input type="text" name="identifiant" id="identifiant" value="Pseudo" required/><br/>
                                            <label for="pass">Mot de passe : </label><input type="password" name="pass" id="pass" value="*********" required><br/>
                                            <label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="Rousseau" required><br/>
                                            <label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" value="Merlin" required><br/>
                                            <label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" value="111 T avenue de verdun" required><br/>
                                            <label for="ville">Ville : </label><input type="text" name="ville" id="ville" value="Issy les moulineaux" required><br/>
                                            <label for="cp">Code postal : </label><input type="text" name="cp" id="cp" value="92130" required><br/>
                                            <label for="numero">Numéro de téléphone : </label><input type="tel" name="numero" id="numero" value="0629129106" required><br/><br/>
                                            <input type="submit" value="Confirmer les modifications" id="modif">
                                    </form>
                            </div>
                    </div>
            </form>
<?php include("footer")?>
 		
 		