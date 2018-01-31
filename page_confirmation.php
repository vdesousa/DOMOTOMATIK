<?php
include("header_admin.php");
include("dbh.php");
$req1 = $bdd->query("SELECT `email`, `code` FROM `confirmation`");
$res1 = $req1->fetchAll();
?>
<h1>Confirmation d'utilisateur</h1>
<?php
  $nbruti=count($res1);
  $nbruti-=1;
  echo "<table>
  <tr>
    <th>Email d'utilisateur</th>
    <th>Code</th>
  </tr>";
  while ($nbruti !=-1) {
    $email = $res1[$nbruti]['email'];
    $code = $res1[$nbruti]['code'];
       echo  "<tr>
                 <td>$email</td>
                 <td>$code</td>
             </tr>";
      $nbruti -=1; };
  echo "</table";
?>
<h5>Nouveau client:</h5><br>
<form method="post" action="index4.php">
  <label>E-mail:
  <input type="text" name="email" /></label><br>
  <input type="submit" name="submit" value="Valider" />
</form>

<?php include("footer.php")?>
