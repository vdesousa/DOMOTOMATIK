<?php
$requete=$bdd->prepare('SELECT etat FROM capteur INNER JOIN piece ON capteur.id_piece=piece.id_piece WHERE id_maison=?');
$requete->execute(array($_SESSION['id_maison_choisie']));
$donnees=$requete->fetchAll();

$etat=true;
$a=0;
foreach($donnees as $donnee)
{
  if ($donnee['etat']==0)
  {
    $etat=false;
  }
  $a+=1;
}

if ($etat==true && $a>=1)
{
  echo '<div class="etat_general">
      <img src="etat-ok_burned.png" alt="etat_capteurs"/>
      <p>
          Tous les capteurs sont allumés dans la maison
      </p>
  </div>';
}
elseif ($etat==false && $a>=1)
{
  echo '<div class="etat_general">
      <img src="etat-non-ok_burned.png" alt="etat_capteurs"/>
      <p>
          Un ou plusieurs capteurs ne sont pas allumés dans la maison
      </p>
  </div>';
}
?>
