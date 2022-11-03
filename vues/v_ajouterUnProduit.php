<div id="AjoutDUnProd">
	<?php if(isset($categorie)){?>
<form method="POST" action="index.php?uc=administrer&action=ajouterUnProduitR&categorie=<?php echo $categorie; ?>">
<?php }else{?>
	<form method="POST" action="index.php?uc=administrer&action=ajouterUnProduitR"><?php } ?>
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
      
      	<?php if(isset($categorie)){ ?>
      		<p>
         <label class="response" for="ajoutIdCategorie">ID Catégorie*(CH/PS/FO uniquement)</label>
         <input id="ajoutIdCategoriec" type="text" name="ajoutIdCategorie" maxlength="32"  value="<?php echo $categorie; ?>" disabled required>
         </p>
<?php } else { ?>
	<p>
         <label class="response" for="ajoutIdCategorie">ID Catégorie*(CH/PS/FO uniquement)</label>
         <input id="ajoutIdCategoriec" type="text" name="ajoutIdCategorie" maxlength="32" required>
    </p>
     <?php } ?>
      
      
      
      
      <p class ="envoyer">
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
     </fieldset>
</form>
</div>