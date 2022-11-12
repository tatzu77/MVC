<h1>voituuures !</h1>
<?php
    $vimmat = htmlspecialchars($v->getImmatriculation());
    $vmarque = htmlspecialchars($v->getMarque());
    $vcouleur = htmlspecialchars($v->getCouleur());
    $vimmat2 = rawurlencode($v->getImmatriculation());
    echo "<ul>";
    echo "<li>Marque : {$vmarque}</li>";
    echo "<li>Immatriculation : {$vimmat}</li>";
    echo "<li>Couleur : {$vcouleur}</li>";
    echo "</ul>";
    echo "<p style='display:flex; justify-content:space-around;'>";
    echo "<a href='index.php?action=delete&immat={$vimmat2}'> Supprimer la voiture </a>";
    echo "<a href='index.php?action=update&immat={$vimmat2}'> Modifier la voiture </a>";
    echo "</p>";
?>