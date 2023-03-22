<!-- <ul id="categories">
<?php

foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['id'];
	$libCategorie = $uneCategorie['libelle'];
	?>
	<li>
		<a href="index.php?uc=voirProduits&categorie=<?php echo $idCategorie ?>&action=voirProduits">
		<?php echo $libCategorie ?></a>
	</li>
<?php
}
?>
</ul> -->

<div id="categories">

<p id="title-filtre">Filtre</p>
	<HR noshade class="separation-cat">
	<p id="label-cat"> Catégories </p>
<form action="index.php?uc=voirProduits&action=voirProduits" method="POST">
    <select name="categorie" id="categorie" onchange="this.form.submit()" aria-label="Default select example">
    	<option value="#">-Choisir un filtre-</option>
        	<?php

foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['id'];
	$libCategorie = $uneCategorie['libelle'];
	?>

		<option  value=<?php echo $idCategorie; ?> > <?php echo $libCategorie; ?> </option>
	<?php } ?>
</select>
    
</form><!-- 
		<select onchange="location ='index.php?uc=voirProduits&categorie='+this.value+'&action=voirProduits'" class="form-select" aria-label="Default select example">
  		
  <option selected="">- Choisir un filtre - </option>

	<?php

foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['id'];
	$libCategorie = $uneCategorie['libelle'];
	?>

		<option  value=<?php echo $idCategorie; ?> > <?php echo $libCategorie; ?> </option>
	<?php } ?>
</select> -->

</div>