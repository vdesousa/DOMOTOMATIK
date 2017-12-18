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
$ajouter = $donnees['id_piece'];
$requete2 = $bdd->prepare("SELECT nom_de_piece FROM piece WHERE id_piece = :ajouter");
$requete2->execute(array(':ajouter' => $ajouter));
$nompiece = $requete2->fetch();


$idutilisateur = 123456789;
$req = $bdd->prepare('INSERT INTO piece( id_piece, id_maison, nom_de_piece) VALUES (NULL, :idmaison, :nomdepiece)');

$req1 = $bdd->prepare('SELECT id_maison FROM maison WHERE id_utilisateur = :idutilisateur');
$req1->execute(array(':idutilisateur' => $idutilisateur));
$idmaison = $req1->fetch();

$req-> execute(array(':idmaison' => $idmaison, ':nomdepiece' => $_POST['']));


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
   <caption><strong>Historique de pannes</strong></caption>

   <tr>
       <th>Pièce concernée</th>
       <th>Type de capteur</th>
       <th>Valeur</th>
       <th>Allumé(1)/Eteint(0)</th>
       <th>Rapport d'erreur</th>
       <th>Date de la panne</th>
   </tr>

    <tr>
       <td><?php echo $nompiece['nom_de_piece']; ?></td>
       <td><?php echo $donnees['type']; ?></td>
       <td><?php echo $donnees['valeur_temps_reel']; ?></td>
       <td><?php echo $donnees['allume_ou_eteint']; ?></td>
       <td><?php echo $donnees['rapport_erreur']; ?></td>
       <td><?php echo $donnees['date_panne']; ?></td>


   </tr>

    <tr>
       <td><?php echo $nompiece['nom_de_piece']; ?></td>
       <td><?php echo $donnees['type']; ?></td>
       <td><?php echo $donnees['valeur_temps_reel']; ?></td>
       <td><?php echo $donnees['allume_ou_eteint']; ?></td>
       <td><?php echo $donnees['rapport_erreur']; ?></td>
       <td><?php echo $donnees['date_panne']; ?></td>


   </tr>
</table>
    </section>
</div>

    <footer>
             <ul>
                <li><a href="controleur_documents_juridiques.php">Mentions légales</a></li>
                <li><a href="controleur_documents_juridiques.php">CGU</a></li>
                <li><a href="controleur_documents_juridiques.php">Contact</a></li>
                <li><a href="controleur_documents_juridiques.php">Copyright</a></li>
            </ul>
      </footer>
  </body>
</html>



</body>
</html>