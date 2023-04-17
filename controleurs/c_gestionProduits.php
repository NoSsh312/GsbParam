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
		$lesProduits = getTousLesProduits();
		$leProd=getInfoLeProd($idProduit);
		include("vues/v_modifLeProdAdmin.php");
		break;
	}

	case 'modifValide' :
	{
		$idProduit =$_REQUEST['produit'];
		$prix = $_POST['modifPrix'];
		$desc = $_POST['descProdModif'];
		if(!empty($_POST['photoCardModif'])){
			$image = $_POST['photoCardModif'];
			modifLesProdAdmin1($idProduit,$prix,$desc,$image);
			echo $image;
		}
		else{
		modifLesProdAdmin2($idProduit,$prix,$desc);
		}
		
		header("Location:index.php?uc=administrer&action=modifLesProduits");
		break;
	}



	case 'supprimerProd' :
	{
		$idProduit = $_REQUEST['produit'];
		supprimerArticleAdmin($idProduit);
		if(isset($_REQUEST['categorie'])){
		$categorie =$_REQUEST['categorie'];
		header("Location:index.php?uc=voirProduits&action=voirProduits&categorie=$categorie");
		}else{
		header("Location:index.php?uc=administrer&action=modifLesProduits");
		}
		break;
	}


	case 'ajouterUnProduit' :
	{
		if(isset($_REQUEST['categorie'])){
		
			$categorie = $_REQUEST['categorie'];
			}
		include("vues/v_ajouterUnProduit.php");
		break;
	}

	case 'ajouterUnProduitR' :
	{
		
		if(isset($_REQUEST['categorie'])){
			$categorie=$_REQUEST['categorie'];
		$testDouble =ajoutProduit($_POST['ajoutIdProd'],$_POST['ajoutDescription'],$_POST['ajoutPrix'],$_POST['ajoutPhoto'], $categorie);	
		}else{
		$testDouble =ajoutProduit($_POST['ajoutIdProd'],$_POST['ajoutDescription'],$_POST['ajoutPrix'],$_POST['ajoutPhoto'], $_POST['ajoutIdCategorie']);
	}
			


			include('vues/v_ajouterUnProduit.php');?>

			<div class = "message-form"><?php
			if($testDouble){
			?>
				<p id = "message-failed">  Ajout du Produit échoué</p><?php
			}
			else{?>
				<p id = "message-reussi">  Ajout du Produit réussi</p><?php
			}
		break;
	}	

	case 'gererProduitPrix' :
	{
		$prixMin = $_REQUEST['prixmin'];
		$prixMax = $_REQUEST['prixmax'];

		if($prixMin > $prixMax){
			echo '<script>alert("Le prix minimum doit être inférieur au prix maximum")</script>';
			$lesProduits = getTousLesProduits();
			include('vues/v_produits.php');
		}else{
			$lesProduits = searchProductByPrice($prixMin,$prixMax);
			include('vues/v_produits.php');
		}

		

	}
	

}





?>