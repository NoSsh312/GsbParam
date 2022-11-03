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