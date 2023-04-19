<div id="AjoutDUnProd">
   <form method="POST" action="index.php?uc=administrer&action=ajouterUnProduitR">
     <fieldset>
       <legend>Ajout d'un Produit</legend>
       <p>
         <label class="response" for="ajoutIdProd">ID du produit*</label>
         <input id="ajoutIdProd" type="text" name="ajoutIdProd" required>
      </p>
      <p>
         <label class = "response" for="ajoutDescription" >Description*</label>
         <input id="ajoutDescription" type="text" name="ajoutDescription" required >
      </p>
      <p>
         <label class="response" for="ajoutPrix">Prix*</label>
         <input id="ajoutPrix"name="ajoutPrix"  type="number" max=9999999999.99 min=0.01 step=0.01 required> € 
      </p>

      <p>
         <label class="response" for="ajoutPhoto">Photo de l'article*</label>
         <input type="file" id="ajoutPhoto" name="ajoutPhoto" accept="image/*" maxlength="100" required>

      </p>
      <p>
         <label for="desc_detail">Description*</label>
         <textarea id="desc_detail" name="desc_detail" rows="4" cols="50"></textarea>
      </p>
      <p>
         <label class="response" for="ajoutIdCategorie">ID Catégorie*(CH/PS/FO uniquement)</label>
         <input id="ajoutIdCategoriec" type="text" name="ajoutIdCategorie" maxlength="2" required>
      </p>
      <p>
         <label class="response" for="stockdispo">Stock disponible*</label>
         <input id="stockdispo" type="text" name="stockdispo" maxlength="" required>
      </p>
      <p>
         <label class="response" for="ajoutQte">Quantité*</label>
         <input id="ajoutQte" type="text" name="ajoutQte"  required>
      </p>
      <select id="select-unite" name="select-unite" class="form-select response" aria-label="Default select example">
       <option disabled selected>Chosissez l'unite?</option>
       <?php
       foreach($lesUnites as $uneUnite){
         $idUnite = $uneUnite['id'];
         $libelleUnite = $uneUnite['label_unite'];
         ?> <option value="<?php echo $idUnite ?>"><?php echo $libelleUnite ?></option><?php
      }
      ?>
   </select>
   <select id="select-marque" name="select-marque" class="form-select response" aria-label="Default select example">
      <option disabled selected>Chosissez la marque?</option>
      <?php
      foreach($lesMarques as $uneMarque){
         $idMarque = $uneMarque['id'];
         $libelleMarque = $uneMarque['label_marque'];
         ?> <option value="<?php echo $idMarque ?>"><?php echo $libelleMarque ?></option><?php
      }
      ?>
   </select>




   <p class ="envoyer">
      <input type="submit" value="Valider" name="valider">
      <input type="reset" value="Annuler" name="annuler"> 
   </p>
</fieldset>
</form>
</div>