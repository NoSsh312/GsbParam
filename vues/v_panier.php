<div><img src="images/panier.gif"	alt="Panier" title="panier"/></div>
<div id="produits">
<?php
$total=0;
foreach( $lesProduitsDuPanier as $unProduit) 
{
	// récupération des données d'un produit
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

	<div class="qte">Quantité: <?php echo $qte;?></div>
	

	<div class="imgCard"><a href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
	<img src="images/retirerpanier.png" TITLE="Retirer du panier" alt="retirer du panier"></a></div>
	<div id=valide-quantite>
		<a id="link-modif" href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=modifierQte" onclick="return confirm('Voulez-vous modifier sa quantité ?');">Modifier</a>
	
</div>
	
	</div>
	
	<?php
}	

?>

</div>

<div class="actions">
	<?php if(isset($_SESSION['nomUtil'])){

		?>
<div class="commande">
<a href="index.php?uc=gererPanier&action=passerCommande"><img src="images/commander.jpg" title="Passer commande" alt="Commander"></a></div>

<div class="viderLaCom">
<a id='link-vider' href="index.php?uc=gererPanier&action=viderPanier"> Vider Mon Panier</a>
</div>
<?php } else echo "Pour commander veuillez vous connecter à un utilisateur CLIENT";?>
<div id="total">
	<p>Total : <?php echo $total."€"; ?></p>
</div>
</div>
<br/>
