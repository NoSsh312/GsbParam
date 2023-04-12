<div class="tabs">
	
		<button class="tablinks" onclick="openTab(event, 'tab1')" id="defaultOpen">Cheveux</button>
		<?php 
		$i=2;
		foreach($lesCatSansCH as $cat){
			?>
			<button class="tablinks" onclick="openTab(event, 'tab<?php echo $i?>')"><?php echo $cat['libelle'] ?></button>
			<?php
			$i++;
		}
		?>
		
	</div>
	<?php
	$i=1;
foreach($lesCategories as $uneCategorie){
	
	?>


	<div id="tab<?php echo $i?>" class="tabcontent bis2">
	<h2 >Produit de la Catégorie: <span class="color-green"><?php echo $uneCategorie['libelle'] ?></span></h2>
	</br>	
	<div class="avis-wrapper">	
	<?php

	$lesProduitsDeCat = getLesProduitsDeCategorie($uneCategorie['id']);

	// parcours du tableau contenant les produits à afficher
		foreach( $lesProduitsDeCat as $unProduit) 
		{ 	// récupération des informations du produit
			$id = $unProduit['id'];
			$categorie = $unProduit['id_categorie'];
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
				<div class="info-card">
					<div class="prixCard"> A partir de <?php echo $prix."€" ?></div>
					<div class="stock">En Stock</div>
					<div class="voirProd"><button type="button" class="btn btn-outline-success" onclick="window.location.href = 'index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&action=voirInfoProduit&leProd=<?php echo $id ?>';">Voir</button></div>
				</div>
			</div>

<?php			
} // fin du foreach qui parcourt les produits
?>

	</div>
</div>
<?php
$i++;
}
?>
	



	

	

<div id="produits">

<?php
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

