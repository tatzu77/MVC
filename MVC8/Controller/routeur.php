<?php
    /*require('../../lib/File.php');*/
    require File::build_path(["model","Model.php"]);
    require File::build_path(["Controller","ControllerVoiture.php"]);
    require File::build_path(["Controller","ControllerUtilisateur.php"]);
    
    // On recupère l'action passée dans l'URL
    $action = isset($_GET['action'])? $_GET['action'] : $action = 'readAll';
    $immat = isset($_GET['immat'])?$_GET['immat'] : "";
   // $tab_m = get_class_methods(ControllerVoiture::class);
   if(isset($_COOKIE['preference'])){
        $controller_default = $_COOKIE['preference'];
    }else {
        $controller_default = "voiture";
    } 
   $controller = isset($_GET['controller'])? $_GET['controller'] : $controller = $controller_default;
    $controller_class = 'Controller' . ucfirst($controller);
    if (class_exists($controller_class)){
       
        $controller_class::$action($immat);
      
    } else {
        ControllerVoiture::error();
    }
    public function myGet($nomvar){
        if(!is_null($_GET[$nomvar])){
            return $_GET[$nomvar];
        } else if(!is_null($_POST[$nomvar])){
            return $_POST[$nomvar];
        } else {
            return null;
        }
    }
    // Appel de la méthode statique $action de ControllerVoiture
    // $tab_m = get_class_methods(new $controller_class::class);
        //if (in_array($action,$tab_m)){
     // } else {
         //   ControllerVoiture::error();
       // }
?>
