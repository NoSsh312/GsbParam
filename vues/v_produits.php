<h1 class="center">Tous les produits</h1>
<p>test pour savoi si je suis e cakajefjzbfjbfhszdyfzbef</p>
<div id="divGlobal">
<div id="divSeachProducts">
   <div id="searchproduct">
      <div class="cadre center">
         <form method="POST" action="index.php?uc=administrer&action=gererProduitPrix">
         <h3>Filtre</h3>
         <hr>
         <p class="center">Prix</p>
         <div class="price">
            <div class="priceMin">
				<p class="mb5">Minimum</p>
               <div class="input-group">
                  <input type="number" class="form-control" id="prixmin" name="prixmin" value="<?php if(isset($prixMin)){echo $prixMin;} ?>">
                  <div class="input-group-append">
                     <span class="input-group-text">€</span>
                  </div>
               </div>
            </div>
            <div class="priceMax">
			<p class="mb5">Maximum</p>
               <div class="input-group">
                  <input type="number" class="form-control" id="prixmax" name="prixmax" value="<?php if(isset($prixMax)){echo $prixMax;} ?>">
                  <div class="input-group-append">
                     <span class="input-group-text">€</span>
                  </div>
               </div>
            </div>
         </div> 
         <br>
         <?php if(isset($prixMin) && isset($prixMax)){
            ?><p class="powered">Produit entre <?php echo $prixMin; ?> € et <?php  echo $prixMax; ?> €</p><?php
         } 
         ?>
         
        
         <hr>
         <div class="selectMarque">
            <select class="form-select" aria-label="Default select example">
               <option selected>- Choisissez une marque -</option>
               <option value="1">One</option>
               <option value="2">Two</option>
               <option value="3">Three</option>
            </select>
            </div>
			<button id="buttonSearchPrice" type="submit" class="btn btn-success" onclick="verifPrixBienInferieurACeQueLonSouhaiteSinonCaMarchePas()">Filtrer</button>
         </div>
      </div>
   </form>
   </div>
   <div id="Allproduits">
      <?php
         // parcours du tableau contenant les produits à afficher
         foreach( $lesProduits as $unProduit) 
         { 	// récupération des informations du produit
         	$id = $unProduit['id'];
         	$description = $unProduit['description'];
         	$prix=$unProduit['prix'];
         	$image = $unProduit['image'];
         	$detail = $unProduit['desc_detail'];
            $categorie = $unProduit['idCategorie'];
         
         	// affichage d'un produit avec ses informations
         	?>	
      <div class="card">
         <div class="descrCard"><?php echo $description ?></div>
         <div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
         <div class="desc_detail"><?php echo $detail ?></div>
         <div class="info-card">
            <div class="prixCard">A partir de <?php echo $prix."€" ?></div>
            <div class="stock">En Stock</div>
            <div class="buttonVoir" ><button type="button" class="btn btn-outline-success" onclick="window.location.href = 'index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&action=voirInfoProduit&leProd=<?php echo $id ?>';">Voir</button></div>
         </div>
      </div>
      <?php			
         } // fin du foreach qui parcourt les produits
         ?>
   </div>
</div>
<?php 
   if(isset($_SESSION['nomAdmin'])){?>
<div class=actions>
   <div id="button-modif-prod">
      <a id="link-modif-prod" href="index.php?uc=administrer&action=modifLesProduits">Modifier les produits</a>
   </div>
   <div id="button-ajouter-prod">
      <a id="link-ajouter-prod" href="index.php?uc=administrer&action=ajouterUnProduit">Ajouter des produits</a>
   </div>
</div>
<?php
   }
   ?>