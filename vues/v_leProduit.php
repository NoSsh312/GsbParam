<?php foreach($leProd as $uneInfo){
    $description = $uneInfo['description'];
    $prix = $uneInfo['prix'];
    $image = $uneInfo['image'];
    $idCategorie = $uneInfo['id_categorie'];
    $desc_detail = $uneInfo['desc_detail'];
}
?>

<!-- <div class="imgCard">
    <a href="index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=ajouterAuPanier"> 
		<img src="images/mettrepanier.png" TITLE="Ajouter au panier" alt="Mettre au panier"> 
    </a>
</div>  -->
<a href="#" onclick="javascript:history.back()" class="back-button">
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.1464 18.1464C14.9512 18.3417 14.6348 18.3417 14.4396 18.1464L8.4396 12.1464C8.24438 11.9512 8.24438 11.6348 8.4396 11.4396L14.4396 5.4396C14.6348 5.24438 14.9512 5.24438 15.1464 5.4396C15.3417 5.63482 15.3417 5.95118 15.1464 6.1464L9.29289 12L15.1464 17.8536C15.3417 18.0488 15.3417 18.3652 15.1464 18.5604Z" fill="#ffffff"/>
  </svg>
  Retour
</a>
<div class="displayflex">
  <div class="divleft">

<div class="wrapper-leProd">
<div class="wrapper-infoAvisProd">
<div class="card-container">
<div class="card3 card-bis">
  <div class="card-header card-header-bis">
    <img class="img-vleprod img-product" src="<?php echo $image ?>" alt="<?php echo $description ?>" >
  </div>
  <div class="card-body card-body-bis">
    <h2 class="card-title title-product"><?php echo $description ?></h2>
    <p class="text-product">Produit de la marque "" et de la catégorie ""</p>
    <h5 class="underline">Description:</h5>
    <p class="card-description"><?php echo $desc_detail ?></p>
   
    <p class="center">2 avis pour ce produit</p>
    <div style="text-align:center;">
    <button class="center open-button"  onclick="openForm()">Donner un avis</button>
</div>
    <div style="position:absolute;">
    <div class="card-container form-popup" style="position:absolute;z-index:15;" id="myForm">
  <div class="card3" style="width:50vw; height:50vw;">
    <div class="card-header avis-header" >
      <div class="card-body">
  <form action="/action_page.php" class="form-container">
   

    <label for="title"><b>Sujet</b></label>
    <input type="text" placeholder="Titre du Commentaire" name="title" required>

    <label for="descriptionC"><b>Description</b></label>
    <input type="textarea" placeholder="Description" name="descriptionC" required>

    <button type="submit" class="btn">Envoyer</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
  </form>
</div>
</div>
</div>
</div>
</div>
    <hr>
    <form action="index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&produit=<?php echo $idProduit ?>&action=ajouterAuPanier" method="POST">
    <div id="forSelect">
      <div id="nameSelect">
        <p>Contenance : </p>
      </div>
      <div id="select-list">
        <select id="select-contenance" class="form-select" aria-label="Default select example" onchange="myFunction()">
          <option selected>Choisir la contenance</option>
          <?php 
          foreach($contenance as $uneContenance){
   
            ?><option value="<?php echo $uneContenance['qte']. '-'. $uneContenance['label_unite']; ?>"><?php echo  $qte = $uneContenance['qte']. '-'. $uneContenance['label_unite']; ?></option><?php 
          }
          ?>
        
        </select>
      </div>
    </div>
    <div class="info-prix-etc">
      <p class="card-price" id="priceproduct">Prix: <?php echo $prix ?>€ &nbsp </p>
      <p id="stockproduct">En Stock &nbsp</p> <!-- condition reste du stock ou pas  -->
      <p class="exemplaire" id="exemplaire">( exemplaire restants) </p>
    </div>

    <div class="input-group div-qte">
      <select class="custom-select select-qte" id="inputGroupSelect04">
       <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    <div class="input-group-append div-send">
    <button class="btn btn-outline-success btn-send" type="button">Ajouter au panier</button>
  </div>
</div>
</form>
</div>
</div>
</div>

<div class="card-container">
  <div class="card3">
    <div class="card-header avis-header">
      <div class="card-body">
      <h2 class="card-title">Avis</h2>
      <hr>
      <?php 
      foreach($lesAvis as $unAvis){
        
        $titre_commentaire=$unAvis['titre_commentaire'];
        $commentaire=$unAvis['commentaire'];
        $date_avis=$unAvis['date_avis'];
        $nomUtil=$unAvis['nomUtil'];

?>
<div class="unAvis-wrapper"> 
  <div class="left-avis">
      <h2><?php echo $nomUtil ?></h2>
      <p><?php echo $date_avis ?></p>
  </div>
  <div class="right-avis">
      <h2><?php echo $titre_commentaire ?></h2>
      <p><?php echo $commentaire ?></p>
  </div>
  
 
</div>
<hr>

<?php
      }
      ?>

      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
          <div class="divRight card3">
            <div class="prodSugg">
              <h2 class="title-product">Produits suggérés</h2>
                <hr>
         
                 <?php foreach($lesProduitsSuggérés as $unProdSug){
                  $InfoProd= getInfoLeProd($unProdSug['id_produit']);
                foreach($InfoProd as $uneInfo2){
                  $id2 = $uneInfo2['id'];
                  $description2 = $uneInfo2['description'];
                  $prix2 = $uneInfo2['prix'];
                  $image2 = $uneInfo2['image'];
                  $idCategorie2 = $uneInfo2['id_categorie'];
                  $desc_detail2 = $uneInfo2['desc_detail'];

                }?>
         
         <div class="container">
              <img src="<?php echo $image2 ?>" class="image" onclick="window.location.href = 'index.php?uc=voirProduits&categorie=<?php echo $idCategorie2 ?>&action=voirInfoProduit&leProd=<?php echo $id2 ?>';">
              <p class="nom-prod"><?php echo $description2 ?></p>
         </div>
       



        

      
     
          <?php 
      }?>      
                        

    </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script>
  function myFunction() {
    var url = window.location.href;
    const myText = url.split("leProd=");
    var x = document.getElementById('select-contenance').value;
    const myArray = x.split("-");
    var qte = myArray[0];
    var unite = myArray[1];
    var id = myText[1];
    document.cookie="profile_viewer_uid=1" 
     
  
  }
</script>
<?php 
$unite="<script>document.writeln(id);</script>";
$qte="<script>document.writeln(unite);</script>";
$id="<script>document.writeln(qte);</script>";
echo $qte;
echo $qte;

$test = getPriceAndStock($id, $unite , $qte);
foreach($test as $untest){
  $stock = $untest['stock'];
  $prix = $untest['prix'];
  var_dump($stock);
}
 echo '<script> document.getElementById("exemplaire").innerHTML = '.$stock.' </script>';
 echo '<script> document.getElementById("priceproduct").innerHTML = Prix:'.$prix.' </script>';
?>

