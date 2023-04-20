
<?php

foreach($leProd as $uneInfo){
  $id = $uneInfo['id'];
  $description = $uneInfo['description'];
  $prix = $uneInfo['prix'];
  $image = $uneInfo['image'];
  $idCategorie = $uneInfo['id_categorie'];
  $desc_detail = $uneInfo['desc_detail'];
}

foreach($laMarque as $uneMarque){
  $libelleMarque=$uneMarque['label_marque'];
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
                <p class="text-product">Produit de la marque <?php echo $libelleMarque ?> et de la catégorie <?php echo $libelleCat ?></p>
                <h5 class="underline">Description:</h5>
                <p class="card-description"><?php echo $desc_detail ?></p>
                <?php 
                foreach($nbAvis as $unavis){
                  $NBAVIS=$unavis['nbAvis'];
                }?>
                <p class="center"><?php echo $NBAVIS ?> avis pour ce produit</p>
                <?php if(isset($avisOuPas) && $avisOuPas == false){
                  
                              ?>
                <div class="avisPart" id="avisPart" style="text-align:center;<?php if(isset($_POST['title'])) echo 'display:none;' ?>">
                  <button class="center open-button"  onclick="openForm()">Donner un avis</button>
                </div>
                <?php }?>
                <div style="position:absolute;">
                  <div class="card-container form-popup"  id="myForm">
                    <div class="card3 card3Avis" >
                      <div class="card-header avis-header" >
                        <div class="card-body">
                          <form action="index.php?uc=voirProduits&action=gererAvis&leProd=<?php echo $_GET['leProd'] ?>&categorie=<?php echo $_GET['categorie'] ?>" id="formavis" method="POST" class="form-container">
                           

                            <label for="title"><b>Sujet</b></label>
                            <input type="text" class="input-avis" placeholder="Titre du Commentaire" name="title" min=1 max=25 required>

                            <label for="descriptionC"><b>Description</b></label>
                            
                            <input type="text" class="input-avis" placeholder="Description" name="descriptionC" min=1 max=100 required>
                            <div class="rate">
                              <input type="radio" id="star5" name="rate" value="5" required/>
                              <label for="star5" >5 stars</label>
                              <input type="radio" id="star4" name="rate" value="4" />
                              <label for="star4" >4 stars</label>
                              <input type="radio" id="star3" name="rate" value="3" />
                              <label for="star3" >3 stars</label>
                              <input type="radio" id="star2" name="rate" value="2" />
                              <label for="star2" >2 stars</label>
                              <input type="radio" id="star1" name="rate" value="1" />
                              <label for="star1" >1 star</label>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-outline-success form_action_avis">Envoyer</button>
                          </br>
                          <button type="button" class="btn btn-outline-success cancel form_action_avis" onclick="closeForm()">Fermer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <!-- action="index.php?uc=voirProduits&categorie= echo $categorie ?>&produit= echo $idProduit ?>&action=ajouterAuPanier" -->
              <form  method="POST" action="index.php?uc=voirProduits&action=voirPrixDuProduit&leProd=<?php echo $_GET['leProd'] ?>&categorie=<?php echo $_GET['categorie'] ?>">
                <div id="forSelect">
                  <div id="nameSelect">
                    <p>Contenance : </p>
                  </div>
                  <div id="select-list">
                    <select id="select-contenance" name="select-contenance" class="form-select" aria-label="Default select example" onchange="myFunction()" required>
                      
                      <option value="">Choisir la contenance</option>
                      <?php 
                      foreach($contenance as $uneContenance){
                       
                        ?><option value="<?php echo $uneContenance['qte']. '-'. $uneContenance['label_unite']; ?>"><?php echo  $qte = $uneContenance['qte']. '-'. $uneContenance['label_unite']; ?></option><?php 
                      }
                      ?>
                      
                    </select>
                    <div class="input-group-append">
                      <input class="btn btn-outline-secondary btn-contenance" type="submit" value="✔">
                    </div>
                  </div>
                </div>
              </form>
              <?php
              if(isset($resultat)){
                foreach($resultat as $result){
                  $prixContenance = $result['prix'];
                  $stockContenance = $result['stock'];
                }
              }
              ?>
              <div class="info-prix-etc">
                <p class="card-price" id="priceproduct">
                  <?php if(isset($prixContenance)){

                    echo "Prix: ". $prixContenance ."&nbsp";
                  } ?>
                </p>
                <p id="stockproduct">
                 <?php
                 if(isset($stockContenance)){
                  if($stockContenance == 0){
                    echo "Non disponible";
                  }else{
                    echo "En Stock &nbsp";
                  }
                }
                
                ?>
              </p> <!-- condition reste du stock ou pas  -->
              <p class="exemplaire" id="exemplaire">
               <?php if(isset($stockContenance)){
                if($stockContenance == 0){
                  echo " ";
                }else{
                  echo " ".$stockContenance;
                }
                
              } ?>
            </p>
          </div>
          <?php if(!isset($prixContenance)){
            echo "";
          } 
          else{
            
          ?><form action="index.php?uc=voirProduits&categorie=<?php echo $idCategorie ?>&produit=<?php echo $idProduit ?>&action=ajouterAuPanier" method="POST">
          <div class="input-group div-qte">
            <input name="prixViaContenance" value="<?php echo $prixContenance?>" hidden >
            <input name="qteUnite" value="<?php echo $resultQteUnite?>" hidden >
            
            <select class="custom-select select-qte" id="inputGroupSelect04" name="quantiteNum" onchange="getTotal()" required>
             <option value="">Combien en voulez-vous?</option>
             <?php 
             for($i=1; $i<=$stockContenance; $i++){
              ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option> <?php
            }
            ?>
           </select>
           <div class="input-group-append div-send">
            
            <button class="btn btn-outline-success btn-send" type="submit">Ajouter au panier</button>
          </form>
          </div>
        </div>
        <?php

?><div  id="totalProduct"></div> <?php

} ?>
      </div>
    </div>
  </div>
<!-- €€€€€ -->
  <div class="card-container">
    <div class="card3">
      <div class="card-header avis-header">
        <div class="card-body">
          <?php foreach($noteMoy as $unenoteMoy){
            $moyNote=$unenoteMoy['Moy'];
          }
            ?>
          <h2 class="card-title">Avis, Note Moy : <?php echo $moyNote ?>/5</h2>
          <hr>
          <?php 
          foreach($lesAvis as $unAvis){
            $id_Avis = $unAvis['id'];
            $titre_commentaire=$unAvis['titre_commentaire'];
            $commentaire=$unAvis['commentaire'];
            $date_avis=$unAvis['date_avis'];
            $nomUtil=$unAvis['nomUtil'];
            $lesNotes = getNoteAvis($id_Avis);
            foreach($lesNotes as $uneNote){
              $uneNoteAvis = $uneNote['note'];
            }
            ?>
            <div class="unAvis-wrapper"> 
              <div class="left-avis">
                <h2><?php echo $nomUtil ?></h2>
                <p><?php echo $date_avis ?></p>
                <p>Note : <?php echo $uneNoteAvis ?>/5</p>
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
    document.cookie="idProd=" + id;
    document.cookie="qteProd=" + qte;
    document.cookie='uniteProd=' + unite; 
    console.log(document.cookie);

  }
  function getTotal(){
    var divTotal = document.getElementById('totalProduct');
    var qteChoisie = document.getElementById('inputGroupSelect04').value;
    var prix =  <?php echo json_encode($prixContenance); ?>;
    var total1 = qteChoisie * prix;
    //var baliseTotal = addTagInOther(divTotal,'p',{'id':'prixtotal'});
    document.getElementById('totalProduct').innerHTML = "Prix total à payer: " + Math.round(total1 * 100) / 100 + "€";


  }

 

</script>
<?php 


?>

