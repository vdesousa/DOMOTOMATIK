<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<link rel="stylesheet" type="text/css" href="stylecapteur.css">
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
                <a href="piece.php">Séjour</a>
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
 		    <section>
        <h1>Séjour - Température</h1>
        
        <article>
            <div>
                <div class="saut_de_ligne">  </div>
                <h2>Température actuelle </h2>

                <div class="saut_de_ligne">  </div>
                <h2>État </h2>
                <div class="flex_valider">  
                    <form>
                        <p>
                        Indiquez l'état que vous souhaitez :
                            <input type="radio" name="etat" value="on" id="on"> <label for="on">On</label>
                            <input type="radio" name="etat" value="off" id="off"> <label for="off">Off</label>
                        </p>
                    </form>
                    <input type="submit" value="Valider" class="validerl" />
                </div>
        
                <div class="saut_de_ligne">  </div>
                <h2>Température voulue </h2>
                <div class="flex_valider">
                    <form>
                      <p>
                        <label for="voulue">Température que vous souhaitez :</label>
                        <select name="voulue" id="voulue">
                        	<option value="quinze">15°</option>
                        	<option value="seize">16°</option>
                        	<option value="dix-sept">17°</option>
                        	<option value="dix-huit">18°</option>
                        	<option value="dix-neuf">19°</option>
                        	<option value="vingt">20°</option>
                        	<option value="vingt-et-un" selected>21°</option>
                        	<option value="vingt-deux">22°</option>
                        	<option value="vingt-trois">23°</option>
                        	<option value="vingt-quatre">24°</option>
                        	<option value="vingt-cinq">25°</option>
                        </select>
                      </p>
                    </form>
                    <input type="submit" value="Valider" class="validerh" />
                </div>

                <div class="saut_de_ligne">  </div>
                <h2>Plage horaire </h2>
                <div class="flex_valider">
        	        <p>Choisissez sur quelle plage horaire:</p>
                	<div class="debut">
                	<form>
                  	     <p>
                        	<label for="debut">Début:</label>
                        	<select name="horaire" id="horaire"> 
                        		<optgroup label="Matin">
                        			<option value="6h">6h</option>
                        			<option value="7h">7h</option>
                        			<option value="8h">8h</option>
                        			<option value="9h">9h</option>
                        			<option value="10h">10h</option>
                        			<option value="11h">11h</option>
                        			<option value="12h">12h</option>
                        		</optgroup>
                        		<optgroup label="Après-midi">
                        			<option value="13h">13h</option>
                        			<option value="14h">14h</option>
                        			<option value="15h">15h</option>
                        			<option value="16h">16h</option>
                        			<option value="16h">17h</option>
                        			<option value="16h">18h</option>
                        		</optgroup>
                        		<optgroup label="Soir">
                        			<option value="19h">19h</option>
                        			<option value="20h">20h</option>
                        			<option value="21h">21h</option>
                        			<option value="22h">22h</option>
                        			<option value="23h">23h</option>
                        			<option value="00h" selected>00h</option>
                        		</optgroup>
                        		<optgroup label="Nuit">
                        			<option value="01h">01h</option>
                        			<option value="02h">02h</option>
                        			<option value="03h">03h</option>
                        			<option value="04h">04h</option>
                        			<option value="05h">05h</option>           	
                        		</optgroup>
                        	</select>
                      	</p>
                    </form>
        	        </div>
                	<div class="fin">
                	<form>
                	    <p>
                        	<label for="fin">Fin:</label>
                        	<select name="horaire" id="horaire"> 
                        		<optgroup label="Matin">
                        			<option value="6h">6h</option>
                        			<option value="7h">7h</option>
                        			<option value="8h">8h</option>
                        			<option value="9h">9h</option>
                        			<option value="10h">10h</option>
                        			<option value="11h">11h</option>
                        			<option value="12h">12h</option>
                        		</optgroup>
                        		<optgroup label="Après-midi">
                        			<option value="13h">13h</option>
                        			<option value="14h">14h</option>
                        			<option value="15h">15h</option>
                        			<option value="16h">16h</option>
                        			<option value="16h">17h</option>
                        			<option value="16h">18h</option>
                        		</optgroup>
                        		<optgroup label="Soir">
                        			<option value="19h">19h</option>
                        			<option value="20h">20h</option>
                        			<option value="21h">21h</option>
                        			<option value="22h">22h</option>
                        			<option value="23h" selected>23h</option>
                        			<option value="00h">00h</option>
                        		</optgroup>
                        		<optgroup label="Nuit">
                        			<option value="01h">01h</option>
                        			<option value="02h">02h</option>
                        			<option value="03h">03h</option>
                        			<option value="04h">04h</option>
                        			<option value="05h">05h</option>           	
                        		</optgroup>
                        	</select>
                      	</p>
                    </form>
                    <input type="submit" value="Valider" class="validerh" />
                    </div>
      	        </div>

            </div>
        </article>
    </section>
    <?php include("footer.php")?>