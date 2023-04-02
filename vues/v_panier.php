
<a href="#" onclick="javascript:history.back()" class="back-button">
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.1464 18.1464C14.9512 18.3417 14.6348 18.3417 14.4396 18.1464L8.4396 12.1464C8.24438 11.9512 8.24438 11.6348 8.4396 11.4396L14.4396 5.4396C14.6348 5.24438 14.9512 5.24438 15.1464 5.4396C15.3417 5.63482 15.3417 5.95118 15.1464 6.1464L9.29289 12L15.1464 17.8536C15.3417 18.0488 15.3417 18.3652 15.1464 18.5604Z" fill="#ffffff"/>
  </svg>
  Retour
</a>
<h2 id="votre-panier">Votre Panier</h2>
</br>
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
<div id="total">
	<p>Total : <?php echo $total."€"; ?></p>
</div>
	<?php if(isset($_SESSION['nomUtil'])){

		?>
		<div style="    display: flex;
    flex-direction: column;
    align-items: center;">
<div class="commande">
<a href="index.php?uc=gererPanier&action=passerCommande"><img src="images/commander.jpg" title="Passer commande" alt="Commander"></a></div>

<div class="viderLaCom">
<a id='link-vider' href="index.php?uc=gererPanier&action=viderPanier"> Vider Mon Panier</a>
</div>
	</div>
<?php } else echo "Pour commander veuillez vous connecter à un utilisateur CLIENT";?>

</div>
<br/>
