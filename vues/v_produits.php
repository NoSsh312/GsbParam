<<<<<<< HEAD
<div id="produits">

<?php
// parcours du tableau contenant les produits à afficher
foreach( $lesProduits as $unProduit) 
{ 	// récupération des informations du produit
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$prix=$unProduit['prix'];
	$image = $unProduit['image'];
	// affichage d'un produit avec ses informations
	?>	
	<div class="card">
			<div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
			<div class="descrCard"><?php echo $description ?></div>
			<div class="prixCard"><?php echo $prix."€" ?></div>
	
			<form method="POST" id="form-id-qte" action="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=ajouterAuPanier">
				<div id="">
			<label id="label-quantite" for="quantiteNum" >Quantité : </label>
         		<input id="quantiteNum" type="number" name="quantiteNum" value="1" min=1 max=20 >
         	
         	<input id="logo-panier" type="image" name="submit" TITLE="Ajouter au panier" alt="Mettre au panier" src="images/mettrepanier.png" />
         </div>
         	</form>
			
	</div>
<?php			
} // fin du foreach qui parcourt les produits
?>
</div>
=======
<div id="produits">

<?php
// parcours du tableau contenant les produits à afficher
foreach( $lesProduits as $unProduit) 
{ 	// récupération des informations du produit
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$prix=$unProduit['prix'];
	$image = $unProduit['image'];
	// affichage d'un produit avec ses informations
	?>	
	<div class="card">
			<div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
			<div class="descrCard"><?php echo $description ?></div>
			<div class="prixCard"><?php echo $prix."€" ?></div>
	
			<form method="POST" id="form-id-qte" action="index.php?uc=voirProduits&produit=<?php echo $id ?>&action=ajouterAuPanier">
			
			<label id="label-quantite" for="quantiteNum" >Quantité : </label>
         		<input id="quantiteNum" type="number" name="quantiteNum" value="1" min=1 max=20 >
         	
         	<input id="logo-panier" type="image" name="submit" TITLE="Ajouter au panier" alt="Mettre au panier" src="images/mettrepanier.png" />
         
         	</form>
			
	</div>
<?php			
} // fin du foreach qui parcourt les produits
?>
</div>
>>>>>>> bdcf40c4a20e83f8804ac828515dad20f9ce9ef9
