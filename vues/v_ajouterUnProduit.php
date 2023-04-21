<div id="AjoutDUnProd">
   <form method="POST" action="index.php?uc=administrer&action=ajouterUnProduitR">
     <fieldset>
       <legend>Ajout d'un Produit</legend>
       <div class="form-group row">
         <label for="ajoutIdProd" class="col-sm-3 col-form-label">ID*</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" id="ajoutIdProd" name="ajoutIdProd" REQUIRED>
         </div>
      </div>
      <div class="form-group row">
         <label for="ajoutDescription" class="col-sm-3 col-form-label">Description*</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" id="ajoutDescription" name="ajoutDescription" REQUIRED>
         </div>
      </div>
      <div class="form-group row">
         <label for="ajoutPrix" class="col-sm-3 col-form-label">Prix*</label>
         <div class="col-sm-10">
            <input type="number" class="form-control" id="ajoutPrix" name="ajoutPrix" step=0.01 min=0.01 max=999999999999.99 REQUIRED>
         </div>
      </div>
      <div class="form-group row">
         <label for="ajoutPhoto" class="col-sm-3 col-form-label">Photo de l'article</label>
         <div class="col-sm-10">
            <input type="file" class="form-control-file" id="ajoutPhoto" name="ajoutPhoto">
         </div>
      </div>
      <div class="form-group row">
         <label for="desc_detail" class="col-sm-3 col-form-label">Description*</label>
         <div class="col-sm-10">
            <textarea class="form-control" id="desc_detail" name="desc_detail" rows="3"></textarea>
         </div>
      </div>
      <div class="form-group row">
         <label for="ajoutIdCategorie" class="col-sm-3 col-form-label">ID Catégorie (CH/PS/FO uniquement)*</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" id="ajoutIdCategorie"  name="ajoutIdCategorie" REQUIRED>
         </div>
      </div>
      <div class="form-group row">
         <label for="stockdispo" class="col-sm-3 col-form-label">Stock disponible*</label>
         <div class="col-sm-10">
            <input type="number" class="form-control" id="stockdispo"  name="stockdispo" REQUIRED>
         </div>
      </div>
      <div class="form-group row">
         <label for="ajoutQte" class="col-sm-3 col-form-label">Quantité :</label>
         <div class="col-sm-10">
            <input type="number" class="form-control" id="ajoutQte"  name="ajoutQte" REQUIRED >
         </div>
      </div>
      <div class="form-group row">
         <label for="inputIdUnite" class="col-sm-3 col-form-label">ID Unité :</label>
         <div class="col-sm-10">
            <select id="select-unite" name="select-unite" class="form-select response" aria-label="Default select example" REQUIRED>
             <option disabled selected>Chosissez l'unite?</option>
             <?php
             foreach($lesUnites as $uneUnite){
               $idUnite = $uneUnite['id'];
               $libelleUnite = $uneUnite['label_unite'];
               ?> <option value="<?php echo $idUnite ?>"><?php echo $libelleUnite ?></option><?php
            }
            ?>
         </select>
      </div>
   </div>
   <div class="form-group row">
      <label for="inputIdMarque" class="col-sm-3 col-form-label">ID Marque :</label>
      <div class="col-sm-10">
         <select id="select-marque" name="select-marque" class="form-select response" aria-label="Default select example" REQUIRED>
            <option disabled selected>Chosissez la marque?</option>
            <?php
            foreach($lesMarques as $uneMarque){
               $idMarque = $uneMarque['id'];
               $libelleMarque = $uneMarque['label_marque'];
               ?> <option value="<?php echo $idMarque ?>"><?php echo $libelleMarque ?></option><?php
            }
            ?>
         </select>
      </div>
   </div>




   <p class ="envoyer">
      <input type="submit" value="Valider" name="valider">
      <input type="reset" value="Annuler" name="annuler"> 
   </p>
</fieldset>
</form>
</div>

</div>