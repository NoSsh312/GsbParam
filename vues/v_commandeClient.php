
<div id="" class="">
		<h2 class="color-green" style="text-align:center;">Mes Commandes</h2>
		</br>	
		<div class="avis-wrapper">	
		
		<?php
foreach($commandeCli as $uneCommande){
	$idCommande =$uneCommande['id'];
	$date = $uneCommande['dateCommande'];
	$prixtotal = $uneCommande['prixtotal'];
    $etat = $uneCommande['etat'];
 
?>
		<div class="user-info bis2">
            <?php if($etat == 'En cours'){
                ?><div style="text-align:center;">
                <a class="btn btn-outline-success" onclick="return confirm('La commande est-elle vraiment livrée ?');" href="index.php?uc=gererCommandes&action=updateCmd&cmd=<?php echo $idCommande ?>&cli=<?php echo $idCli ?>">Livrer la commande</a>
            </div>
            </br>
                <?php
    }else{?><p style="text-align:center; color:red;">Commande Livrée !</p><?php } ?>
		<h2>Commande N° <span class="color-green"><?php echo $idCommande;?></span> </h2>
</br>
<h2>Prix total <span class="color-green"><?php echo $prixtotal;?>€</span> </h2>
</br>
 <ul>
 <li><strong>Date de commande:</strong> <?php echo $date;?></li>
 

 <?php
		$lesContenusCommande = getLesContenusCommandesUtil($idCommande);

		

				foreach($lesContenusCommande as $unContenuProduit){
					$produit =$unContenuProduit['idProduit'];
					$description =$unContenuProduit['description'];
					$prix =$unContenuProduit['prix'];
					$qteAch =$unContenuProduit['qteAch'];
					$idCategorie =$unContenuProduit['id_categorie'];

					$prixQte=$prix * $qteAch;
					
				
				?>
			<HR NOSHADE class="separation">
				<li><strong>Produit :</strong> <?php echo $produit;?></li>
				<li><strong>Nom :</strong> <?php echo $description;?></li>
				<li><strong>Prix Unitaire :</strong> <?php echo $prix;?>€</li>
				<li><strong>Quantité achetée :</strong> <?php echo $qteAch;?></li>
				<li><strong>Prix * Quantite :</strong> <?php echo $prixQte;?>€</li>
				<li><strong>Catégorie :</strong> <?php echo $idCategorie;?></li>
				
				
<?php 
				}
?>
</ul>
</div>







<?php
}
?>
		
	</div>
</div>
</div>
</div>
