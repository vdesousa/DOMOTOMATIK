<?php
include("header_admin.php");
?>
<div class=admin_confirmation>
<h1>Confirmation d'utilisateur</h1>
<table>
<tr>
  <th>Email d'utilisateur</th>
  <th>Code</th>
</tr>
<?php
  include("controleur_admin_confirmation.php");
?>
<h5>Nouveau client:</h5><br>
<form method="post" action="index4.php">
  <label>E-mail:
  <input type="text" name="email" /></label><br>
  <input type="submit" name="submit" value="Valider" />
</form>
</div>
<?php include("footer.php")?>
