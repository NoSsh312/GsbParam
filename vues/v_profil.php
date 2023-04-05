<?php 

foreach($lesInfoUtil as $uneInfo){
	$nomUtil = $uneInfo['nomUtil'];
	$mdp = $uneInfo['mdp'];
	$nom = $uneInfo['nom'];
	$adresse = $uneInfo['adresse'];
	$ville = $uneInfo['ville'];
	$cp = $uneInfo['cp'];
	$tel = $uneInfo['tel'];
	$courriel = $uneInfo['courriel'];
}

?>

<div class="tabs">
		<button class="tablinks" onclick="openTab(event, 'tab1')">Mes Commandes</button>
		<button class="tablinks" onclick="openTab(event, 'tab2')" id="defaultOpen">Mes Informations</button>
		<button class="tablinks" onclick="openTab(event, 'tab3')">Mes Avis</button>
	</div>

	<div id="tab1" class="tabcontent bis2">
		<h2 class="color-green">Mes Commandes</h2>
		</br>	
		<div class="avis-wrapper">	
		
		<?php
foreach($lesCommandesUtil as $uneCommande){
	$idCommande =$uneCommande['id'];
	$date = $uneCommande['dateCommande'];

?>
		<div class="user-info bis2">
		<h2>Commande N° <span class="color-green"><?php echo $idCommande;?></span> </h2>
</br>
 <ul>
 <li><strong>Date de commande:</strong> <?php echo $date;?></li>
 

 <?php
		$lesContenusCommande = getLesContenusCommandesUtil($idCommande);

				foreach($lesContenusCommande as $unContenuProduit){
					$produit =$unContenuProduit['idProduit'];
					$description =$unContenuProduit['description'];
					$prix =$unContenuProduit['prix'];
					$idCategorie =$unContenuProduit['idCategorie'];
				
				
				?>
			<HR NOSHADE class="separation">
				<li><strong>Produit:</strong> <?php echo $produit;?></li>
				<li><strong>Description:</strong> <?php echo $description;?></li>
				<li><strong>Prix Unitaire:</strong> <?php echo $prix;?>€</li>
				<li><strong>Catégorie:</strong> <?php echo $idCategorie;?></li>
				
				
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

	<div id="tab2" class="tabcontent">
		<h2 class="color-green">Mes Informations</h2>
		</br>
		
		<div class="user-info">
    
    <ul>
		<li><strong>Nom Utilisateur:</strong> <?php echo $nomUtil;?></li>
        <li><strong>Nom:</strong> <?php echo $nom;?></li>
		
		<li><strong>Adresse:</strong> <?php echo $adresse;?></li>
		<li><strong>Ville:</strong> <?php echo $ville;?></li>
		<li><strong>Code Postal:</strong> <?php echo $cp;?></li>
		<li><strong>Téléphone:</strong> <?php echo $tel;?></li>
		<li><strong>Email:</strong> <?php echo $courriel ;?></li>
		
    </ul>
</div>
	</div>

	<div id="tab3" class="tabcontent bis">
		<h2 class="color-green">Mes Avis</h2>
		</br>
		<div class="avis-wrapper">
<?php
		foreach($lesAvisUtil as $unAvis){?>
			<div class="user-info bis">
	<?php
			// commentaire,note,description
			$titre_com =$unAvis['titre_commentaire'];
			$commentaire =$unAvis['commentaire'];
			$note = $unAvis['note'];
			$description = $unAvis['description'];
			$date = $unAvis['date_avis'];
	?>
		<ul>
		<li><strong>Titre du commentaire :</strong> <?php echo $titre_com;?></li>
		<li><strong>Produit :</strong> <?php echo $description;?></li>
        <li><strong>Commentaire:</strong> <?php echo $commentaire;?></li>
		<li><strong>Note:</strong> <?php echo $note;?></li>
		<li><strong>Date de l'avis:</strong> <?php echo $date;?></li>
	 </ul>
	</div>
	

<?php } ?>
		</div>
		</div>
	<script src="modele/script.js">
	
	</script>