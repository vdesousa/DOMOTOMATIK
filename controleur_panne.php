<?php
session_start();
require('modele_panne.php');
include('header_admin.php');
$_SESSION['id_utilisateur']=$_GET['panne'];
?>

<style>

table
{
  margin-left: 400px;
  margin-top: 50px;
  border-collapse: collapse;
  background:rgb(174,186,239); 
}

td,th
{
  border-collapse: collapse;
  border: 1px solid black;
}

</style>

<!-- ........................................................ -->

<title>Historique des pannes</title>

<section>
  <table>
    <h1>Historique des pannes</h1>

      <tr>
       <th>Type de capteur</th>
       <th>Valeur</th>
       <th>En panne</th>
       <th>Date de la panne</th>
      </tr>

<?php  while($donnees1=$req1->fetch()) {
        if($donnees1['etat']=="0"){
?>
      <tr>
       <td><?php echo $donnees1['type']; ?></td>
       <td><?php echo $donnees1['valeur_temps_reel']; ?></td>
       <td><?php echo $donnees1['rapport_erreur']; ?></td>
       <td><?php echo $donnees1['date_panne']; ?></td>
     </tr>
<?php
        }
}

$req1->closeCursor();

 ?>

    </table>
  </section>

<?php include('footer.php') ?>
