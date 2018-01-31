<?php
  require_once('dbh.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['cgu'])) {
    $insertCGU =$bdd->prepare('UPDATE documents_juridiques SET contenu=:content WHERE nom=\'CGU\'');
    $insertCGU->execute(array('content'=>$_POST['cgu']));
    }
  if (isset($_POST['ml'])) {
    $insertMl =$bdd->prepare('UPDATE documents_juridiques SET contenu=:content WHERE nom=\'mention_legale\'');
    $insertMl->execute(array('content'=>$_POST['ml']));
    }
  if (isset($_POST['faq'])) {
    $insertFaq =$bdd->prepare('UPDATE documents_juridiques SET contenu=:content WHERE nom=\'FAQ\'');
    $insertFaq->execute(array('content'=>$_POST['faq']));
      }
  if (isset($_POST['copyright'])) {
    $insertCopyright =$bdd->prepare('UPDATE documents_juridiques SET contenu=:content WHERE nom=\'copyright\'');
    $insertCopyright->execute(array('content'=>$_POST['copyright']));
      }
}

?>
