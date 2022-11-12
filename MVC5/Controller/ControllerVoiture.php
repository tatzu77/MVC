<?php
    require File::build_path(["Model","ModelVoiture.php"]); // chargement du modèle
    class ControllerVoiture {
        public static function readAll() {
            $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
            $controller='Voiture';
            $view='list';
            $pagetitle='Liste des voitures';
            require File::build_path(["View","view.php"]); //"redirige" vers la vue
        }
        public static function read($immat){
            $v = ModelVoiture::getVoitureByImmat($immat);
            if ($v == FALSE){
                $view='error';
                $pagetitle="Page d'erreur";
                $controller='Voiture';
                require File::build_path(["View","view.php"]);
            } else {
                $view='detail';
                $pagetitle='Détail de la voiture';
                $controller='Voiture';
                require File::build_path(["View","view.php"]);
            };
        }
        public static function create(){
            $view='create';
            $controller='Voiture';
            $pagetitle='Création de voiture';
            require File::build_path(["View","view.php"]);
        }
        public static function created(){
            $marque = isset($_POST['marque']) ? $_POST['marque'] : $_GET['marque'];
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : $_GET['couleur'];
            $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : $_GET['immatriculation'];
            $voiture = new ModelVoiture ($immatriculation, $marque, $couleur); 
            $voiture->save();
            $view='created';
            $controller='Voiture';
            $pagetitle='Création de voiture 2';
            $tab_v= ModelVoiture::getAllVoitures();
            require File::build_path(['View','view.php']);
           
        }
    }
?>