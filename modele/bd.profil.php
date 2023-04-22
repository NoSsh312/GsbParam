<?php
include_once 'bd.inc.php';

/**
 * function qui récupère les info d'un utilisateur
 * @param nomUtil qui correspond au nom de l'utilisateur connecté
 */
function getLesInfoUtil($nomUtil){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select idCli, nomUtil, mdp, nom, adresse, ville, cp, tel, courriel from client where nomUtil= :nomUtil ');
	$reqN -> bindValue(':nomUtil',$nomUtil,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}
/**
 * function qui récupère les commandes effectuées par l'utilisateur connecté
 * @param id qui correspond a l'id de l'utilisateur connecté
 */
function getLesCommandesUtil($id){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select commande.id, idCli, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient, prixtotal, dateLiv, etat from commande inner join v_prixtotalcmd v on v.id = commande.id where idCli=:id;');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

/**
 * function qui récupère le contenus d'une commande
 * @param id qui correspond a l'id  de la commande
 */
function getLesContenusCommandesUtil($idCommande){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT *, detail_cmd.id_produit as "idProduit" 
							  FROM `commande` 
							  INNER JOIN detail_cmd 
							  on detail_cmd.id=commande.id 
							  inner join produitcontenance p
							  on p.id_unite=detail_cmd.id_unite
							  AND p.id_produit=detail_cmd.id_produit
							  inner join produit pr 
							  on pr.id=detail_cmd.id_produit 
							  inner join v_prixqte vp 
							  on vp.id = detail_cmd.id 
							  where commande.id=:idCommande 
							  group by detail_cmd.id_produit; ');
	$reqN -> bindValue(':idCommande',$idCommande,PDO::PARAM_STR);


	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

/**
 * function qui récupère la qte achetée d'un produit d'une commande
 * @param idCmd qui correspond a l'id  de la commande
 * @param idProd qui correspond a l'id  d'un produit
 */
function getLaQteAch($idProd, $idCmd){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT qteAch from detail_cmd where id_produit = :idProd and id = :idCmd;');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	$reqN -> bindValue(':idCmd',$idCmd,PDO::PARAM_STR);

	$reqN->execute();
	$lesLignesN = $reqN->fetch(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}

/**
 * function qui récupère le prix*qte achetée d'un produit d'une commande
 
 * @param idProd qui correspond a l'id  d'un produit
 */
function getLaPrixQte($idProd){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT (qteAch*prix) from detail_cmd where id_produit = :idProd and id = :idCmd;');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	$reqN -> bindValue(':idCmd',$idCmd,PDO::PARAM_STR);

	$reqN->execute();
	$lesLignesN = $reqN->fetch(PDO::FETCH_ASSOC); 
	
	return $lesLignesN;
}
/**
 * function qui récupère les avis que l'utilisateur à donner aux produits
 
 * @param id qui correspond a l'id  du client
 */
function getLesAvisUtil($id){


   
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select  avis.id,avis.id_produit,titre_commentaire, commentaire,avis.idCli, date_avis ,note, description from avis inner join possede on avis.id=possede.id_avis INNER JOIN produit on produit.id = avis.id_produit WHERE avis.idCli= :id ');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}
?>