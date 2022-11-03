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

		<?php if(isset($categorie)){?>
<form id="form-modifAdmin" method="POST" action="index.php?uc=administrer&produit=<?php echo $id; ?>&action=modifLeProduit&categorie=<?php echo $categorie; ?>">
<?php }else{?>
	<form id="form-modifAdmin" method="POST" action="index.php?uc=administrer&produit=<?php echo $id; ?>&action=modifLeProduit"><?php } ?>

			<div id="div-for-inputModifier">
				<input id="modifierCardProd" type="submit" name="modifierCardProd" value="Modifier" >
			</div>
		</form>

		<?php if(isset($categorie)){?>
<form id="form-deleteProd" method="POST" action="index.php?uc=administrer&produit=<?php echo $id; ?>&action=supprimerProd&categorie=<?php echo $categorie; ?>">
<?php }else{?>
	<form id="form-deleteProd" method="POST" action="index.php?uc=administrer&produit=<?php echo $id; ?>&action=supprimerProd"><?php } ?>
			<div id="div-for-inputSupprimer">
				<input id="supprimerCardProd" type="submit" name="supprimerCardProd" value="Supprimer" onclick="return confirm('Voulez-vous réellement supprimer cet article ?');">
			</div>
		</form>
		</div>
		<?php			
} // fin du foreach qui parcourt les produits
?>
</div>
