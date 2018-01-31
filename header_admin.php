<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<link rel="stylesheet" type="text/css" href="admin.css">
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
					<a href="espace_administrateur.php">
						<img src="LOGO.jpg" title="Accueil" alt="accueil">
					</a>
				</div>
				<div id="recherchedeco">
					<p><a href="logout.php" class="btn btn-danger">Se déconnecter</a></p>
					<form>
						<input type="text" name="barre_recherche" placeholder="Rechercher..." />
					</form>
				</div>
			</div>
		</header>
		<div id="side-menu" class="side-nav">
            <div class="acces_profil">
                <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
                <img src="Photo_de_profil.png" style="width: auto , margin-top: 100px;">
                <a class="mon_profil" href="#" style="white-space: nowrap;">Toan DANG NGOC</a>
                <ul style="list-style-type: none;">
                	<li><a href="send_message.php" style="white-space: nowrap;">Envoyer un message</a></li>
                	<li><a href="vue_gestion_catalogue_admin.php" style="white-space: nowrap">Modifier le catalogue</a></li>
									<li><a href="vue_admin_confirmation.php" style="white-space: nowrap;">Confirmation utilisateurs</a></li>
                </ul>
            </div>
        </div>
  		<script>
  		    function openSlideMenu(){document.getElementById('side-menu').style.width = '250px';}


    		function closeSlideMenu(){document.getElementById('side-menu').style.width = '0';}

 		</script>
 		<div class="content">
