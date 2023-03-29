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
		include("vues/v_categories.php");
		header('Location:index.php?uc=voirProduits&action=voirProduits&categorie=CH');
  		break;
	}
	case 'voirInfoProduit' :
		{
			$idProduit =$_REQUEST['leProd'];
			$lesProduits = getTousLesProduits();
				include("vues/v_leProduit.php");

			
			break;
		}
	
	case 'voirProduits' :
	{
		$lesCategories = getLesCategories();
	
		if(isset($_GET['categorie'])){
			$categorie=$_GET['categorie'];
		}
		if(isset($_POST['categorie'])){

 		$categorie = $_POST['categorie'];
 			header('Location:index.php?uc=voirProduits&action=voirProduits&categorie='. $categorie);
 	}

  		?>
  			<div class="titre">
  				<span id="title-spl-text">
  					<?php echo 'Produits de la catégorie :'; ?>
  						<span id="libelle-cat"> <?php echo  getLeLibelleCategorie($categorie);?></span>
  				</span>
  			</div>
  		<?php
  			include("vues/v_categories.php");
		$lesProduits = getLesProduitsDeCategorie($categorie);
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
}
?>

