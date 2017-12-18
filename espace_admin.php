<?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=BDD_5e;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$requete = $bdd->query('SELECT * FROM (capteur INNER JOIN pannes ON capteur.id_capteur = pannes.id_panne) INNER JOIN personne ON capteur.id_utilisateur= personne.id_personne');
$donnees = $requete->fetch();

$dateadhesion1 = $bdd->query('SELECT date_adhesion FROM utilisateur WHERE id_utilisateur=1');
$adhesion1 = $dateadhesion1->fetch();

$dateadhesion2 = $bdd->query('SELECT date_adhesion FROM utilisateur WHERE id_utilisateur=2');
$adhesion2 = $dateadhesion2->fetch();

$dateadhesion3 = $bdd->query('SELECT date_adhesion FROM utilisateur WHERE id_utilisateur=3');
$adhesion3 = $dateadhesion3->fetch();

$dateadhesion4 = $bdd->query('SELECT date_adhesion FROM utilisateur WHERE id_utilisateur=4');
$adhesion4 = $dateadhesion4->fetch();

$dateadhesion5 = $bdd->query('SELECT date_adhesion FROM utilisateur WHERE id_utilisateur=5');
$adhesion5 = $dateadhesion5->fetch();

$dateadhesion6 = $bdd->query('SELECT date_adhesion FROM utilisateur WHERE id_utilisateur=6');
$adhesion6 = $dateadhesion6->fetch();

$requete2 = $bdd->query('SELECT * FROM personne WHERE prenom=\'Cédric\'');
$donnees2 = $requete2->fetch();

$requete3 = $bdd->query('SELECT * FROM personne WHERE prenom=\'Lucas\'');
$donnees3 = $requete3->fetch();

$requete4 = $bdd->query('SELECT * FROM personne WHERE prenom=\'Virgilio\'');
$donnees4 = $requete4->fetch();

$requete5 = $bdd->query('SELECT * FROM personne WHERE prenom=\'Merlin\'');
$donnees5 = $requete5->fetch();

$requete6 = $bdd->query('SELECT * FROM personne WHERE prenom=\'Xiangyu\'');
$donnees6 = $requete6->fetch();

?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device_width">
    <link rel="stylesheet" type="text/css" href="espace_administrateur.css">
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
      <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
      <img src="Photo_de_profil.png">
        <a class="mon_profil" href="Mon_profil.php">Mon Profil</a>
        <div class="Acces_Rapide">
          <p>Accés Rapide</p>
          <a href="Accés_Rapide1">Accés Rapide 1</a>
          <a href="Accés_Rapide2">Accés Rapide 2</a>
          <a href="Accés_Rapide3">Accés Rapide 3</a>
          <a href="Accés_Rapide4">Accés Rapide 4</a>
          <a href="Accés_Rapide5">Accés Rapide 5</a>
        </div>
      </div>
      <script>
          function openSlideMenu(){document.getElementById('side-menu').style.width = '250px';}
     

        function closeSlideMenu(){document.getElementById('side-menu').style.width = '0';}

    </script>
    <div class="content">

    <section>
    <h1>Bienvenue sur l'espace administrateur</h1>
    <table>
   <caption><strong>Bilan général</strong></caption>

   <tr>
       <th>Prénom du client</th>
       <th>Nom du client</th>
       <th>Numéro de téléphone</th>
       <th>Adresse postale</th>
       <th>Date d'adhésion</th>
       <th>Historique des pannes</th>
   </tr>
   <tr>
       <td><?php echo $donnees['prenom']; ?></td>
       <td><?php echo $donnees['nom']; ?></td>
       <td><?php echo $donnees['telephone']; ?></td>
       <td><?php echo $donnees['adresse_postale']; ?></td>       
       <td><?php echo $adhesion1['date_adhesion']; ?></td>
       <td><a href="controleur_panne.php">Consultez l'historique des pannes</a></td>
   </tr>

   <tr>
       <td><?php echo $donnees2['prenom']; ?></td>
       <td><?php echo $donnees2['nom']; ?></td>
       <td><?php echo $donnees2['telephone']; ?></td>
       <td><?php echo $donnees2['adresse_postale']; ?></td>   
       <td><?php echo $adhesion2['date_adhesion']; ?></td>
       <td><a href="controleur_panne.php?">Consultez l'historique des pannes</a></td>
   </tr>

    <tr>
       <td><?php echo $donnees3['prenom']; ?></td>
       <td><?php echo $donnees3['nom']; ?></td>
       <td><?php echo $donnees3['telephone']; ?></td>
       <td><?php echo $donnees3['adresse_postale']; ?></td>   
       <td><?php echo $adhesion3['date_adhesion']; ?></td>
       <td><a href="controleur_panne.php">Consultez l'historique des pannes</a></td>
   </tr>

    <tr>
       <td><?php echo $donnees4['prenom']; ?></td>
       <td><?php echo $donnees4['nom']; ?></td>
       <td><?php echo $donnees4['telephone']; ?></td>
       <td><?php echo $donnees4['adresse_postale']; ?></td>   
       <td><?php echo $adhesion4['date_adhesion']; ?></td>
       <td><a href="controleur_panne.php">Consultez l'historique des pannes</a></td>
   </tr>

    <tr>
       <td><?php echo $donnees5['prenom']; ?></td>
       <td><?php echo $donnees5['nom']; ?></td>
       <td><?php echo $donnees5['telephone']; ?></td>
       <td><?php echo $donnees5['adresse_postale']; ?></td>   
       <td><?php echo $adhesion5['date_adhesion']; ?></td>
       <td><a href="controleur_panne.php">Consultez l'historique des pannes</a></td>
   </tr>

    <tr>
       <td><?php echo $donnees6['prenom']; ?></td>
       <td><?php echo $donnees6['nom']; ?></td>
       <td><?php echo $donnees6['telephone']; ?></td>
       <td><?php echo $donnees6['adresse_postale']; ?></td>   
       <td><?php echo $adhesion6['date_adhesion']; ?></td>
       <td><a href="controleur_panne.php">Consultez l'historique des pannes</a></td>
   </tr>

    </table>


<div id="documents_juridiques">
<table>
    <caption><strong>Éditer les documents juridiques</strong></caption>
    
   <tr>
       <th>Mentions légales</th>
      <td><form><input type="submit" name="bouton" value="Modifier"></form></td>
   </tr>
   <tr>
      <th>CGU</th>
      <td><form><input type="submit" name="bouton" value="Modifier"></form></td>
   </tr>
   <tr>
       <th>FAQ</th>
       <td><form><input type="submit" name="bouton" value="Modifier"></form></td>
   </tr>
   <tr>
     <th>Copyright</th>
     <td><form><input type="submit" name="bouton" value="Modifier"></form></td>
   </tr>
</table>
</div>


    </section>
</div>

    <footer>
             <ul>
                <li><a href="mentions_legales.html">Mentions légales</a></li>
                <li><a href="cgu.html">CGU</a></li>
                <li><a href="copyright.html">Copyright</a></li>
            </ul>
      </footer>
  </body>
</html>



</body>
</html>