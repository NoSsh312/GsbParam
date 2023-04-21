<div class="cat">
<form action="index.php?uc=gererCat&action=modifCat&cat=<?php echo $idCatOld ?>" method="POST" id="formCat">
    <label for="idCat">ID de la catégorie : </label>
    <input type="text" name="idCat" maxlength=2  value="<?php echo $idCat ?>" required>
</br>
    <label for="lableCat">Libelle de la Catégorie :</label>
    <input type="text" name="labelCat" maxlength=20 value="<?php echo $libelleCat ?>"required>
</br>
    <input type="submit" name="submit" value="Modifier" class="btn btn-outline-success"  onclick="return confirm('Voulez-vous vraiment modifier cette Catégorie ?');">
</form>
<?php if(isset($ok) ){
    if($ok==true){
    echo 'Modification  de la catégorie Réussi';
} else{
    echo 'Modification de la catégorie Échoué';

}}?>
</div>