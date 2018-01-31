<?php
session_start();
$_SESSION['id_utilisateur']=$_GET['suspension'];
include('header_admin.php');
?>



<style>

#suspension_compte
{
	width: 300px;
	margin-left: 39%;
	margin-top: 10%;
	border: 1px solid black;
	border-radius: 4px;
	padding: 5px;
}
</style>

<!-- ................................................................................. -->

<title>Suspension du compte client</title>

	<section>

	<h1>Suspension du compte client</h1>

	<div id="suspension_compte">

		<form action="controleur_suspension_compte.php" method="post">
						<p><strong>Souhaitez-vous suspendre le compte du client?</strong></p>
			      <input type="radio" name="suspendre" value="oui" id="suspension"/><label for="oui">Oui</label>
            <input type="radio" name="suspendre" value="non" id="suspension"/><label for="non">Non</label></br>

						<input type="submit" name="register" value="Enregistrer" onclick="confirmationSuspension()"/>
		</form>

	</div>

	</section>

	<script>
	function confirmationSuspension() {
		alert("La modification a bien été prise en compte.");
	}
	</script>

<?php include('footer.php'); ?>
