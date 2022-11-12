<?php
    require File::build_path(["Model","ModelUtilisateur.php"]); // chargement du modèle
    class ControllerUtilisateur {
        public static function readAll() {
            $tab_u = ModelUtilisateur::selectAll(); //appel au modèle pour gerer la BD
            $controller='Utilisateur';
            $view='list';
            $pagetitle='Liste des utilisateurs';
            require File::build_path(["View","view.php"]); //"redirige" vers la vue
        }
    }
?>