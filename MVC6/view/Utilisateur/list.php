<?php
    foreach ($tab_u as $u) {
        $ulogin = htmlspecialchars($u->getLogin());
        $ulogin2 = rawurlencode($u->getLogin());
        echo '<p> Utilisateur de login ' . $ulogin . '</p>';
    }
?>