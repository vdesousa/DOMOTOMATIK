<?php
include('config.php');
include('header_admin.php');

$req=$pdo->query('SELECT * FROM pannes INNER JOIN capteur ON pannes.id_capteur = capteur.id_capteur INNER JOIN utilisateur ON capteur.id_capteur = utilisateur.id_personne INNER JOIN personne ON utilisateur.id_utilisateur = personne.id_personne');
$req1=$pdo->prepare('SELECT type, valeur_temps_reel, rapport_erreur, DATE_FORMAT(date_panne, \'%d/%m/%Y à %Hh%imin%ss\')AS date_erreur FROM pannes,capteur WHERE id_utilisateur=:utilisateur AND etat="0"');
$req1->execute(array('utilisateur'=>$_GET['panne']));
?>



    <section>
<table>
   <caption><strong>Historique de pannes</strong></caption>

   <tr>
       <th>Type de capteur</th>
       <th>Valeur</th>
       <th>En panne</th>
       <th>Date de la panne</th>
   </tr>
<?php
while($donnees1=$req1->fetch()) {
?>
    <tr>
       <td><?php echo $donnees1['type']; ?></td>
       <td><?php echo $donnees1['valeur_temps_reel']; ?></td>
       <td><?php echo $donnees1['rapport_erreur']; ?></td>
       <td><?php echo $donnees1['date_erreur']; ?></td>
    </tr>
<?php
}
$req->closeCursor();
}
$req1->closeCursor();
 ?>

</table>
    </section>
</div>

</body>
<?php include('footer.php') ?>
</html>
