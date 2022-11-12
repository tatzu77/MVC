<?php
    session_start();
    $_SESSION['prenom'] = 'Loane';
    $_SESSION['age'] = 18;
    $_SESSION['musique'] = [
        'Like my father',
        '2017',
        'T.CHIALER',
        'Clockwork'
    ];
    echo $_SESSION['prenom'];
    echo "<br>";
    echo $_SESSION['age'];
    echo '<ul>';
    foreach($_SESSION['musique'] as $musique){
        echo "<li>" .$musique. "</li>";
    }
    echo '</ul>';
    session_unset();
    session_destroy();

?>