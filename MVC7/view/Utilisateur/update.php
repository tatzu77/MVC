
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
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>
</form>


