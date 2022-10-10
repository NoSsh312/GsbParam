
<div id="inscription">
<form method="POST" action="index.php?uc=seConnecter&action=inscriptionR">
   <fieldset>
     <legend>S'inscrire</legend>
      <p>
         <label class="response" for="nomUtil2">Nom d'utilisateur*</label>
         <input id="nomUtil2" type="text" name="nomUtil2" required>
      </p>
      <p>
      <label class = "response" for="mdp" >Mot de passe*</label>
       <input id="mdp" type="password" name="mdp" required>
    </p>
      <p>
         <label class="response" for="nomInsc">Nom*</label>
         <input id="nomInsc" type="nomInsc" name="nomInsc" size="30" maxlength="32" required>
      </p>
         
       <p>
         <label class="response" for="adresseInsc">Adresse*</label>
         <input id="adresseInsc" type="text" name="adresseInsc" size="30" maxlength="32" placeholder="Ex: 13 rue des champs"required>
      </p>
      <p>
         <label class="response" for="villeInsc">Ville*</label>
         <input id="villeInsc" type="text" name="villeInsc" maxlength="32" required>
      </p>
      <p>
         <label class="response" for="codePostInsc">Code Postal*</label>
         <input id="codePostInsc" type="text" name="codePostInsc" size="5" maxlength="5" required>
      </p>
         <p>
         <label class="response" for="tel">Téléphone*</label>
         <input id="tel" type="tel" name="tel" minlength="10" maxlength="10" placeholder="Ex: 0654951284" required>
      </p>
         <p>
         <label class="response" for="courriel">Courriel*</label>
         <input id="courriel" type="email" name="courriel" maxlength="32"required>
      </p>
      
      
      <p class ="envoyer">
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
     </fieldset>
</form>
</div>