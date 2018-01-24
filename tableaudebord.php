<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device_width">
		<title>Tableau de bord</title>
		<link rel="stylesheet" type="text/css" href="styletdb.css">
		<link rel="stylesheet" type="text/css" href="footer.css">
		<link rel="stylesheet" type="text/css" href="header_perso.css">
	</head>
  <?php include("header_perso.php")?>
 		<section>
            <?php include('controleur_nombre_domicile.php');?>
            <?php include('controleur_tableau_bord.php') ?>
    </section>
 <?php include("footer.php")?>
