<?php
    /*require('../../lib/File.php');*/
    require File::build_path(["model","Model.php"]);
    require File::build_path(["Controller","ControllerVoiture.php"]);
    require File::build_path(["Controller","ControllerUtilisateur.php"]);
    
    // On recupère l'action passée dans l'URL
    $action = isset($_GET['action'])? $_GET['action'] : $action = 'readAll';
    $immat = isset($_GET['immat'])?$_GET['immat'] : "";
   // $tab_m = get_class_methods(ControllerVoiture::class);
    $controller = isset($_GET['controller'])? $_GET['controller'] : $controller = 'voiture';
    $controller_class = 'Controller' . ucfirst($controller);
    if (class_exists($controller_class)){
       
        $controller_class::$action($immat);
      
    } else {
        ControllerVoiture::error();
    }
    // Appel de la méthode statique $action de ControllerVoiture
    // $tab_m = get_class_methods(new $controller_class::class);
        //if (in_array($action,$tab_m)){
     // } else {
         //   ControllerVoiture::error();
       // }
?>
