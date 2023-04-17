<?php
// contrôleur qui gère l'affichage des produits
initPanier(); // se charge de réserver un emplacement mémoire pour le panier si pas encore fait

$action = $_REQUEST['action'];
switch($action)
{


	case 'nosProduits':
	{
		$lesProduits = getTousLesProduits();
		include("vues/v_produits.php");
		break;

	}




	case 'voirCategories':
	{
  		$lesCategories = getLesCategories();
		
		header('Location:index.php?uc=voirProduits&action=voirProduits');
  		break;
	}
	case 'voirInfoProduit' :
		{
			$idProduit =$_REQUEST['leProd'];
			$categorie =$_REQUEST['categorie'];
			$lesProduits = getTousLesProduits();
			$leProd= getInfoLeProd($idProduit);
			$lesProduitsSuggérés = getProductsYouMayAlsoLike($idProduit);
			$leStock = getStockProducts($idProduit);
			$contenance = getContenanceProd($idProduit);
			$lesAvis=getLesAvisProd($idProduit);
			$stock = null;
			$prix = null;
			$noteMoy= getNoteMoy($idProduit);
			$lesInfoUtil= getLesInfoUtil($_SESSION['nomUtil']);
			foreach($lesInfoUtil as $uneInfo){
			$idClient= $uneInfo['idCli'];
			}
			$avisOuPas= getIfDejaAvis($idProduit,$idClient);
			$nbAvis=getNbAvis($idProduit);
		
				include("vues/v_leProduit.php");

			
			break;
		}
	
	case 'voirProduits' :
	{
		$lesCategories = getLesCategories();
		$lesCatSansCH = getLesCatSansCH();
		
		include("vues/v_produitsDeCategorie.php");
		
		break;
	}
	case 'ajouterAuPanier' :
	{
		$idProduit=$_REQUEST['produit'];
		$qte = $_REQUEST['quantiteNum'];
		$ok = ajouterAuPanier($idProduit,$qte);
		if(!$ok)
		{
			$message = "Cet article est déjà dans le panier !!";
			include("vues/v_message.php");
		}
		else{
		// on recharge la même page ( NosProduits si pas categorie passée dans l'url')
		if (isset($_REQUEST['categorie'])){
			$categorie = $_REQUEST['categorie'];
			header('Location:index.php?uc=voirProduits&action=voirProduits&categorie='.$categorie);
		}
		else 
			header('Location:index.php?uc=voirProduits&action=nosProduits');
		}
		break;
	}
	case 'voirPrixDuProduit' :
		{
			$idProduit =$_REQUEST['leProd'];
				$categorie =$_REQUEST['categorie'];	
			
				$lesProduits = getTousLesProduits();
				$leProd= getInfoLeProd($idProduit);
				$lesProduitsSuggérés = getProductsYouMayAlsoLike($idProduit);
				$leStock = getStockProducts($idProduit);
				$contenance = getContenanceProd($idProduit);
				$lesAvis=getLesAvisProd($idProduit);
			$idProd =$_REQUEST['leProd'];
			$categorie=getCatById($idProd);
			foreach($categorie as $cat){
				$idCat = $cat['id_categorie'];
			}
			$result = $_POST['select-contenance'];
			 
			$result_explode = explode('-', $result);
			$resultat = getPriceAndStock($idProd, $result_explode[1] , $result_explode[0]);
			$noteMoy= getNoteMoy($idProduit);
			$nbAvis=getNbAvis($idProduit);
			include("vues/v_leProduit.php");
			//header('Location:index.php?uc=voirProduits&categorie='.$idCat.'&action=voirInfoProduit&leProd='.$idProd);
			break;
		}
		case 'gererAvis' :
			{
				$idProduit =$_REQUEST['leProd'];
				$categorie =$_REQUEST['categorie'];	
			
				$lesProduits = getTousLesProduits();
				$leProd= getInfoLeProd($idProduit);
				$lesProduitsSuggérés = getProductsYouMayAlsoLike($idProduit);
				$leStock = getStockProducts($idProduit);
				$contenance = getContenanceProd($idProduit);
				$lesAvis=getLesAvisProd($idProduit);
			$idProd =$_REQUEST['leProd'];

			$lesInfoUtil= getLesInfoUtil($_SESSION['nomUtil']);
			foreach($lesInfoUtil as $uneInfo){
			$idClient= $uneInfo['idCli'];
			}
			$avisOuPas= getIfDejaAvis($idProduit, $idClient);
if($avisOuPas == false){
			ajoutAvis($_POST['title'],$_POST['descriptionC'],$idProduit, $idClient);
			$lavis=getIdAvisNote($idProduit,$idClient);
			foreach($lavis as $infoAvis){
				$idAvis =  $infoAvis['id'];
			}
			ajoutNote($idAvis,$idClient,$idProduit,$_POST['rate']);
			
}
$nbAvis=getNbAvis($idProduit);
	$noteMoy= getNoteMoy($idProduit);
			include("vues/v_leProduit.php");
			//header('Location:index.php?uc=voirProduits&categorie='.$idCat.'&action=voirInfoProduit&leProd='.$idProd);
		
				break;
		
			}
}
?>

