<div class="cat">

	<?php
	// parcours du tableau contenant les produits à afficher
	
	foreach ($categories as $uneCat) { // récupération des informations du produit
		$id = $uneCat['id'];
		$libelle = $uneCat['libelle'];

		// affichage d'un produit avec ses informations
		?>
		<div class="card catAdm">


			<div class="descrCard">
				<?php echo $libelle ?>
			</div>
			<div class="prixCard">
				<?php echo $id ?>
			</div>
			<a class="btn btn-outline-success"
				href="index.php?uc=gererCat&action=modifCat&cat=<?php echo $id ?>">Modifier</a>
			</br>
			<a class="btn btn-outline-success" onclick="return confirm('Voulez-vous vraiment supprimer cette Catégorie ?');"
				href="index.php?uc=gererCat&action=suppCat&cat=<?php echo $id ?>">Supprimer</a>


		</div>
	<?php
	} // fin du foreach qui parcourt les produits
	?>
</div>
<div>
	<?php if (isset($ok)) {
		if ($ok == false) {
			echo '<p style="text-align:center;">Produits restants dans cette catégorie, Impossible de la supprimer.</p>';
		} else {
			echo '<p style="text-align:center;">Catégorie supprimée !</p>';
		}

	} ?>
</div>
<div>
	<div class="cat">
		<a class="btn btn-outline-success" href="index.php?uc=gererCat&action=ajouterCat">Ajouter une Catégorie</a>
	</div>