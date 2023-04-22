<div id="accueil" >

<h1 id="TitreAcc" class="acc">La société GsbPara,</h1>

<h2 id="Titre2Acc" class="acc"> vous souhaite la bienvenue sur son site de vente en ligne ,</h2>

<p id="TextAcc" class="acc">de produits paramédicaux et bien-être  </p>

<p class="acc">à destination des particuliers.</p>

<p class="acc">Avec plus de 2000 produits paramédicaux à la vente, GsbPara vous propose à 
un tarif compétitif un large panel de produits livré rapidement chez vous !</p>
</div>

<h1 class="center">Toutes les nouveautés :</h1>

<div id="Allproduits" style="width: 100%;justify-content: center;">
      <?php
         // parcours du tableau contenant les produits à afficher
         foreach( $lesNouv as $unProduit) 
         { 	// récupération des informations du produit
         	$id = $unProduit['id'];
         	$description = $unProduit['description'];
         	$prix=$unProduit['prix'];
         	$image = $unProduit['image'];
         	$detail = $unProduit['desc_detail'];
            $categorie = $unProduit['id_categorie'];
         
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