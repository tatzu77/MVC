<?php
require_once 'Voiture.php';
//require_once 'Trajet.php';
//require_once 'Utilisateur.php';


//$tab_1 = Voiture::getVoitureByImmat('AH205B8A');
//$tab_1->afficher();
//echo $voiture1->getCouleur();

$voiture1 = new Voiture ("dacia", "jaune", "KL34JDEI"); 

$voiture1->save();
$tab_voit = Voiture::getAllVoitures();
foreach ($tab_voit as $voiture){
    $voiture->afficher();
}

/*$tab_util = Utilisateur::getAllUtilisateurs();
priint_r($tab_util);
vo
$tab_traj = Trajet::getAllTrajets();
print_r($tab_traj);*/


