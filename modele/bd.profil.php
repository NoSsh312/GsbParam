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

	$reqN=$monPdo -> prepare('select id, id_cli, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient from commande where idCli= :id ');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

function getLesContenusCommandesUtil($idCommande){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select detail_cmd.id, id_produit, description, prix,id_categorie, id_marque, image, desc_detail from detail_cmd INNER JOIN produit ON detail_cmd.id_produit=produit.id where id= :idCommande ');
	$reqN -> bindValue(':idCommande',$idCommande,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

function getLesAvisUtil($id){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select  id,id_produit,titre_commentaire, commentaire,note,idCli, date_avis from avis INNER JOIN possede ON possede.id=avis.idProduit where idCli= :id ');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}
?>