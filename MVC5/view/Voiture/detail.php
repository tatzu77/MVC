<h1>voituuures !</h1>
<?php
    $vimmat = htmlspecialchars($v->getImmatriculation());
    $vmarque = htmlspecialchars($v->getMarque());
    $vcouleur = htmlspecialchars($v->getCouleur());
    echo "<ul>";
    echo "<li>Marque : {$vmarque}</li>";
    echo "<li>Immatriculation : {$vimmat}</li>";
    echo "<li>Couleur : {$vcouleur}</li>";
    echo "</ul>";
?>