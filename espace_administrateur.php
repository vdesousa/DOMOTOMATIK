<?php require('modele_administrateur.php');
include('header.php');
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
	       <th>Nom du client</th>
	       <th>Adresse postale</th>
	       <th>Code postal</th>	       	       
	       <th>Numéro de téléphone</th>
	       <th>Adresse Email</th>
	       <th>Date d'adhésion</th>
	       <th>Historique des pannes</th>
	   </tr>
<?php
 while ($addUser = $user->fetch()) {
 	?>
 	<tr>
 	<td><?php echo htmlspecialchars($addUser['name']); ?></td>
 	<td><?php echo htmlspecialchars($addUser['address']); ?></td>
    <td><?php echo htmlspecialchars($addUser['postcode']); ?></td>
    <td><?php echo htmlspecialchars($addUser['phone']); ?></td>
    <td><?php echo htmlspecialchars($addUser['email']); ?></td>
    <td><?php echo htmlspecialchars($addUser['date_fr']); ?></td>
    <td><a href="controleur_panne.php?id=<?php echo $donnee['id']; ?>">Consultez historique des pannes</a></td>
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
