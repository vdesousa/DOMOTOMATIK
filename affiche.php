<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
   </head>
   <body>
   		<?php 
   		
   		if (empty($_GET['prénom']))
   		{
   		   $prénom="<span style:'color=red'>manquant</span>";
        }
   		else
   		{
   		    $prénom=(string)$_GET['prénom'];
   		}
   		if (empty($_GET['email']))
   		{
   		    $email="<span style:'color=red'>manquant</span>";
   		}
   		else
   		{
   		    $email=(string)$_GET['email'];
   		}
   		if (empty($_GET['km']))
   		{
   		    $km="<span style:'color=red'>manquant</span>";
   		}
   		else
   		{
   		    $km=(integer)$_GET['km'];
   		}
   		
   		?>
   		
   		<p>Prénom: <?php echo $prénom;?></p><br>
   		<p>Email:<?php echo $email; ?></p><br>
   		<p>La marque de votre voiture est: <?php echo $_GET['cars'];?>
   		<p>Votre kilométrage est:<?php echo $km; ?></p>
   		<?php 
   		if ($km>200000)
   		{
   		    echo "(Tu as bien roulé)";  
   		}
   		?>
   	</body>
</html>