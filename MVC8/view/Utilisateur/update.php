
<form method="post" action="index.php?action='<?php echo$action ?>'">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="login_id">Login</label> :
      <input type="text" placeholder="user456" name="login" id="login_id" value="<?php echo $login ?>" <?php echo $mode ?> />
    </p>
    <p>
      <label for="nom_id">Nom</label> :
      <input type="text" placeholder="Dupont" name="nom" id="nom_id" value="<?php echo $nom ?>" required />
    </p>
    <p>
      <label for="prenom_id">Prenom</label> :
      <input type="text" placeholder="Goerge" name="prenom" id="prenom_id" value="<?php echo $prenom ?>" required />
    </p>
    <p>
      <label for="email_id">E-mail</label> :
      <input type="text" placeholder="prenom.nom@mail.com" name="email" id="e-mail" />
    </p>
    <p>
      <label for="mdp_id">Mot de passe</label> :
      <input type="text" placeholder="******" name="prenom" id="mdp_id" value="<?php echo $mdp ?>" required />
    </p>
    <p>
      <label for="valide_id">Validation de mot de passe</label> :
      <input type="text" name="prenom" id="valide_id" value="<?php echo $mdp2 ?>" required />
    </p>
    <p>
      <?php 
        echo '<label for="admin">Admin</label> :';
        echo '<input type="checkbox" name="admin" id="admin"' .$admin. '>';
      ?>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>
</form>


