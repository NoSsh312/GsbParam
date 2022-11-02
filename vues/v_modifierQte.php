<div id="produits">
<?php
$total=0;
foreach( $lesProduitsDuPanier as $unProduit) 
{
	// récupération des données d'un produit
	if($unProduit['id']==$_REQUEST['produit']){

	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];

	$qte=$unProduit['qte'];

	$total=$total+$prix*$qte;
	 	
	
	// affichage
	?>
	<div class="card">
	<div class="photoCard"><img src="<?php echo $image ?>" alt="image descriptive" /></div>
	<div class="descrCard"><?php echo $description; ?>	</div>
	<div class="prixCard"><?=$prix*$qte ?> € </div>
<form method="POST" action="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=modifierQteValide">
	<div class="qte">Quantité: <input id="quantiteModif" type="number" name="quantiteModif" value="<?php echo $qte;?>" max="20"> </div>
	

	<div class="imgCard"><a href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
	<img src="images/retirerpanier.png" TITLE="Retirer du panier" alt="retirer du panier"></a></div>
	<div id=valide-quantite>
		<input id="submit-modifQte" type="submit" name="submit-modifQte" onclick="return confirm('Modifier sa quantité ?');" value="Valider">
	
</div>
	</form>
	</div>
	
	<?php
}
}	

?>