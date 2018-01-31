<?php
include('modele_gestion_catalogue_admin.php');
$nbrcapt=count($res1);
$nbrcapt-=1;
while ($nbrcapt !=-1) {
    $nomobj = $res1[$nbrcapt]['nom_objet'];
    $photo = $res1[$nbrcapt]['photo'];
    $id = $res1[$nbrcapt]['id_objet'];
    echo '<li><a href="modification_capteur.php?capteur='.$id.'"><img src="'.$photo.'.jpg"><br><span>'.$nomobj.'</span></a></li>';
    $nbrcapt -=1; };

?>
