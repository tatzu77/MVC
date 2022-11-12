
<form method="post" action="index.php?action=<?php echo$action ?>">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="immat_id">Immatriculation</label> :
      <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" value="<?php echo $immat ?>" <?php echo $mode ?> />
    </p>
    <p>
      <label for="marque_id">Marque</label> :
      <input type="text" placeholder="Porsche" name="marque" id="marque_id" value="<?php echo $marque ?>" required />
    </p>
    <p>
      <label for="couleur_id">Couleur</label> :
      <input type="text" placeholder="Blanche" name="couleur" id="couleur_id" value="<?php echo $couleur ?>" required />
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>
</form>


