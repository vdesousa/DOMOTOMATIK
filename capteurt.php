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
                <p>Accès Rapide</p>
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

				<?php
				// Connexion à la base de données
				try
				{
				    $bdd = new PDO('mysql:host=localhost;dbname=domo;charset=utf8', 'root', 'root');
				}
				catch(Exception $e)
				{
				        die('Erreur : '.$e->getMessage());
				}
				?>

        <article>
            <div>
                <div class="saut_de_ligne">  </div>

								<?php
								// Récupération de la valeur actuelle
								$reponse = $bdd->query('SELECT valeur_temps_reel FROM capteur WHERE id_capteur=1');
								while ($donnees = $reponse->fetch())
								{ ?>

                <h2><div class="titre"> Température actuelle : </div> <div class="information">
									<?php echo ($donnees['valeur_temps_reel']); ?>°C	</div></h2>
							<?php
							}
							$reponse->closeCursor();
							?>

                <div class="saut_de_ligne">  </div>

								<?php
								// Récupération de l'état actuelle
								$reponse = $bdd->query('SELECT etat FROM capteur WHERE id_capteur=1');
								while ($donnees = $reponse->fetch())
								{ ?>

								<h2><div class="titre"> État : </div>
									<div class="information">
									<?php
										if (($donnees['etat']) == 0)
										{
											echo 'Éteint';
										}
										elseif (($donnees['etat']) == 1)
										{
											echo "Allumé";
										}
										?>

									</div>
								</h2>

								<?php
								}
								$reponse->closeCursor();
								?>


								<div class="flex_valider">
                    <form action="capteurt_post.php" method="post">
                        <p>
                        Indiquez l'état que vous souhaitez :
                            <input type="radio" name="etat" value="1" id="on"> <label for="on">On</label>
                            <input type="radio" name="etat" value="0" id="off"> <label for="off">Off</label>
														<input type="submit" value="Valider" class="validerl" />
                        </p>
                    </form>
                </div>


                <div class="saut_de_ligne">  </div>

									<?php
									// Récupération de la valeur souhaitée
									$reponse = $bdd->query('SELECT valeur_souhaitee FROM parametrer WHERE id_capteur=1');
									while ($donnees = $reponse->fetch())
									{
									?>

                <h2><div class="titre">Température voulue : </div> <div class="information"> <?php echo ($donnees['valeur_souhaitee']); ?> °C </div></h2>

									<?php
									}
									$reponse->closeCursor();
									?>

								<div class="flex_valider">

                    <form method="post" action="capteurt_post.php">
                      <p>
                        <label for="voulue">Température que vous souhaitez :</label>
                        <select name="voulue" id="voulue">
                        	<option value=15>15°</option>
                        	<option value=16>16°</option>
                        	<option value=17>17°</option>
                        	<option value=18>18°</option>
                        	<option value=19>19°</option>
                        	<option value=20>20°</option>
                        	<option value=21 selected>21°</option>
                        	<option value=22>22°</option>
                        	<option value=23>23°</option>
                        	<option value=24>24°</option>
                        	<option value=25>25°</option>
                        </select>
											<input type="submit" value="Valider" class="validerh" />
											</p>
                    </form>

                </div>

                <div class="saut_de_ligne">  </div>

								<?php
								// Récupération de la plage horaire souhaitée
								$reponse = $bdd->query('SELECT heure_debut, heure_fin FROM parametrer WHERE id_capteur=1');
								while ($donnees = $reponse->fetch())
								{
								?>

                <h2><div class="titre"> Plage horaire : </div> <div class="information"> <?php echo ($donnees['heure_debut']) . ' à ' . ($donnees['heure_fin']); ?> </div></h2>

								<?php
								}
								$reponse->closeCursor();
								?>

								<div class="flex_valider">
        	        <p>Choisissez sur quelle plage horaire:</p>
                	<div class="debut">
                	<form action="capteurt_post.php" method="post">

                        	<label for="debut">Début:</label>
                        	<select name="horaire_debut" id="horaire">
                        		<optgroup label="Matin">
                        			<option value="06:00:00">6h</option>
															<option value="07:00:00">7h</option>
															<option value="08:00:00">8h</option>
															<option value="09:00:00">9h</option>
															<option value="10:00:00">10h</option>
															<option value="11:00:00">11h</option>
															<option value="12:00:00">12h</option>
                        		</optgroup>
                        		<optgroup label="Après-midi">
                        			<option value="13:00:00">13h</option>
															<option value="14:00:00">14h</option>
															<option value="15:00:00">15h</option>
															<option value="16:00:00">16h</option>
															<option value="17:00:00">17h</option>
															<option value="18:00:00">18h</option>
                        		</optgroup>
                        		<optgroup label="Soir">
															<option value="19:00:00">19h</option>
															<option value="20:00:00">20h</option>
															<option value="21:00:00">21h</option>
															<option value="22:00:00">22h</option>
															<option value="23:00:00">23h</option>
                        			<option value="00:00:00" selected>00h</option>
                        		</optgroup>
                        		<optgroup label="Nuit">
															<option value="01:00:00">1h</option>
															<option value="02:00:00">2h</option>
															<option value="03:00:00">3h</option>
															<option value="04:00:00">4h</option>
															<option value="05:00:00">5h</option>
                        		</optgroup>
													</select>

														<label for="fin">Fin:</label>
	                        	<select name="horaire_fin" id="horaire">
															<optgroup label="Matin">
	                        			<option value="06:00:00">6h</option>
																<option value="07:00:00">7h</option>
																<option value="08:00:00">8h</option>
																<option value="09:00:00">9h</option>
																<option value="10:00:00">10h</option>
																<option value="11:00:00">11h</option>
																<option value="12:00:00">12h</option>
	                        		</optgroup>
	                        		<optgroup label="Après-midi">
	                        			<option value="13:00:00">13h</option>
																<option value="14:00:00">14h</option>
																<option value="15:00:00">15h</option>
																<option value="16:00:00">16h</option>
																<option value="17:00:00">17h</option>
																<option value="18:00:00">18h</option>
	                        		</optgroup>
	                        		<optgroup label="Soir">
																<option value="19:00:00">19h</option>
																<option value="20:00:00">20h</option>
																<option value="21:00:00">21h</option>
																<option value="22:00:00">22h</option>
																<option value="23:00:00" selected>23h</option>
	                        			<option value="00:00:00">00h</option>
	                        		</optgroup>
	                        		<optgroup label="Nuit">
																<option value="01:00:00">1h</option>
																<option value="02:00:00">2h</option>
																<option value="03:00:00">3h</option>
																<option value="04:00:00">4h</option>
																<option value="05:00:00">5h</option>
	                        		</optgroup>
	                        	</select>

												<input type="submit" value="Valider" class="validerh" />

                    </form>
        	        </div>

      	        </div>

								<div class="saut_de_ligne">  </div>
								<div class="saut_de_ligne">  </div>
								<div class="saut_de_ligne">  </div>

							<div class="supprimer_le_capteur">
								<form action="capteurt_post.php" method="post">
									 <input type="submit" value="Supprimer le capteur" class="supprimer_capteur"/>
							</div>
        </article>
    </section>
    <?php include("footer.php")?>
