
<?php
    foreach ($tab_v as $v) {
        $vimmat = htmlspecialchars($v->getImmatriculation());
        $vimmat2 = rawurlencode($v->getImmatriculation());
        echo '<p> Voiture d\'immatriculation <a href="index.php?action=read&immat=' . $vimmat2 . '">' . $vimmat . '</a>' . '.</p>';
    }
?>