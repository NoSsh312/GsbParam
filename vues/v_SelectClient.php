<div class="cat">

	<?php

	?>	
	<div class="card catAdm" style="width:50%;">
		<form action="index.php?uc=gererCommandes&action=CommandeClient" method="POST" style="display:flex;">
<select id="selectCli" name="selectCli" style="width:70%;" required>

<option value="">Choisir un Client</option>
<?php 
	foreach( $lesCli as $uncli) 
{ 	// récupération des informations du produit
	$id = $uncli['idCli'];
	$nom = $uncli['nomUtil'];
?>
<option value="<?php echo $id ?>"><?php echo $nom ?></option>
<?php
}
	?>



</select>
<input type="submit" name="submit" value="Selectionner" class="btn btn-outline-success">
</form>

		</div>
		<?php			

?>
</div>

