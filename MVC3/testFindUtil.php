<?php
require_once 'Trajet.php';
$id = $_GET['identifiant'];
$tab1 = Trajet::findPassager($id);
foreach ($tab1 as $util){
 $util->afficher();
}
