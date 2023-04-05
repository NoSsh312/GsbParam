<div id="creationCommande">
<form method="POST" action="index.php?uc=gererPanier&action=confirmerCommande">
   <fieldset>
     <legend>Commande</legend>
		<p>
			<label for="nom">Nom*</label>
			<input id="nom" type="text" name="nom"  size="30" maxlength="32" value="<?php echo $_SESSION['nomUtil'] ?>" readonly required>
		</p>
		<p>
			<label for="rue">rue*</label>
			 <input id="rue" type="text" name="rue" size="30" maxlength="32" placeholder="Ex: 13 rue des champs"required>
		</p>
		<p>
         <label for="cp">code postal* </label>
         <input id="cp" type="text" name="cp"  size="5" maxlength="5" required>
      </p>
      <p>
         <label for="ville">ville* </label>
         <input id="ville" type="text" name="ville" maxlength="32" required>
      </p>
      <p>
         <label for="mail">mail* </label>
         <input id="mail" type="email"  name="mail"  maxlength="50" required>
      </p> 
	  	<p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
	  </fieldset>
</form>
</div>





