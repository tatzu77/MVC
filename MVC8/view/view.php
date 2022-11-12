<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>

<body>
    <header style="display:flex; justify-content:space-around;">
        <a href="index.php?action=readAll"> Liste des voitures </a>
        <a href="index.php?action=readAll&controller=utilisateur"> Page d'acceuil d'utilisateur</a>
        <a href="index.php?action=readAll&controller=trajet"> Page d'acceuil des trajets </a>
        <a href="preference.html">Page des préférences</a>
    </header>
    <?php
    if(isset($_SESSION['login'])){
        echo '<a style="text-align:center" href=index.php?controller=utilisateur$action=deconnect">Déconnection</a>';
    }else{
        echo '<a style="text-align:center" href="index.php?controller=utilisateur$action=connect">Connexion</a>';
    }
    // Si $controleur='voiture' et $view='list',
    // alors $filepath="/chemin_du_site/view/voiture/list.php"
    $filepath = File::build_path(array("view", $controller, "$view.php"));
    require $filepath;
    ?>
    <footer>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
            Site de covoiturage de Loane Aviles.
        </p>
    </footer>
</body>

</html>