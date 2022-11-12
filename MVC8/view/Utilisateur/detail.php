<h1>Utilisateuuuuuurs !</h1>
<?php
    $ulogin = htmlspecialchars($u->getLogin());
    $unom = htmlspecialchars($u->getNom());
    $uprenom = htmlspecialchars($u->getPrenom());
    $ulogin = rawurlencode($u->getLogin());
    echo "<ul>";
    echo "<li>Nom : {$unom}</li>";
    echo "<li>Login : {$ulogin}</li>";
    echo "<li>Prenom : {$uprenom}</li>";
    echo "</ul>";
    
    if (Session::is_user($u->get('login'))){
        echo "<p style='display:flex; justify-content:space-around;'>";
        echo "<a href='index.php?action=delete&login={$ulogin2}'> Supprimer l'utilisateur </a>";
        echo "<a href='index.php?action=update&login={$ulogin2}'> Modifier l'utilisateur </a>";
        echo "</p>";
    }
?>