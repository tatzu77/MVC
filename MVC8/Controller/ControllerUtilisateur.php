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
            if ($u == FALSE){
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
            if(Session::is_user($login)){
                ModelUtilisateur::delete($login);
                $tab_u = ModelUtilisateur::selectAll();
                $view = 'deleted';
                $controller = static::$object;
                $pagetitle = 'Suppression réussie';
                require File::build_path(["view","view.php"]);
            } else {
                static::connect();
            }
            
            
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
            $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : $_GET['mdp'];
            $mdp2 = isset($_POST['mdp2']) ? $_POST['mdp2'] : $_GET['mdp2'];
            $admin = isset($_POST['admin']) ? $_POST['admin'] : $_GET['admin'];
            $email = isset($_POST['email']) ? $_POST['email'] : $_GET['email'];
            if ($mdp==$mdp2){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $randomId = Security::generateRandomHex();
                    $mail = "Confirmation de l'adress mail par ce lien : http://laragon/www/mvc8/code/index.php/action=mail";
                    mail(
                        $email,
                        "Confirmation de l'adresse e-mail",
                        $mail
                    );
                    $utilisateur = new ModelUtilisateur ($login, $nom, $prenom,$mdp,$admin,$email); 
                    Model::save($utilisateur);
                    $view='created';
                    $controller= static::$object;
                    $pagetitle='Création d\'utilisateur 2';
                    $tab_u= ModelUtilisateur::selectAll();
                    require File::build_path(['View','view.php']);
                }
                
            }
            
        }
        public static function update($login){
            $login = $get['login'];
            if(Session::is_user($login)||Session::is_admin()){
                $u = ModelUtilisateur::select($login);
                $nom =  htmlspecialchars($u->getNom());       
                $prenom = htmlspecialchars($u->getPrenom());
                $mdp = htmlspecialchars($u->getMdp());
                $mdp2 = $mdp;
                $is_admin = Session::is_admin()?true:false;
                $admin = $u->get('admin')==1?"checked":"";
                $loginType = "readonly";  
                $view = 'update';
                $controller = static::$object;
                $mode = 'readonly';
                $action='updated';
                $pagetitle = 'Mise à jour de l\'utilisateur';
                require File::build_path(["view","view.php"]);
            } else {
                static::connect();
            }
            
        }
        public static function updated(){
            $login = isset($_POST['login']) ? $_POST['login'] : $_GET['login'];
            if(Session::is_user($login)||Session::is_admin()){
                $nom = isset($_POST['nom']) ? $_POST['nom'] : $_GET['nom'];
                $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $_GET['prenom'];
                $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : $_GET['mdp'];
                $mdp2 = isset($_POST['mdp2']) ? $_POST['mdp2'] : $_GET['mdp2'];
                $email = isset($_POST['email']) ? $_POST['email'] : $_GET['email'];
                if($mdp==$mdp2){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $data = array("login" => $login, "nom" => $nom, "prenom" => $prenom, "mdp" => $mdp, "admin" => 0, "email" => "");
                        ModelUtilisateur::update($data);
                        $tab_u= ModelUtilisateur::selectAll();
                        $view = 'updated';
                        $controller = static::$object;
                        $pagetitle = 'Mise à jour réussie';
                        require File::build_path(["view","view.php"]);
                    }
                    
                }
            } else {
                static::connect();
            }
        }
        public static function connect(){
            require File::build_path(["view","Utilisateur","connect.php"]);
        }
        public static function connected(){
            $login = isset($_POST['login']) ? $_POST['login'] : $_GET['login'];
            $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : $_GET['mdp'];
            $u = ModelUtilisateur::checkPassword($login, Security::chiffrer($mdp));
            if($u!=false&&$u->get('nouv')==null){
                $_SESSION['login'] = $login;
                $_SESSION['admin'] = $u->get('admin');
                require File::build_path(["view","Utilisateur","detail.php"]);
            }
        }
        public static function deconnect(){
            session_destroy();
            header("Location: index.php");
        }
        public static function validate($get){
            $data = [
                "login" => $get['login'],
                "nouv" => $get['nouv']
            ];
            ModelUtilisateur::validate($data);
        }
    }
?>