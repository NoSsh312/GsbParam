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

	$reqN=$monPdo -> prepare('select id, idCli, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient from commande  where idCli= :id ');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

function getLesContenusCommandesUtil($idCommande){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select detail_cmd.id, detail_cmd.id_produit as "idProduit", description, prix,id_categorie, id_marque, image, desc_detail ,produitcontenance.id_unite as "id_Unite" from detail_cmd INNER JOIN produit ON detail_cmd.id_produit=produit.id INNER JOIN produitcontenance ON detail_cmd.id_produit=produitcontenance.id_produit where detail_cmd.id=:idCommande ');
	$reqN -> bindValue(':idCommande',$idCommande,PDO::PARAM_STR);


	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

function getLesAvisUtil($id){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select  avis.id,avis.id_produit,titre_commentaire, commentaire,avis.idCli, date_avis ,note, description from avis inner join possede on avis.id=possede.id_avis INNER JOIN produit on produit.id = avis.id_produit WHERE avis.idCli= :id ');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}
?>