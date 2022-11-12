<?php

include 'Model.php';
include 'Voiture.php';

$query = Model::getPDO() -> query("SELECT * FROM voiture;");

$resultArray = $query->fetchAll(PDO::FETCH_OBJ);


echo "Affichage 1 :<br><br>";

foreach($resultArray as $row){
    echo 'voiture n°' .  $row->id . '<br>'; 
    echo 'marque :' . $row->brand . '<br>';
    echo 'couleur :' .  $row->color . '<br>';
    echo 'immatriculation :' . $row->licenseNum . '<br>';
}

$query->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
$voitures = $query->fetchAll();

echo "<br>Affichage 2 :<br><br>";

var_dump($voitures);
?>