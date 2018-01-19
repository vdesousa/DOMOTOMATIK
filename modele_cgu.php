<?php
  require_once('config.php');

$cgu= $mentions_legales= "";
$modifyCGU= $modify_mentions_legales= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['cgu'])) {
    $insertCGU =$pdo->prepare('UPDATE documents_juridiques SET contenu=:content WHERE nom=\'CGU\'');
    $insertCGU->execute(array('content'=>$_POST['cgu']));
    }
  if (isset($_POST['ml'])) {
    $insertMl =$pdo->prepare('UPDATE documents_juridiques SET contenu=:content WHERE nom=\'mention_legale\'');
    $insertMl->execute(array('content'=>$_POST['ml']));
    }
}

?>
