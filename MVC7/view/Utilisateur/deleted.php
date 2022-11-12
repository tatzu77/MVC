<?php 
    echo "L'utilisateur de login ' " . $login . " a bien été supprimé";
    require File::build_path(["view","Utilisateur","list.php"]);
 ?>