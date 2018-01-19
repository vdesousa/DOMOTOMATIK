<?php include("header3.0.php")?>
 		<section>
            <?php include('controleur_nombre_domicile.php');?>
                <div class="etat_general">
                    <img src="etat_ok.png" alt="etat_systeme"/>
                    <p>
                        Aucune erreur système détectée
                    </p>
                </div>
            <?php include('controleur_tableau_bord.php') ?>
        </section>
 <?php include("footer.php")?>
