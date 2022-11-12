<?php
    require_once ('../model/ModelVoiture.php'); // chargement du modèle
    class ControllerVoiture {
        public static function readAll() {
            $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
            require ('../view/Voiture/list.php'); //"redirige" vers la vue
        }
        public static function read($immat){
            $v = ModelVoiture::getVoitureByImmat($immat);
            if ($v == FALSE){
                require ('../view/Voiture/error.php');
            } else {
                require ('../view/Voiture/detail.php');
            };
        }
        public static function create(){
            require ('../view/Voiture/create.php');
        }
        public static function created(){
            $marque = isset($_POST['marque']) ? $_POST['marque'] : $_GET['marque'];
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : $_GET['couleur'];
            $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : $_GET['immatriculation'];

            $voiture = new ModelVoiture ($immatriculation, $marque, $couleur); 
            $voiture->save();
            self::readAll();
        }
    }
?>