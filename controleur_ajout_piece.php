<?php
  session_start();
  include("modele_ajout_piece.php");
  $length_dom=count($tab_dom);
  $length_pce=count($tab_pce);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <div class="domicile">
        <?php
          if ($length_dom===1) {
        ?>
        <form action="modele_ajout_piece_bdd.php" method="post">
            <p>Votre domicile :
        <?php
            $length_dom_elt=count($tab_dom[0]);
            for ($i=0; $i < $length_dom_elt; $i++) {
              if ($tab_dom[0][$i]!=""){
                  echo $tab_dom[0][$i];
                  if ($i===$length_dom_elt-2 OR $i===$length_dom_elt-4
                      OR $i===$length_dom_elt-5){
                    echo ",";
                  }
                  echo " ";
              }
            }
          ?>
      </p>
          <?php
          } else {
        ?>
      <p>Sélectionner un domicile :</p>

      <form action="modele_ajout_piece_bdd.php" method="post">
        <?php if (isset($_SESSION['choix_piece'])) { ?>
            <input type="hidden" name="choix_piece" value=<?php echo $_SESSION['choix_piece']; ?>>
        <?php } ?>
              <select name="domicile" size="1">
                <option>--- Sélectionner un domicile ---</option>

                <?php
                  for ($i=0; $i < $length_dom; $i++) {
                    $length_dom_elt=count($tab_dom[$i]); ?>
                    <option>
                      <?php
                        for ($j=0; $j < $length_dom_elt; $j++) {
                          if ($tab_dom[$i][$j]!=""){
                            echo $tab_dom[$i][$j];
                            if ($j===$length_dom_elt-2 OR $j===$length_dom_elt-4
                                OR $j===$length_dom_elt-5){
                              echo ",";
                            }
                            echo " ";
                          }
                        } ?>
                    </option>
                    <?php
                  } ?>
              </select>
              <?php
            } ?>

  </div>
  <div class="piece">
      <p>Choisissez une pièce : </p>

          <select name="piece" size="1">
              <option>--- Sélectionner une pièce ---</option>
              <?php
              for ($i=0; $i < $length_pce; $i++) {   ?>
                  <option><?php echo $tab_pce[$i]; ?></option>
              <?php
              }
              ?>
          </select>
  </div>


</html>
