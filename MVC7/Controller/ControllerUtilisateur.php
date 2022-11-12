<?php
    require File::build_path(["Model","ModelUtilisateur.php"]); // chargement du modèle
    class ControllerUtilisateur {
        protected static $object = 'utilisteur'; 
        public static function readAll() {
            $tab_u = ModelUtilisateur::selectAll(); //appel au modèle pour gerer la BD
            $controller= static::$object;
            $view='list';
            $pagetitle='Liste des utilisateurs';
            require File::build_path(["View","view.php"]); //"redirige" vers la vue
        }
        public static function read($primary_value){
            $u = ModelUtilisateur::select($primary_value);
            if ($v == FALSE){
                $view='error';
                $pagetitle="Page d'erreur";
                $controller= static::$object;
                
            } else {
                $view='detail';
                $pagetitle='Détail de l\'utilisateur';
                $controller=$object;
                
            }
            require File::build_path(["View","view.php"]);
        }
        public static function delete($login){
            ModelUtilisateur::delete($login);
            $tab_u = ModelUtilisateur::selectAll();
            $view = 'deleted';
            $controller = static::$object;
            $pagetitle = 'Suppression réussie';
            require File::build_path(["view","view.php"]);
            
        }
        public static function create(){
            $login='';
            $nom='';
            $prenom='';
            $view='update';
            $controller= static::$object;
            $mode = 'required';
            $pagetitle='Création de voiture';
            $action='save';
            require File::build_path(["View","view.php"]);
        }
        public static function created(){
            $nom = isset($_POST['nom']) ? $_POST['nom'] : $_GET['nom'];
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $_GET['prenom'];
            $login = isset($_POST['login']) ? $_POST['login'] : $_GET['login'];
            $utilisateur = new ModelUtilisateur ($login, $nom, $prenom); 
            Model::save($utilisateur);
            $view='created';
            $controller= static::$object;
            $pagetitle='Création d\'utilisateur 2';
            $tab_u= ModelUtilisateur::selectAll();
            require File::build_path(['View','view.php']);
        }
        public static function update($login){
            $u = LodelUtilisateur::select($login);
            $nom =  htmlspecialchars($u->getNom());       
            $prenom = htmlspecialchars($v->getPrenom());    
            $view = 'update';
            $controller = static::$object;
            $mode = 'readonly';
            $action='updated';
            $pagetitle = 'Mise à jour de l\'utilisateur';
            require File::build_path(["view","view.php"]);
        }
        public static function updated(){
            $nom = isset($_POST['nom']) ? $_POST['nom'] : $_GET['nom'];
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $_GET['prenom'];
            $login = isset($_POST['login']) ? $_POST['login'] : $_GET['login'];
            $data = array("login" => $login, "nom" => $nom, "prenom" => $prenom);
            ModelUtilisateur::update($data);
            $tab_u= ModelUtilisateur::selectAll();
            $view = 'updated';
            $controller = static::$object;
            $pagetitle = 'Mise à jour réussie';
            require File::build_path(["view","view.php"]);
        }
    }
?>