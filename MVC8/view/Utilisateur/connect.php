<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="post" action="index.php?controller=utilisateur$action=connected">
        <fieldset>
            <legend>Mon formulaire :</legend>
            <p>
            <label for="login_id">Login</label> :
            <input type="text" placeholder="user456" name="login" id="login_id"/>
            </p>
            <p>
            <label for="mdp_id">Mot de passe</label> :
            <input type="text" placeholder="******" name="prenom" id="mdp_id"/>
            </p>
            <p>
            <input type="submit" value="Connexion" />
            </p>
        </fieldset>
        </form>
    </body>
</html>