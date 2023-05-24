
<?php

foreach ($infoleprod as $uneInfoProd) {
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
			<path
				d="M15.1464 18.1464C14.9512 18.3417 14.6348 18.3417 14.4396 18.1464L8.4396 12.1464C8.24438 11.9512 8.24438 11.6348 8.4396 11.4396L14.4396 5.4396C14.6348 5.24438 14.9512 5.24438 15.1464 5.4396C15.3417 5.63482 15.3417 5.95118 15.1464 6.1464L9.29289 12L15.1464 17.8536C15.3417 18.0488 15.3417 18.3652 15.1464 18.5604Z"
				fill="#ffffff" />
		</svg>
		Retour
	</a>
</div>
<div class="container">
	<h2>Modifier le produit</h2>
	<div style="<?php if (isset($_POST['categorie'])) {
		echo 'display: none;';
	} ?>">
		<form method="POST" id="formCategorie" style=""
			action="index.php?uc=administrer&produit=<?php echo $id ?>&action=modifValideContenance">

			<div class="form-group row">
				<label for="selectCategorie" class="col-sm-2 col-form-label">Contenance :</label>
				<div class="col-sm-8">
					<select class="form-control" id="selectCategorie" name="categorie" required>
						<option value="">Sélectionnez une contenance</option>
						<?php
						foreach ($contenance as $uneContenance) {

							?>
							<option value="<?php echo $uneContenance['qte'] . '-' . $uneContenance['label_unite']; ?>"><?php echo $qte = $uneContenance['qte'] . '-' . $uneContenance['label_unite']; ?></option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-primary">Valider</button>
				</div>
			</div>


		</form>
					</br>
<p>Gérer les suggestions : </p>
					</br>
		<form method="POST" action="index.php?uc=administrer&produit=<?php echo $id ?>&action=modifSug">
			<div id="divspeciality">
				<?php
				$i = 0;
				if(!empty($suggestions)){
				foreach ($suggestions as $uneSuggestion) {
					$idPSugg=getInfoProdunique($uneSuggestion['id_produit']);
				
						$i++;
						?>
						<div id="divspecialite<?php echo $i; ?>">
							<select style="width: 85%;" class="w-90" name="specialite<?php echo $i; ?>"
								id="specialite<?php echo $i; ?>">
								<option value="<?php echo $idPSugg['id']; ?>"><?php echo $idPSugg['description']; ?></option>
								<?php
								foreach ($tousProd as $unprod) {
								
									$speid = $unprod['id'];
									$spelib = $unprod['description'];
									if ($speid != $uneSuggestion['id_produit']) {
										?>
										<option value="<?php echo $speid; ?>"><?php echo $spelib; ?></option>
										<?php
									}
								}
								?>
							</select>
							<button type="button" onclick="removeSelect(<?php echo $i ?>)">🗙</button>

						</div>
						<?php
					
				}}
				?>
			</div>
			<p class="text-center"><button type="button" onclick="addSelectList(<?php echo $i ?>)">ajouter</button></p>
			<input type="submit" class="btn btn-primary"  value="Valider">
		</form>



	</div>
	<?php
	if (isset($leproduitaveccontenance)) {

		foreach ($leproduitaveccontenance as $unProd) {
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
							<input type="text" class="form-control" id="inputId" name="inputId" value="<?php echo $id ?>"
								readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputDesc" class="col-sm-2 col-form-label">Description :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputDesc" name="inputDesc"
								value="<?php echo $description ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputImage" class="col-sm-2 col-form-label">Image :</label>
						<div class="col-sm-10">
							<input type="file" class="form-control-file" id="inputImage" name="inputImage"
								value="<?php echo $image ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputDescDetail" class="col-sm-2 col-form-label">Description détaillée :</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="inputDescDetail" name="inputDescDetail"
								rows="3"><?php echo $desc_detail ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputIdCategorie" class="col-sm-2 col-form-label">ID Catégorie :</label>
						<div class="col-sm-10">
							<select class="form-control" id="inputIdCategorie" name="inputIdCategorie">
								<option value="<?php echo $idcategorie ?>"><?php echo $idcategorie . '-' . $CatIDProd ?>
								</option>
								<?php
								// Boucle pour afficher les options de la liste déroulante
								foreach ($touteslescat as $categorie) {
									if ($categorie['id'] != $idcategorie) {
										$catID = $categorie['id'];
										$catlib = $categorie['libelle'];
										?>
										<option value="<?php echo $catID ?>"><?php echo $catID . '-' . $catlib ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="inputIdMarque" class="col-sm-2 col-form-label">ID Marque :</label>
						<div class="col-sm-10">
							<select class="form-control" id="inputIdMarque" name="inputIdMarque">
								<?php
								foreach ($marqueDuProd as $lamarque) {
									$marq = $lamarque['id_marque'];
									$marqlib = $lamarque['label_marque'];

									?>
									<option value="<?php echo $marq ?>"><?php echo $marq . '-' . $marqlib ?></option>
								<?php }
								// Boucle pour afficher les options de la liste déroulante
								foreach ($toutesLesMarques as $marque) {
									if ($marque['id'] != $lamarque['id_marque']) {
										$marqueID = $marque['id'];
										$marquelibelle = $marque['label_marque'];
										?>
										<option value="<?php echo $marqueID ?>"><?php echo $marqueID . '-' . $marquelibelle ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="inputIdUnite" class="col-sm-2 col-form-label">ID Unité :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputIdUnite" value="<?php echo $unite ?>"
								name="inputIdUnite" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputQte" class="col-sm-2 col-form-label">Quantité :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputQte" value="<?php echo $qte ?>" name="inputQte"
								readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputStock" class="col-sm-2 col-form-label">Stock :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputStock" value="<?php echo $stock ?>"
								name="inputStock">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPrix" class="col-sm-2 col-form-label">Prix :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="inputPrix" value="<?php echo $prix ?>"
								name="inputPrix" step=0.01 min=0.01 max=999999999999.99>
						</div>
					</div>


					<div>

						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-primary">Modifier</button>
							</div>
						</div>
					</div>
				</form>
			
			</div>
		<?php }
	} ?>

<script>

/**
* Add tag in the other tag 
* @param {HTMLElement} other the other tag
* @param {string} type the type of new tag
* @param {JSON} array dictionary of attributes of tag with key = name of attributes and value = the value of the attribute 
* @param {Boolean} isAppend if append or prepend by default true
* @returns the new tag created
*/
function addTagInOther(other, type, array, isAppend = true) {
	var tag = createTag(type, array); //HTMLElement
	if (isAppend) {
		other.appendChild(tag);
	}
	else {
		other.prepend(tag);
	}
	return tag;
}
/**
 * Create tag before put it in other one
 * @param {string} type the type of the tag 
 * @param {JSON} array dictionary of attributes of tag with key = name of attributes and value = the value of the attribute
 * @returns the new tag created
 */
function createTag(type, array) {
	var tag = document.createElement(type); //HTMLElement
	for (var key in array) {
		tag.setAttribute(key, array[key]);
	}
	return tag;
}

/**
 * Add tag in the element with the id
 * @param {string} id the id of element 
 * @param {string} type the type of new tag
 * @param {JSON} array dictionary of attributes of tag with key = name of attributes and value = the value of the attribute
 * @returns the new tag created
 */
function addTagId(id, type, array) {
	var tag = createTag(type, array); //HTMLElement
	document.getElementById(id).append(tag);
	return tag;
}

function removeSelect(option) {
	console.log(option);
	const select = document.getElementById("divspecialite" + option);
	select.remove(select);

}


function addSelectList(option) {
	var i = getNumberOFChild();
	i = i + 1;
	var divspe = document.getElementById('divspeciality');
	var div4select = addTagInOther(divspe, 'div', { 'id': 'divspecialite' + i });
	var select = addTagInOther(div4select, 'select', { 'class': 'w-90', 'style': 'width: 85%;', 'id': 'specialite' + i, 'name': 'specialite' + i });
	var otherOption;

	<?php
	foreach ($tousProd as $unprod) {
		$speid = $unprod['id'];
		$spelib = $unprod['description'];
		?>
		otherOption = addTagInOther(select, 'option', {});
		otherOption.innerHTML = "<?php echo $speid . '-' . $spelib ?>";
		otherOption.value = "<?php echo $speid ?>";

	<?php } ?>

	var erasedButton = addTagInOther(div4select, 'button', { 'type': 'button' });
	erasedButton.innerHTML = "🗙";
	erasedButton.onclick = function () { removeSelect(i) };
}


function getNumberOFChild() {
	var element = document.getElementById("divspeciality");
	var numberOfChildren = element.children.length;
	document.cookie = 'numbersofspecialities=' + numberOfChildren;
	return numberOfChildren;
}



</script>