<?php
// Cette page sert à afficher un message d'erreur ou de succès suite à la modification de ses données personnelles
if(isset($_GET['changement']) && $_GET['changement']==1)
{
  echo '<center><p class="changement">Les modifications ont bien été effectuées</p></center>';
}
elseif(isset($_GET['changement']) && $_GET['changement']==0)
{
  echo '<center><p class="changemet">Les mots de passe ne sont pas identiques, veuillez recommencer</p></center>';
}

?>
