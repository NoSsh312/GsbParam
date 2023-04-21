<div class="cat">
<form action="index.php?uc=gererCat&action=ajouterCat" method="POST" id="formCat">
    <label for="idCat">ID de la catégorie : </label>
    <input type="text" name="idCat" maxlength=2 required>
</br>
    <label for="lableCat">Libelle de la Catégorie :</label>
    <input type="text" name="labelCat" maxlength=20 required>
</br>
    <input type="submit" name="submit" value="Ajouter" class="btn btn-outline-success"  onclick="return confirm('Voulez-vous vraiment ajouter cette Catégorie ?');">
</form>
<?php if(isset($ok) ){
    if($ok==true){
    echo 'Ajout de la catégorie Réussi';
} else{
    echo 'Ajout de la catégorie Échoué';

}}?>
</div>