<?php
// à vous de jouer !
// contrôleur qui gère l'affichage des produits
 // se charge de réserver un emplacement mémoire pour le panier si pas encore fait
initPanier(); // se charge de réserver un emplacement mémoire pour le panier si pas encore fait

$action = $_REQUEST['action'];
switch($action)
{
	case 'modifLesProduits' :
	{
		if(isset($_REQUEST['categorie'])){
			$lesCategories = getLesCategories();
			$categorie = $_REQUEST['categorie'];
			$lesProduits= getLesProduitsDeCategorie($categorie);
			include("vues/v_categories.php");
		}
		else{
		$lesProduits = getTousLesProduits();
		}
		include("vues/v_modifProdAdmin.php");
		break;

	}

	case 'modifLeProduit' :
		{
	
			$idProduit =$_REQUEST['produit'];
			$infoleprod=getInfoLeProd($idProduit);
			$contenance = getContenanceProd($idProduit);
			$tousProd =getTousLesProduits();
			$suggestions=getProductsYouMayAlsoLike($idProduit);
			include("vues/v_modifLeProdAdmin.php");
			break;
		}
	
		case 'modifValideContenance':
			{
				$idProduit = $_REQUEST['produit'];
				$valueSelect = $_POST['categorie'];
				$pieces = explode("-", $valueSelect);
				$qte =  $pieces[0]; // piece1
				$unite =  $pieces[1]; // piece2
				$uniteV2 = getIdByLabelUnite($unite);
				$toutesLesMarques = getAllBrand();
				$marqueDuProd = getMarque($idProduit);
				$touteslescat = getLesCategories();
				$lacategorie = getCatInfoByIdProduct($idProduit);
				foreach($lacategorie as $cat){ //boucle pour avoir la categorie du produit 
					$CatIDProd = $cat['libelle'];
				}
				foreach($uniteV2 as $laUnite){ // boucle pour avoir l'unite
	
					$uneUnite = $laUnite['id'];
				}
				$tousProd =getTousLesProduits();
				$suggestions=getProductsYouMayAlsoLike($idProduit);
				$infoleprod=getInfoLeProd($idProduit);
				$leproduitaveccontenance=getInfoProdInProduitcontenance($idProduit,$uneUnite,$qte);
				include("vues/v_modifLeProdAdmin.php");
				break;
			}
		case 'modifValide' :
		{
			$id=$_REQUEST['inputId'];
			$desc=$_REQUEST['inputDesc'];
			$prix=$_REQUEST['inputPrix'];
			$desc_detail=$_REQUEST['inputDescDetail'];
			$categorie=$_REQUEST['inputIdCategorie'];
			$qte=$_REQUEST['inputQte'];
			$unite=$_REQUEST['inputIdUnite'];
			$marque=$_REQUEST['inputIdMarque'];
			$stock=$_REQUEST['inputStock'];
	
			if($_POST['inputImage']==null){ // verif que l'image a pas changé
				$image = getImageLinkFromProduct($id);
				$image = $image['image'];
			}else{
				$image = $_REQUEST['inputImage'];
			}
	
			updateProductInProduitcontenance($id,$unite,$qte,$stock,$prix);
			updateProductInProduit($id,$desc,$image,$desc_detail,$categorie,$marque);
	
			header("Location:index.php?uc=administrer&action=modifLesProduits");
			break;
		}
	



	case 'supprimerProd' :
	{
		$idProduit = $_REQUEST['produit'];
		deleteProductFromProduitcontenance($idProduit);
		supprimerArticleAdmin($idProduit);
		echo '<script>alert("Produit bien supprimé")</script>';
		header("Location:index.php?uc=administrer&action=modifLesProduits");
		break;
	}


	case 'ajouterUnProduit' :
		{
			$lesUnites = getAllUnite();
			$lesMarques = getAllBrand();
			$lesCategories = getLesCategories();
			include("vues/v_ajouterUnProduit.php");
			break;
		}

	case 'ajouterUnProduitR' :
		{
			$id=$_REQUEST['ajoutIdProd'];
			$desc=$_REQUEST['ajoutDescription'];
			$prix=$_REQUEST['ajoutPrix'];
			$desc_detail=$_REQUEST['desc_detail'];
			$photo=$_REQUEST['ajoutPhoto'];
			$categorie=$_REQUEST['ajoutIdCategorie'];
			$qte=$_REQUEST['ajoutQte'];
			$unite=$_REQUEST['select-unite'];
			$marque=$_REQUEST['select-marque'];
			$stock=$_REQUEST['stockdispo'];
			
			if($categorie == 'CH' || $categorie == 'FO' || $categorie == 'PS'){
				addNewProducts($id, $desc, $photo, $desc_detail, $categorie, $marque);
				addProductInProduitContenance($id, $unite, $qte, $stock, $prix);
				echo '<script>alert("Produit bien enregistré dans la BDD")</script>';
			}else{
				echo '<script>alert("Nom de categorie incorrect")</script>';
				$lesUnites = getAllUnite();
				$lesMarques = getAllBrand();
				include("vues/v_ajouterUnProduit.php");
			}
	
	
			header("Location:index.php?uc=voirProduits&action=nosProduits");
			break;
		}	

	case 'gererProduitPrix' :
	{
		$prixMin = $_REQUEST['prixmin'];
		$prixMax = $_REQUEST['prixmax'];
		$marque = $_REQUEST['MarqueDuProd'];
		$libelleMarque = getMarqueById($marque);


		if($prixMin != '' && $prixMax != ''){ // si toute les valeurs sont rentrées
			if($prixMin > $prixMax){ //verif que prixMin est vien inférieur à prixMax    						
				echo '<script>alert("Le prix minimum doit être inférieur au prix maximum")</script>';
				$lesProduits = getTousLesProduits();
				
			}else{
				if($marque != '0'){//si la marque est choisie																							
					$lesProduits = searchProductByPriceAndBrand($prixMin, $prixMax, $marque);
					
				}
				else{ // que le prix 																				
					$lesProduits = searchProductByPrice($prixMin, $prixMax);											
					
				}
			}
		}else{ //prix pas renseigné 
			if($marque == '0'){ //pas de marque renseignée
			
				$lesProduits = getTousLesProduits();
		
			}
			else{ //que la marque
				$lesProduits = searchProductByBrand($marque);
			
			}

		}

		$lesMarques = getAllBrand();
		include('vues/v_produits.php');

	break;
		

	}

	case 'modifSug' :
		{
			$idProduit=$_REQUEST['produit'];
			
			$NombreProduits = $_COOKIE["numbersofspecialities"];
		
			

			if($NombreProduits != 0){
				deleteSugProd($idProduit);
				for($i = 1; $i<=$NombreProduits; $i++){ //boucle qui prend les valeurs de toutes les spécialités
					if(isset($_REQUEST['specialite'.$i]))
					addSugProd($idProduit, $_REQUEST['specialite'.$i]);
					//ajoutSpecialitePraticien($id, $_REQUEST['specialite'+$i]);
				}
				$temp = $NombreProduits + 1;
				if(isset($_REQUEST['specialite'.$temp]))
				addSugProd($idProduit, $_REQUEST['specialite'.$temp]);
			}
			header('Location:index.php?uc=administrer&produit='.$idProduit.'&action=modifLeProduit');
			break;
		}
	
	

}





?>