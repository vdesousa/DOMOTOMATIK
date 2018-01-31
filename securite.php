<?php
    class securite{
        /*Protège des injections SQL*/
        public static function sql($chaine){

            /*D'abord on vérifie s'il ne s'agisse pas d'un entier*/
            if(ctype_digit($chaine)){
                $chaine=intval($chaine);
            }

            /*Puis on met en place la sécurité*/
            else{
                $chaine=addcslashes($chaine, '%_');
            }
            return $chaine;
        }
        /*Protège des injections HTML*/
        public static function html($chaine){
            return htmlentities($chaine);
        }
    }
?>
