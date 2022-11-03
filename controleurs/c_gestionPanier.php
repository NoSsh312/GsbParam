<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':
	{
		
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = getLesProduitsDuTableau($desIdProduit);
			include("vues/v_panier.php");
			
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'supprimerUnProduit':
	{
		$idProduit=$_REQUEST['produit'];
		retirerDuPanier($idProduit);
		$desIdProduit = getLesIdProduitsDuPanier();
		$lesProduitsDuPanier = getLesProduitsDuTableau($desIdProduit);
		
		header("Location:index.php?uc=gererPanier&action=voirPanier");
		
		
		break;
	}
	case 'passerCommande' :
	    $n= nbProduitsDuPanier();
		if($n>0)
		{   // les variables suivantes servent à l'affectation des attributs value du formulaire
			// ici le formulaire doit être vide, quand il est erroné, le formulaire sera réaffiché pré-rempli
			$nom ='';$rue='';$ville ='';$cp='';$mail='';
			include ("vues/v_commande.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	case 'confirmerCommande'	:
	{
		$nom =$_REQUEST['nom'];
		$rue=htmlspecialchars($_REQUEST['rue'], ENT_QUOTES); 
		$ville =$_REQUEST['ville']; 
		$cp=$_REQUEST['cp']; 
		$mail=$_REQUEST['mail'];
		if (isset($_SESSION['nomUtil'])){
			$idCli = getIdCli();
		}
	 	$msgErreurs = getErreursSaisieCommande($nom,$rue,$ville,$cp,$mail);
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_commande.php");
		}
		else
		{
			$lesIdProduit = getLesIdProduitsDuPanier();
			creerCommande($idCli,$nom,$rue,$cp,$ville,$mail, $lesIdProduit );
			$message = "Commande enregistrée";
			supprimerPanier();
			include ("vues/v_message.php");
		}
		break;
	}

	case 'viderPanier' :
	{
		supprimerPanier();
		$message = "panier vide !!";
			include ("vues/v_message.php");
		break;
	}

	case 'modifierQte' :
	{
		$idProduit=$_REQUEST['produit'];	
		$desIdProduit = getLesIdProduitsDuPanier();
		$lesProduitsDuPanier = getLesProduitsDuTableau($desIdProduit);
		include("vues/v_modifierQte.php");
		break;
	}

	case 'modifierQteValide' :
	{
		$idProduit=$_REQUEST['produit'];
		$qte = $_POST['quantiteModif'];
		modifyQty($idProduit,$qte);
		header("Location:index.php?uc=gererPanier&action=voirPanier");
		break;
	}

}


?>


