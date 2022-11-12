<?php
    require File::build_path(["Model","ModelVoiture.php"]); // chargement du modèle

    class ControllerVoiture {
        protected static $object = 'voiture'; 
        public static function readAll() {
            $tab_v = ModelVoiture::selectAll(); //appel au modèle pour gerer la BD
            $controller= static::$object;
            $view='list';
            $pagetitle='Liste des voitures';
            require File::build_path(["View","view.php"]); //"redirige" vers la vue
        }
        public static function read($primary_value){
            $v = ModelVoiture::select($primary_value);
            if ($v == FALSE){
                $view='error';
                $pagetitle="Page d'erreur";
                $controller= static::$object;
                require File::build_path(["View","view.php"]);
            } else {
                $view='detail';
                $pagetitle='Détail de la voiture';
                $controller= static::$object;
                require File::build_path(["View","view.php"]);
            };
        }
        public static function create(){
            $immat='';
            $marque='';
            $couleur='';
            $view='update';
            $controller= static::$object;
            $mode = 'required';
            $pagetitle='Création de voiture';
            $action='created';
            require File::build_path(["View","view.php"]);
        }
        public static function created(){
            $marque = isset($_POST['marque']) ? $_POST['marque'] : $_GET['marque'];
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : $_GET['couleur'];
            $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : $_GET['immatriculation'];
            $voiture = new ModelVoiture ($immatriculation, $marque, $couleur); 
            $data = array(
                "immatriculation" => $immatriculation,
                "marque" => $marque,
                "couleur"=> $couleur
            );
            ModelVoiture::save($data);
            $view='created';
            $controller= static::$object;
            $pagetitle='Création de voiture 2';
            $tab_v= ModelVoiture::selectAll();
            require File::build_path(['View','view.php']);
        }
        public static function error(){
            $view = 'error';
            $controller = static::$object;
            $pagetitle = 'Erreur';
            require File::build_path(["view","view.php"]);
        }
        public static function delete($immat){
            ModelVoiture::delete($immat);
            $tab_v = ModelVoiture::selectAll();
            $view = 'deleted';
            $controller = static::$object;
            $pagetitle = 'Suppression réussie';
            require File::build_path(["view","view.php"]);
            
        }
        public static function update($immat){
            $v = ModelVoiture::select($immat);
            $marque =  htmlspecialchars($v->getMarque());       
            $couleur = htmlspecialchars($v->getCouleur());    
            $view = 'update';
            $controller = static::$object;
            $mode = 'readonly';
            $action='updated';
            $pagetitle = 'Mise à jour de la voiture';
            require File::build_path(["view","view.php"]);
        }
        
        public static function updated(){
            $marque = isset($_POST['marque']) ? $_POST['marque'] : $_GET['marque'];
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : $_GET['couleur'];
            $immat = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : $_GET['immatriculation'];
            $data = array("immatriculation" => $immat, "marque" => $marque, "couleur" => $couleur);
            ModelVoiture::update($data);
            $tab_v= ModelVoiture::selectAll();
            $view = 'updated';
            $controller = static::$object;
            $pagetitle = 'Mise à jour réussie';
            require File::build_path(["view","view.php"]);
        }
        
    }
?>