<?php
include_once 'bd.inc.php';


function getLesInfoUtil($nomUtil){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select idCli, nomUtil, mdp, nom, adresse, ville, cp, tel, courriel from client where nomUtil= :nomUtil ');
	$reqN -> bindValue(':nomUtil',$nomUtil,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}

function getLesCommandesUtil($id){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select id, id_cli, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient from commande where id_cli= :id ');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

function getLesContenusCommandesUtil($idCommande){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select idCommande, idProduit, description, prix, idCategorie from contenir INNER JOIN produit ON contenir.idProduit=produit.id where idCommande= :idCommande ');
	$reqN -> bindValue(':idCommande',$idCommande,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

function getLesAvisUtil($id){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select  idProduit, commentaire,note,description, date_avis from avis INNER JOIN produit ON produit.id=avis.idProduit where idClient= :id ');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}
?>