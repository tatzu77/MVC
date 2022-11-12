<?php 
    setcookie("Planetes", serialize([
        "Mercure",
        "Pluton",
        "Saturne",
        "Mars",
        "Uranus"
    ]), time()+3600);
    $planetes = unserialize($_COOKIE['Planetes']);
    echo "<ul>";
    foreach($planetes as $planete){
        echo "<li>" .$planete."</li>";
    }
    echo "</ul>";

?>