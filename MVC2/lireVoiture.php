<?php
require_once 'Voiture.php';
require_once 'Trajet.php';
require_once 'Utilisateur.php';

$tab_voit = Voiture::getAllVoitures();
foreach ($tab_voit as $voiture){
    $voiture->afficher();
}

$tab_util = Utilisateur::getAllUtilisateurs();
print_r($tab_util);

$tab_traj = Trajet::getAllTrajets();
print_r($tab_traj);


