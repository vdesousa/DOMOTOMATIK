if (preg_match("admin",$page)) {
 echo "Vous n'avez pas accès à ce répertoire";
 }

else {

    // On vérifie que la page est bien sur le serveur
    if (file_exists($page) && $page != 'index.php') {
       include("./".$page); 
    }

    else {
        echo "Page inexistante !";
    }

?>

