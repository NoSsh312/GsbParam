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
  <div>
<a href="#" onclick="javascript:history.back()" class="back-button">

  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.1464 18.1464C14.9512 18.3417 14.6348 18.3417 14.4396 18.1464L8.4396 12.1464C8.24438 11.9512 8.24438 11.6348 8.4396 11.4396L14.4396 5.4396C14.6348 5.24438 14.9512 5.24438 15.1464 5.4396C15.3417 5.63482 15.3417 5.95118 15.1464 6.1464L9.29289 12L15.1464 17.8536C15.3417 18.0488 15.3417 18.3652 15.1464 18.5604Z" fill="#ffffff"/>
  </svg>
  Retour
</a>
</div>
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

<!-- <div class="imgCard">
    <a href="index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=ajouterAuPanier"> 
		<img src="images/mettrepanier.png" TITLE="Ajouter au panier" alt="Mettre au panier"> 
    </a>
</div>  -->
