<?php


foreach( $lesProduits as $unProduit) 
{
	// récupération des données d'un produit
	if($unProduit['id']==$_REQUEST['produit']){

	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];

	

	
	 	
	
	// affichage
	?>
	<form method="POST" action="index.php?uc=administrer&produit=<?php echo $id ?>&action=modifValide">
		<div class="file-for-photo">
			<p>Changer la photo si besoin :</p>
		<input type="file" id="photoCardModif" name="photoCardModif" accept="image/*" maxlength="100">
		</div>
<div id="produits">

	
	<div class="card">
	
	<div class="photoCard"><img src="<?php echo $image ?>" alt="image descriptive" /></div>
	
	<div class="descrCard">

		<textarea id="descProdModif" name="descProdModif" maxlength="50"><?php echo $description; ?></textarea>	
	</div>
	<div class="prixCard2">
		<input id="modifPrix" type="number" name="modifPrix" value="<?=$prix ?>" max=9999999999.99 min=0.01 step=0.01> € </div>


	
	</div>
	<div id="final-submit">
	<input type="submit" id="submitModifDuProd" name="submitModifDuProd" value="Modifier" onclick="return confirm('Valider l(a/es) modification(s) ?');">
</div>
	</form>
	<?php
}
}	

?>