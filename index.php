<!-- ('1', 'LeBoss', 'TheBest$147#') -->
<?php
session_start();
include("vues/v_entete.html") ;
require_once("modele/fonctions.inc.php");
require_once("modele/bd.produits.inc.php");
require_once("modele/bd.profil.php");
include("vues/v_bandeau.php") ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil'; // si $_GET['uc'] n'existe pas , $uc reçoit une valeur par défaut
 else
 	$uc = $_REQUEST['uc'];

 
switch($uc) // traitement de l'uc : on charge le controleur approprié.
{
	case 'accueil':
	{include("vues/v_accueil.html");
	break;
}
case 'voirProduits' :
{
	include("controleurs/c_voirProduits.php");
	break;
}
case 'gererPanier' :
{ 
	include("controleurs/c_gestionPanier.php");
	break; 
}
case 'administrer' :
{ 
	include("controleurs/c_gestionProduits.php");
	break;  
}

case 'seDeconnecter':
{
	include("controleurs/c_gestionDeconnexion.php");
	break;
}

case 'seConnecter' :
{ include("controleurs/c_gestionConnexion.php");
break;  
}
case 'monProfil' :
	{ include("controleurs/c_gestionProfil.php");
	break;  
	}
}
include("vues/v_pied.html") ;
?>

