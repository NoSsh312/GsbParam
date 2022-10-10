<div class="group-form">
<div id="connexion">
<form method="POST" action="index.php?uc=seConnecter&action=connexion">
   <fieldset>
     <legend>Se Connecter</legend>
		<p>
			<label for="nomUtil" >Nom d'utilisateur*</label>
			<input id="nomUtil" type="text" name="nomUtil" required>
		</p>
      
		<p>
			<label for="mdp" >Mot de passe*</label>
			 <input id="mdp" type="password" name="mdp" required>
		</p>
		
	  	<p class ="envoyer">
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
	  </fieldset>
</form>
</div>
<div id="link-insc">
<a href="index.php?uc=seConnecter&action=inscription" >Pas encore inscrit ?</a>
</div>
</div>