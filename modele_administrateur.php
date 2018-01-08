<?php

require_once('config.php');

$user=$pdo->query('SELECT name, address, postcode, phone, email, DATE_FORMAT(date_sign_up,\'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM utilisateur');

?>
