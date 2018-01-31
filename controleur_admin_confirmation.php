<?php
include('modele_admin_confirmation.php');

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
