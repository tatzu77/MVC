<?php
    require File::build_path(["Model","ModelVoiture.php"]); // chargement du modèle
    class ControllerVoiture {
        public static function readAll() {
            $tab_v = ModelVoiture::selectAll(); //appel au modèle pour gerer la BD
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
            $tab_v= ModelVoiture::selectAll();
            require File::build_path(['View','view.php']);
        }
        public static function error(){
            $view = 'error';
            $controller = 'Voiture';
            $pagetitle = 'Erreur';
            require File::build_path(["view","view.php"]);
        }
        public static function delete($immat){
            ModelVoiture::deleteByImmat($immat);
            $tab_v = ModelVoiture::selectAll();
            $view = 'deleted';
            $controller = 'Voiture';
            $pagetitle = 'Suppression réussie';
            require File::build_path(["view","view.php"]);
            
        }
        public static function update($immat){
            $v = ModelVoiture::getVoitureByImmat($immat);
            $marque =  htmlspecialchars($v->getMarque());       
            $couleur = htmlspecialchars($v->getCouleur());    
            $view = 'update';
            $controller = 'Voiture';
            $pagetitle = 'Mise à jour de la voiture';
            require File::build_path(["view","view.php"]);
        }
        public static function updated(){
            $marque = isset($_POST['marque']) ? $_POST['marque'] : $_GET['marque'];
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : $_GET['couleur'];
            $immat = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : $_GET['immatriculation'];
            $data = array("immat" => $immat, "marque" => $marque, "couleur" => $couleur);
            ModelVoiture::update($data);
            $tab_v= ModelVoiture::selectAll();
            $view = 'updated';
            $controller = 'Voiture';
            $pagetitle = 'Mise à jour réussie';
            require File::build_path(["view","view.php"]);
        }
        
    }
?>