<?php
require_once 'Voiture.php';



$marque = isset($_POST['marque']) ? $_POST['marque'] : $_GET['marque'];
$couleur = isset($_POST['couleur']) ? $_POST['couleur'] : $_GET['couleur'];
$immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : $_GET['immatriculation'];

$voiture = new Voiture ($marque, $couleur, $immatriculation); 
$voiture->save();

