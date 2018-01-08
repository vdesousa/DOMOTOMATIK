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


$requete2 = $bdd->query('SELECT * FROM personne,utilisateur');
$donnees2 = $requete2->fetchAll();


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
      <?php echo 'coucou'; ?>
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

  <?php

   foreach ($donnees2 as $donnee):
     {
  ?>
       <tr>
           <td><?php echo $donnee['prenom']; ?></td>
           <td><?php echo $donnee['nom']; ?></td>
           <td><?php echo $donnee['telephone']; ?></td>
           <td><?php echo $donnee['adresse_postale']; ?></td>
           <td><?php echo $donnee['date_adhesion']; ?></td>
           <td><a href="controleur_panne.php?id=<?php echo $donnee['id']; ?>">Consultez historique des pannes</a></td>
       </tr>
  <?php
     }
  ?>

   <?php endforeach; ?>


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
