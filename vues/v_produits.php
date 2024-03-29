<h1 class="center">Tous les produits</h1>
<?php if(isset($_SESSION['nomAdmin'])){ 
?><div class="center">
   <button type="button" class="btn btn-success"  onclick="window.location.href='index.php?uc=administrer&action=ajouterUnProduit';">Ajouter un produit</button>
   <button type="button" class="btn btn-warning"  onclick="window.location.href='index.php?uc=administrer&action=modifLesProduits';">Modifier un produit</button>
</div>
<?php }
?>
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
                  <input type="number" class="form-control" id="prixmin" name="prixmin" min=0 value="<?php if(isset($prixMin)){echo $prixMin;} ?>">
                  <div class="input-group-append">
                     <span class="input-group-text">€</span>
                  </div>
               </div>
            </div>
            <div class="priceMax">
			<p class="mb5">Maximum</p>
               <div class="input-group">
                  <input type="number" class="form-control" id="prixmax" name="prixmax" min=0 value="<?php if(isset($prixMax)){echo $prixMax;} ?>">
                  <div class="input-group-append">
                     <span class="input-group-text">€</span>
                  </div>
               </div>
            </div>
         </div> 
         <br>
         <?php 
            $result = "";
            if(isset($prixMin)&&isset($prixMax)&&isset($marque)){
               if($prixMin != "" && $prixMax != "" && $marque != '0'){ //toutes options
                $result = "Produit entre ".$prixMin."€ et ".$prixMax." € de la marque ".$libelleMarque['label_marque'];
             } 
             else{
                  if($prixMin =='' && $prixMax =='' && $marque != '0'){ // juste la marque
                     $result = "Produit de la marque ".$libelleMarque['label_marque'];
                  }
                  else{
                     if($prixMin !='' && $prixMax != '' && $marque == '0') //juste le prix{
                        $result = "Produit entre ".$prixMin."€ et ".$prixMax." €";
                     }
                  }
               }
               ?><p class="powered"><?php echo $result ?></p><?php
               ?>

         
        
         <hr>
         <div class="selectMarque">
         <select id="MarqueDuProd" name="MarqueDuProd" class="form-select" aria-label="Default select example">
                     <option value="0" selected>- Choisissez une marque -</option>
                     <?php 
                     foreach($lesMarques as $uneMarque){
                        $idmarque = $uneMarque['id'];
                        $libelleMarque = $uneMarque['label_marque'];
                        ?> 
                        <option value="<?php echo $idmarque ?>"><?php echo $libelleMarque  ?></option>
                        <?php
                     }
                     ?>
                  </select>
            </div>
			<button id="buttonSearchPrice" type="submit" class="btn btn-success">Filtrer</button>
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
            $categorie = $unProduit['id_categorie'];
            $stock =  nbDeProd($id);
            $stock =$stock['nbProduit'];
         
         	// affichage d'un produit avec ses informations
         	?>	
      <div class="card">
         <div class="descrCard"><?php echo $description ?></div>
         <div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
         <div class="desc_detail"><?php echo $detail ?></div>
         <div class="info-card">
            <div class="prixCard"><?php echo $prix."€" ?></div>
          
            <div class="stock"><?php if($stock != 0){ echo 'En Stock';} else{echo 'Indisponible';}?></div>
            <div class="buttonVoir" ><button type="button" class="btn btn-outline-success" onclick="window.location.href = 'index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&action=voirInfoProduit&leProd=<?php echo $id ?>';">Voir</button></div>
         </div>
      </div>
      <?php			
         } // fin du foreach qui parcourt les produits
         ?>
   </div>
</div>
