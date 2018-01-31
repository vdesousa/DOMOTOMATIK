<?php include("headerhc.php") ?>
<div class=accueil>
<h1>Bienvenue sur DOMOTOMATIK</h1>
<img class=photoaccueil src='photoaccueil.jpg' />
<p>Le site de DOMOTOMATIK a pour but de connecter votre maison de façon simple et efficace. Vous pourrez contrôler votre maison grâce aux CeMACs de DOMISEP, qui rendront votre vie plus agrèable.</p><br>
<h1>Catalogue</h1>
<ul>
  <?php include('controleur_accueil.php'); ?>
</ul>
</div>
<?php include("footer.php")?>
