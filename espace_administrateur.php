<?php require('modele_administrateur.php');
include('header_admin.php');
include('footer.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="espace_administrateur.css">
	<title>Espace administrateur</title>
</head>

<body>

	<section>
	    <h1>Bienvenue sur l'espace administrateur</h1>
	    <table>
	   <caption><strong>Bilan général</strong></caption>

	   <tr>
	       <th>Prénom du client</th>
	       <th>Nom du client</th>
	       <th>Numéro de téléphone</th>
	       <th>Adresse Email</th>
	       <th>Date d'adhésion</th>
	       <th>Historique des pannes</th>
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


</body>
</html>
