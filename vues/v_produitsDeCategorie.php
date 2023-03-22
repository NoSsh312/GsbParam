<div id="produits">

<?php
// parcours du tableau contenant les produits à afficher
foreach( $lesProduits as $unProduit) 
{ 	// récupération des informations du produit
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$prix=$unProduit['prix'];
	$image = $unProduit['image'];
	$detail = $unProduit['desc_detail'];

	// affichage d'un produit avec ses informations
	?>	
	<div class="card">
		<div class="descrCard"><?php echo $description ?></div>
			<div class="photoCard"><img src="<?php echo $image ?>" alt=image /></div>
			<div class="desc_detail"><?php echo $detail ?></div>
		
			<!-- <div class="imgCard"><a href="index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=ajouterAuPanier"> 
			<img src="images/mettrepanier.png" TITLE="Ajouter au panier" alt="Mettre au panier"> </a></div> -->
		<div class="info-card">
			<div class="prixCard"> A partir de <?php echo $prix."€" ?></div>
			<div class="stock">En Stock</div>
			<div class="voirProd"><a href="index.php?uc=voirProduits&action=voirInfoProduit&leProd=<?php echo $id ?>">Voir</a></div>
        </div>
	</div>
<?php			
} // fin du foreach qui parcourt les produits
if(isset($_SESSION['nomAdmin'])){?>
	<div class=actions>
<div id="button-modif-prod">
<a id="link-modif-prod" href="index.php?uc=administrer&action=modifLesProduits&categorie=<?php echo $categorie ?>">Modifier les produits de catégorie <?php echo $categorie ?></a>
</div>
<div id="button-ajouter-prod">
<a id="link-ajouter-prod" href="index.php?uc=administrer&action=ajouterUnProduit&categorie=<?php echo $categorie ?>">Ajouter des produits de catégorie <?php echo $categorie ?></a>
</div>
</div>
<?php
}
?>

</div>
