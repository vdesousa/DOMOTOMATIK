<?php
session_start();
require('modele_espace_administrateur.php');
include('header_admin.php');
?>

<link rel="stylesheet" type="text/css" href="style_admin.css">
<title>Espace administrateur</title>

	<section>
	    <h1>Bienvenue sur l'espace administrateur</h1>

	    <table id="tableau_administrateur">
	   <caption><strong>Bilan général</strong></caption>

	   <tr>
	       <th>Prénom du client</th>
	       <th>Nom du client</th>
	       <th>Numéro de téléphone</th>
	       <th>Adresse Email</th>
	       <th>Date d'adhésion</th>
	       <th>Historique des pannes</th>
				 <th>Suspension du compte client</th>
				 <th>Etat du compte</th>
	   </tr>
<?php
 while ($addUser = $user->fetch()) {
 	?>

 	<tr>
 		<td><?php echo htmlspecialchars($addUser['prenom']); ?></td>
 		<td><?php echo htmlspecialchars($addUser['nom']); ?></td>
 		<td><?php echo htmlspecialchars($addUser['telephone']); ?></td>
    <td><?php echo htmlspecialchars($addUser['email']); ?></td>
    <td><?php echo htmlspecialchars($addUser['date_adhesion']); ?></td>
    <td><a href="controleur_panne.php?panne=<?php echo $addUser['id_utilisateur']; ?>">Consultez historique des pannes</a></td>

		<td><a href="suspension_compte.php?suspension=<?php echo $addUser['id_utilisateur']; ?>">Suspendre le compte</a></td>

		<?php if ($addUser['etat']=="1"){
		?>
						<td id="suspendu"><?php echo "Suspendu"; ?></td>
		<?php
					} else {
		?>
	 					<td id="actif"><?php echo "Actif"; ?></td>
		<?php
	}
		?>
  </tr>

 <?php
 }
?>
	    </table>



	<div id="documents_juridiques">
	<table>
	    <caption><strong>Éditer les documents juridiques</strong></caption>

	   <tr>
	       <th>Mentions légales</th>
	      <td><form><a href="mentions_legales.php">Modifier</a></form></td>
	   </tr>
	   <tr>
	      <th>CGU</th>
	      <td><form><a href="cgu.php">Modifier</a></form></td>
	   </tr>
	   <tr>
	       <th>FAQ</th>
	       <td><form><a href="faq.php">Modifier</a></form></td>
	   </tr>
	   <tr>
	     <th>Copyright</th>
	     <td><form><a href="copyright.php">Modifier</a></form></td>
	   </tr>
	</table>
	</div>
	    </section>

<?php include('footer.php'); ?>
