<?php 
echo "La voiture d'immatriculation " . $immat . " a bien été supprimée";
require File::build_path(["view","voiture","list.php"]);
 ?>