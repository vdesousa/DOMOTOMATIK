<?php include('header_perso.php'); ?>

<style>

#envoyer_message
{
	margin-left: 250px;
	margin-top: 100px;
}

textarea
{
  width: 900px;
  height: 300px;
}

</style>

<!-- ............................................................................................ -->

<title> Boite de réception</title>

	<section>

	<h1>Envoyer un message</h1>

	<div id="envoyer_message">

  <form action="email.php" method="post">

    <label>Email :<input type="text" name="destinataire" placeholder="Entrez le mail du destinataire"/></label><br/>
    <label>Objet du mail :<input type="text" name="objet"></label><br/>
    <textarea name="message"></textarea><br/>
    <input type="submit" value="Envoyer"/>

  </form>

	</div>

	</section>

<?php include('footer.php'); ?>
