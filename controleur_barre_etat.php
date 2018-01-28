<?php
include("modele_barre_etat.php");
$etat=true;
$a=0;
foreach($donnees as $donnee)
{
  if ($donnee['etat']==0)
  {
    $etat=false;
  }
  $a+=1;
} // Si un ou plusieurs capteurs sont éteints, la variable $etat prend la valeur false

if ($etat==true && $a>=1)
{
  echo '<div class="etat_general">
      <img src="etat-ok_burned.png" alt="etat_capteurs"/>
      <p>
          Tous les capteurs sont allumés dans la maison
      </p>
  </div>';
} // Si tous les capteurs sont allumés, on affiche la barre d'état positive
elseif ($etat==false && $a>=1)
{
  echo '<div class="etat_general">
      <img src="etat-non-ok_burned.png" alt="etat_capteurs"/>
      <p>
          Un ou plusieurs capteurs ne sont pas allumés dans la maison
      </p>
  </div>';
} // Sinon on affiche la barre d'état négative
?>
