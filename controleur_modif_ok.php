<?php
// Cette page sert à afficher un message de succès suite à la modification de ses données personnelles
if(isset($_GET['changement']) && $_GET['changement']==1)
{
  echo '<center><p class="changement">Les modifications ont bien été effectuées</p></center>';
}
?>
