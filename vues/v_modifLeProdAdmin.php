<?php
foreach( $infoleprod as $uneInfoProd) 
{
	$id = $uneInfoProd['id'];
	$description = $uneInfoProd['description'];
	$image = $uneInfoProd['image'];
	$desc_detail = $uneInfoProd['desc_detail'];
	$idcategorie = $uneInfoProd['id_categorie'];
	$idmarque = $uneInfoProd['id_marque'];
}

?>
<div>
	<a href="#" onclick="javascript:history.back()" class="back-button">

		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M15.1464 18.1464C14.9512 18.3417 14.6348 18.3417 14.4396 18.1464L8.4396 12.1464C8.24438 11.9512 8.24438 11.6348 8.4396 11.4396L14.4396 5.4396C14.6348 5.24438 14.9512 5.24438 15.1464 5.4396C15.3417 5.63482 15.3417 5.95118 15.1464 6.1464L9.29289 12L15.1464 17.8536C15.3417 18.0488 15.3417 18.3652 15.1464 18.5604Z" fill="#ffffff"/>
		</svg>
		Retour
	</a>
</div>
<div class="container">
	<h2>Modifier le produit</h2>
	<div style="<?php if(isset($_POST['categorie'])){ echo 'display: none;'; } ?>">
		<form method="POST" id="formCategorie" style="" action="index.php?uc=administrer&produit=<?php echo $id ?>&action=modifValideContenance">

			<div class="form-group row">
				<label for="selectCategorie" class="col-sm-2 col-form-label">Contenance :</label>
				<div class="col-sm-8">
					<select class="form-control" id="selectCategorie" name="categorie" required>
						<option value="">Sélectionnez une contenance</option>
						<?php 
						foreach($contenance as $uneContenance){

							?><option value="<?php echo $uneContenance['qte']. '-'. $uneContenance['label_unite']; ?>"><?php echo  $qte = $uneContenance['qte']. '-'. $uneContenance['label_unite']; ?></option><?php 
						}
						?>
					</select>
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-primary">Valider</button>
				</div>
			</div>
		</form>
	</div>
	<?php 
	if(isset($leproduitaveccontenance)){
		
		foreach($leproduitaveccontenance as $unProd){
			$unite = $unProd['id_unite'];
			$qte = $unProd['qte'];
			$stock = $unProd['stock'];
			$prix = $unProd['prix'];

			?>
			<div id="autresChamps">
				<form method="POST" action="index.php?uc=administrer&produit=<?php echo $id ?>&action=modifValide">
					<div class="form-group row">
						<label for="inputId" class="col-sm-2 col-form-label">ID :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputId" name="inputId" value="<?php echo $id ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputDesc" class="col-sm-2 col-form-label">Description :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputDesc" name="inputDesc" value="<?php echo $description ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputImage" class="col-sm-2 col-form-label">Image :</label>
						<div class="col-sm-10">
							<input type="file" class="form-control-file" id="inputImage" name="inputImage" value="<?php echo $image  ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputDescDetail" class="col-sm-2 col-form-label">Description détaillée :</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="inputDescDetail" name="inputDescDetail" rows="3"><?php echo $desc_detail ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputIdCategorie" class="col-sm-2 col-form-label">ID Catégorie :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputIdCategorie" value="<?php echo $idcategorie ?>" name="inputIdCategorie">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputIdMarque" class="col-sm-2 col-form-label">ID Marque :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputIdMarque" value="<?php echo $idmarque ?>" name="inputIdMarque">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputIdUnite" class="col-sm-2 col-form-label">ID Unité :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputIdUnite" value="<?php echo $unite ?>" name="inputIdUnite" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputQte" class="col-sm-2 col-form-label">Quantité :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputQte" value="<?php echo $qte ?>" name="inputQte" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputStock" class="col-sm-2 col-form-label">Stock :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputStock" value="<?php echo $stock ?>" name="inputStock">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPrix" class="col-sm-2 col-form-label">Prix :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputPrix" value="<?php echo $prix ?>" name="inputPrix">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-primary">Modifier</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php }} ?>


