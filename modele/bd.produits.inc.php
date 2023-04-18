<?php

/** 
 * Mission 3 : architecture MVC GsbParam
 
 * @file bd.produits.inc.php
 * @author Marielle Jouin <jouin.marielle@gmail.com>
 * @version    2.0
 * @date juin 2021
 * @details contient les fonctions d'accès BD à la table produits
 */
include_once 'bd.inc.php';

	/**
	 * Retourne toutes les catégories sous forme d'un tableau associatif
	 *
	 * @return array $lesLignes le tableau associatif des catégories 
	*/
	function getLesCategories()
	{
		try 
		{
			$monPdo = connexionPDO();
			$req = 'select id, libelle from categorie';
			$res = $monPdo->query($req);
			$lesLignes = $res->fetchAll(PDO::FETCH_ASSOC);
			return $lesLignes;
		} 
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
	}

	function getLesCatSansCH()
	{
		try 
		{
			$monPdo = connexionPDO();
			$req = 'select id, libelle from categorie WHERE id != "CH"';
			$res = $monPdo->query($req);
			$lesLignes = $res->fetchAll(PDO::FETCH_ASSOC);
			return $lesLignes;
		} 
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
	}





	/**
	 * Retourne toutes les informations d'une catégorie passée en paramètre
	 *
	 * @param string $idCategorie l'id de la catégorie
	 * @return array $laLigne le tableau associatif des informations de la catégorie 
	*/
	function getLesInfosCategorie($idCategorie)
	{
		try 
		{
			$monPdo = connexionPDO();
			$req = 'SELECT id, libelle FROM categorie WHERE id="'.$idCategorie.'"';
			$res = $monPdo->query($req);
			$laLigne = $res->fetch(PDO::FETCH_ASSOC);
			return $laLigne;
		} 
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
	}

	/**
	 * Retourne le libelle de la categorie via son id
	 *
	 * @param string $idCategorie l'id de la catégorie
	 * @return  $laLigne['libelle'] le libelle de la catégorie
	*/
	function getLeLibelleCategorie($idCategorie)
	{
		try 
		{
			$monPdo = connexionPDO();
			$req = 'SELECT libelle FROM categorie WHERE id="'.$idCategorie.'"';
			$res = $monPdo->query($req);
			$laLigne = $res->fetch(PDO::FETCH_ASSOC);
			return $laLigne['libelle'];
		} 
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
	}


/**
	 * Retourne tous les produits existants
	 *
	 * @return array $lesProduits un tableau associatif  contenant tous les produits existants
	*/
	function getTousLesProduits()
	{

		try 
		{
			$lesProduits = array();
			$monPdo = connexionPDO();
			$req='select id, description, prix, image, 	id_categorie,id_marque , desc_detail,	id_unite ,	qte  from produit INNER JOIN produitcontenance p on produit.id = p.id_produit group by id';
			$res = $monPdo->query($req);
			$lesLignes = $res->fetchAll(PDO::FETCH_ASSOC);
			foreach($lesLignes as $laLigne){
				$lesProduits[] = $laLigne;
			}
			return $lesProduits; 
		} 
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}

	}
	/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param string $idCategorie  l'id de la catégorie dont on veut les produits
 * @return array $lesLignes un tableau associatif  contenant les produits de la categorie passée en paramètre
*/

	function getLesProduitsDeCategorie($idCategorie)
	{

		try 
		{
			$monPdo = connexionPDO();
			$req='select id, description, prix, image, 	id_categorie,id_marque , desc_detail,	id_unite ,	qte  from produit INNER JOIN produitcontenance p on produit.id = p.id_produit where id_categorie ="'.$idCategorie.'" group by id';
			$res = $monPdo->query($req);
			$lesLignes = $res->fetchAll(PDO::FETCH_ASSOC);
			return $lesLignes; 
		} 
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}

	}
/**
 * Retourne les produits concernés par le tableau des idProduits passée en argument
 *
 * @param array $desIdProduit tableau d'idProduits
 * @return array $lesProduits un tableau associatif contenant les infos des produits dont les id ont été passé en paramètre
*/
function getLesProduitsDuTableau($desIdProduit)
{
	try 
	{
		$monPdo = connexionPDO();
		$nbProduits = count($desIdProduit);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$idUnite=$unIdProduit['idUnite'];
				$req = 'select id, description, prix, image, id_categorie,id_marque , desc_detail,	id_unite ,	qte,stock  from produit INNER JOIN produitcontenance p on produit.id = p.id_produit where id = "'.$unIdProduit['id'].'"AND id_unite='.$idUnite;
				$res = $monPdo->query($req);
				$unProduit = $res->fetch(PDO::FETCH_ASSOC);
				$unProduit['qte']= $unIdProduit['qte'];

				$lesProduits[] = $unProduit;

			}
		}
		return $lesProduits;
	}
	catch (PDOException $e) 
	{
		print "Erreur !: " . $e->getMessage();
		die();
	}
}
	/**
	 * Crée une commande 
	 *
	 * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
	 * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
	 * tableau d'idProduit passé en paramètre
	 * @param string $nom nom du client
	 * @param string $rue rue du client
	 * @param string $cp cp du client
	 * @param string $ville ville du client
	 * @param string $mail mail du client
	 * @param array $lesIdProduit tableau associatif contenant les id des produits commandés
	 
	*/
	function creerCommande($idCli,$nom,$rue,$cp,$ville,$mail, $lesIdProduit)
	{
		try 
		{
			$monPdo = connexionPDO();
		// on récupère le dernier id de commande
			$req = 'select max(id) as maxi from commande';
			$res = $monPdo->query($req);
			$laLigne = $res->fetch();
		$maxi = $laLigne['maxi'] ;// on place le dernier id de commande dans $maxi
		$idCommande = $maxi+1; // on augmente le dernier id de commande de 1 pour avoir le nouvel idCommande
		$date = date('Y/m/d'); // récupération de la date système
		$req = "insert into commande values ('$idCommande','$idCli','$date','$nom','$rue','$cp','$ville','$mail')";
		$res = $monPdo->exec($req);
		// insertion produits commandés
		foreach($lesIdProduit as $unIdProduit)
			{	$idProd=$unIdProduit['id'];
			
		$qteAch=$unIdProduit['qte'];
		
		$id_unite = $unIdProduit['idUnite'];
		$prodQte =getQteContenance($idProd,$id_unite);
		$prodQte= $prodQte['qte'];
		$req = "insert into detail_cmd values ('$idProd','$id_unite','$prodQte','$idCommande','$qteAch')";
		$res = $monPdo->exec($req);
	}
}
catch (PDOException $e) 
{
	print "Erreur !: " . $e->getMessage();
	die();
}
}

function getQteContenance($idProd,$id_unite){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT qte  FROM `produitcontenance` WHERE id_produit=:idProd AND id_unite = :id_unite;');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	$reqN -> bindValue(':id_unite',$id_unite,PDO::PARAM_STR);
	
	$reqN->execute();
	$laCategorie = $reqN->fetch(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}

/**
	 * Ajoute un client 
	 *
	 * Ajoute un client à partir des arguments validés passés en paramètre, l'identifiant est
	 * construit à partir du maximum existant
	 * @param string $nomUtil le login du client
	 * @param string $nom nom du client
	 * @param string $mdp le mot de passe du client
	 * @param string $rue rue du client
	 * @param string $cp cp du client
	 * @param string $ville ville du client
	 * @param string $tel le numero de telephone du client
	 * @param string $mail mail du client
	 * @return booléen $testDouble false s'il existe déja un client qui possède ce nom d'utilisateur ou ce mail
	 
	 
	*/
function ajouterClient($nomUtil,$mdp,$nom,$rue,$cp,$ville,$tel,$mail )
{
	$testDouble =true;
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('select nomUtil from client where nomUtil= :nomUtil1 OR courriel = :mail1');
	$reqN -> bindValue(':nomUtil1',$nomUtil,PDO::PARAM_STR);
	$reqN -> bindValue(':mail1',$mail,PDO::PARAM_STR);
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	if(empty($lesLignesN)){

		$req = "insert into client (nomUtil, mdp, nom, adresse, ville, cp, tel, courriel) values ('$nomUtil','$mdp','$nom','$rue','$ville','$cp','$tel','$mail')";
		$res = $monPdo->exec($req);
		// insertion produits commandés
		$testDouble =false;
	}
	return $testDouble;


}

/**
	 * Connexion pour les clients
	 *
	 * Permet à un client de se connecter avec un login et un mdp 
	 * @param string $nomUtil le login du client
	 * @param string $mdp le mot de passe du client
	 * @return booléen $testExist false si le login ou le mot de passe ne sont pas bons
	 
	*/
function seConnecter($nomUtil, $mdp){
	$testExist =false;
	try 
	{

		$monPdo = connexionPDO();
		$reqN1=$monPdo -> prepare('select nomUtil,mdp from client where nomUtil= :nomUtil1 ');
		$reqN1 -> bindParam(':nomUtil1',$nomUtil,PDO::PARAM_STR);

		$reqN1->execute();
		$lesLignesN1 = $reqN1->fetch(PDO::FETCH_ASSOC);
		


		if(!empty($lesLignesN1) && password_verify($mdp, $lesLignesN1['mdp'])){
			
			$testExist =true;
			$_SESSION['nomUtil'] = $nomUtil;

			
		}
		return $testExist;
	}
	catch (PDOException $e) 
	{
		print "Erreur !: " . $e->getMessage();
		die();
	}
}


/**
	 * Connexion pour les Admins 
	 *
	 * Permet à un Admin de se connecter avec un login et un mdp 
	 * @param string $nomAdmin le login de l'admin
	 * @param string $mdp le mot de passe de l'admin
	 * @return booléen $testExist false si le login ou le mot de passe ne sont pas bons
	 
	*/
function seConnecterPourAdmin($nomAdmin, $mdp){
	$testExist =false;
	try 
	{

		$monPdo = connexionPDO();
		$reqN1=$monPdo -> prepare('select nom,mdp from administrateur client where nom= :nom');
		$reqN1 -> bindParam(':nom',$nomAdmin,PDO::PARAM_STR);

		$reqN1->execute();
		$lesLignesN1 = $reqN1->fetch(PDO::FETCH_ASSOC);
		


		if(!empty($lesLignesN1) && password_verify($mdp, $lesLignesN1['mdp'])){
			
			$testExist =true;
			$_SESSION['nomAdmin'] = $nomAdmin;

			
		}
		return $testExist;
	}
	catch (PDOException $e) 
	{
		print "Erreur !: " . $e->getMessage();
		die();
	}
}


/**
	 *Donne l'id du client 
	 *
	 *Cherche l'id du client via sa connexion avec un nom d'utilisateur
	 * @return $lesLignesN1['idCli'] l'id du client 
	*/
function getIdCli(){
	if(isset($_SESSION['nomUtil'])){
		try 
		{
			$monPdo = connexionPDO();
			$reqN1=$monPdo -> prepare('select idCli from client where nomUtil= :nomUtil1 ');
			$reqN1 -> bindParam(':nomUtil1',$_SESSION['nomUtil'],PDO::PARAM_STR);
			$reqN1->execute();
			$lesLignesN1 = $reqN1->fetch(PDO::FETCH_ASSOC);
			return $lesLignesN1['idCli'];

		}
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
		
	}
}
	/**
	 * Retourne les produits concernés par le tableau des idProduits passée en argument
	 *
	 * @param int $mois un numéro de mois entre 1 et 12
	 * @param int $an une année
	 * @return array $lesCommandes un tableau associatif contenant les infos des commandes du mois passé en paramètre
	*/
	function getLesCommandesDuMois($mois, $an)
	{
		try 
		{
			$monPdo = connexionPDO();
			$req = 'select id, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient from commande where YEAR(dateCommande)= '.$an.' AND MONTH(dateCommande)='.$mois;
			$res = $monPdo->query($req);
			$lesCommandes = $res->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}

	}


/**
	 * Modifie le produit si image modifiée
	 *
	 * Modifie le produit à partir des arguments validés passés en paramètre, 
	 * @param string $idProduit id du produit
	 * @param float $prix prix du produit
	 * @param string $desc description du produit
	 * @param string $image l'image modifiée du produit
	 
	*/
	function modifLesProdAdmin1($idProduit,$prix,$desc,$descdetail,$image)
	{
		if(isset($_SESSION['nomAdmin'])){
		try 
		{
			$monPdo = connexionPDO();
				$reqN1=$monPdo -> prepare('UPDATE produit SET description =:desc ,desc_detail =:descdetail, image = "images/":image WHERE produit.id = :id;');
			$reqN1 -> bindParam(':description',$desc,PDO::PARAM_STR);
			$reqN1 -> bindParam(':id',$idProduit,PDO::PARAM_STR);
			$reqN1 -> bindParam(':descdetail',$descdetail,PDO::PARAM_STR);
			$reqN1 -> bindParam(':image',$image,PDO::PARAM_STR);
			$reqN1->execute();
			$lesLignesN1 = $reqN1->fetch(PDO::FETCH_ASSOC);
			

		}
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
		
	}

		
	}


	/**
	 * Modifie le produit si pas d'image modifiée
	 *
	 * Modifie le produit à partir des arguments validés passés en paramètre, 
	 * @param string $idProduit id du produit
	 * @param float $prix prix du produit
	 * @param string $desc description du produit
	 
	*/
	function modifLesProdAdmin2($idProduit,$desc)
	{
		if(isset($_SESSION['nomAdmin'])){
		try 
		{
			$monPdo = connexionPDO();
				$reqN1=$monPdo -> prepare('UPDATE produit SET description =:desc WHERE produit.id = :id;');
			$reqN1 -> bindParam(':desc',$desc,PDO::PARAM_STR);
			$reqN1 -> bindParam(':id',$idProduit,PDO::PARAM_STR);
		
			
			$reqN1->execute();
			$lesLignesN1 = $reqN1->fetch(PDO::FETCH_ASSOC);
			

		}
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
		
	}
}


/**
	 * Supprime un article
	 *
	 * Supprime l'article sélectionné grâce à son id
	 * @param string $idProduit l'id du produit
	 
	*/
	function supprimerArticleAdmin($idProduit){

		if(isset($_SESSION['nomAdmin'])){
		try 
		{
			$monPdo = connexionPDO();
				$reqN1=$monPdo -> prepare('DELETE FROM produit where id= :id ');
			
			$reqN1 -> bindParam(':id',$idProduit,PDO::PARAM_STR);
			
			$reqN1->execute();
			$lesLignesN1 = $reqN1->fetch(PDO::FETCH_ASSOC);
			

		}
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage();
			die();
		}
		
	}
}


/**
	 * Ajoute un produit
	 *
	 * Crée un produit à partir des arguments validés passés en paramètre
	 * @param string $idProduit idProduit du produit donné via le formulaire
	 * @param string $desc description du produit donnée via le formulaire
	 * @param float $prix prix du produit donné via le formulaire
	 * @param string $image image du produit donnée via le formulaire
	 * @param string $idCategorie idCategorie donné dans le formulaire ou à partir de la categorie dans laquelle on veut ajouter un Produit
	 * @return boolean $testDouble permet de savoir si tous les paramètres sont corrects et que si l'ajout est réussi ou non
	
	 
	*/
function ajoutProduit($idProduit, $desc, $desc_detail, $image, $idCategorie, $idmarque){
$idCategorie=strtoupper($idCategorie);
if(isset($_SESSION['nomAdmin'])){
	$testDouble =true;
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id FROM produit where id= :id');
	$reqN -> bindValue(':id',$idProduit,PDO::PARAM_STR);
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	if(empty($lesLignesN) && (strtoupper($idCategorie) == "CH" || strtoupper($idCategorie) == "FO" || strtoupper($idCategorie) =="PS" )){
//'images/ car j'ai utilisé une image dans le dossier image/ a changer en fonctions du dossier où est l'image//
		$req = "insert into produit (id, description,  desc_detail, image, id_categorie,id_marque) values ('$idProduit','$desc','$desc_detail','images/$image','$idCategorie','$idmarque');";
		$res = $monPdo->exec($req);
		// insertion produits commandés
		$testDouble =false;
	}
	return $testDouble;

}
}
/**
 * recherhce le produit en fonction de la fourchette de prix
 * 
 * @param prixMin représente le prix minimum accépté dans la recherche
 * @param prixMax représente le prix maximum accépté dans la recherche
 */
function searchProductByPrice($prixMin, $prixMax){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id,`id_produit`, `description`, `prix`, `image`, `id_categorie`, `desc_detail` FROM produitcontenance INNER JOIN produit ON produitcontenance.id_produit = produit.id 
	WHERE prix BETWEEN :min AND :max order by prix ASC; ');
	$reqN -> bindValue(':min',$prixMin,PDO::PARAM_STR);
	$reqN -> bindValue(':max',$prixMax,PDO::PARAM_STR);
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}




function getInfoLeProd($id){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT `id`, `description`, `prix`, `image`, `id_categorie`, `desc_detail`,id_marque FROM produit INNER JOIN produitcontenance on produitcontenance.id_produit=produit.id WHERE id=:id');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}

/**
 * function qui récupère les produits suggérer en fonction de celui regardé
 * @param id qui correspond à l'id du produit regardé 
 */
function getProductsYouMayAlsoLike($id){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id, id_produit FROM suggestion WHERE id = :id');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesProduitsSuggerés = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesProduitsSuggerés;
}

function getStockProducts($id){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT stock from produitcontenance where id_produit = :id');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesStocks = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesStocks;
	
}


function getLesAvisProd($idProd){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id, titre_commentaire, commentaire, date_avis, avis.idCli as "idClient", nomUtil from avis INNER JOIN client on avis.idCli=client.idCli where id_produit = :idProd');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesAvis = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesAvis;
	
}

function getContenanceProd($idProd){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT produitcontenance.id_produit, produitcontenance.id_unite, unite.label_unite, produitcontenance.qte, produitcontenance.prix FROM produitcontenance INNER JOIN unite ON produitcontenance.id_unite = unite.id WHERE id_produit = :idProd');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	
	$reqN->execute();
	$lesAvis = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesAvis;
	
}
function getPriceAndStock($id, $unite, $qte){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT prix, stock from produitcontenance inner join unite on unite.id = produitcontenance.id_unite where id_produit = :id And label_unite = :unite and qte = :qte ;');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	$reqN -> bindValue(':unite',$unite,PDO::PARAM_STR);
	$reqN -> bindValue(':qte',$qte,PDO::PARAM_STR);
	
	$reqN->execute();
	$lePrixEtQte = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lePrixEtQte;
	
}

function ajoutAvis($titre_commentaire, $commentaire, $idProduit,$idCli){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('INSERT INTO avis (`id`, `titre_commentaire`, `commentaire`, `date_avis`, `id_produit`, `idCli`) VALUES (NULL,:titre_commentaire, :commentaire,current_timestamp(), :idProduit, :idCli)');
	$reqN -> bindValue(':titre_commentaire',$titre_commentaire,PDO::PARAM_STR);
	$reqN -> bindValue(':commentaire',$commentaire,PDO::PARAM_STR);
	$reqN -> bindValue(':idProduit',$idProduit,PDO::PARAM_STR);
	$reqN -> bindValue(':idCli',$idCli,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$avisAjout = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $avisAjout;
	
}
function getIdAvisNote($id_produit, $idCli){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id FROM avis WHERE id_produit = :id_produit AND idCli=:idCli');
	$reqN -> bindValue(':id_produit',$id_produit,PDO::PARAM_STR);
	$reqN -> bindValue(':idCli',$idCli,PDO::PARAM_STR);
	
	$reqN->execute();
	$lavis = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lavis;
}

function ajoutNote($id_avis, $idCli,$_idProd,$note){
	$monPdo = connexionPDO();
	$reqN=$monPdo -> prepare('INSERT INTO possede (`idCli`,`id`,`note`,`id_avis`) VALUES (:idCli,:_idProd,:note,:id_avis)');
	$reqN -> bindValue(':_idProd',$_idProd,PDO::PARAM_STR);
	$reqN -> bindValue(':id_avis',$id_avis,PDO::PARAM_STR);
	$reqN -> bindValue(':idCli',$idCli,PDO::PARAM_STR);
	$reqN -> bindValue(':note',$note,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$noteAjout = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $noteAjout;
	
}
function getCatById($id){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id_categorie FROM produit WHERE produit.id = :id');
	$reqN -> bindValue(':id',$id,PDO::PARAM_STR);
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}

function getIfDejaAvis($idProd,$idCli){
	$monPdo = connexionPDO();
$ok=true;
	$reqN=$monPdo -> prepare('SELECT id FROM avis WHERE id_produit = :idProd AND idCli=:idCli');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	$reqN -> bindValue(':idCli',$idCli,PDO::PARAM_STR);
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	if(empty($laCategorie)){
		$ok=false;
	}
	return $ok;
}

function getNoteAvis($id_avis){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT note FROM possede WHERE id_avis = :id_avis');
	$reqN -> bindValue(':id_avis',$id_avis,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}

function getNoteMoy($idProd){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT ROUND(AVG(note),2) as "Moy" FROM `possede` WHERE id=:idProd;');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}

function getNbAvis($idProd){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT COUNT(*) as "nbAvis" FROM `avis` WHERE id_produit=:idProd;');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}


function getMarque($idProd){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id_marque, label_marque  FROM `produit` inner join marque on marque.id = produit.id_marque WHERE produit.id=:idProd;');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}
function getIdByLabelUnite($label){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id  FROM `unite` WHERE label_unite=:label;');
	$reqN -> bindValue(':label',$label,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}
function getPrixByProdUnite($idProd,$id_unite){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT prix  FROM `produitcontenance` WHERE id_produit=:idProd AND id_unite = :id_unite;');
	$reqN -> bindValue(':idProd',$idProd,PDO::PARAM_STR);
	$reqN -> bindValue(':id_unite',$id_unite,PDO::PARAM_STR);
	
	$reqN->execute();
	$laCategorie = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $laCategorie;
}


/**
 * recherche le produit en fonction des prix et de la marque
 * 
 * @param prixMin représente le prix minimum accépté dans la recherche
 * @param prixMax représente le prix maximum accépté dans la recherche
 * @param marque représente la marque du produit rechercher
 */
function searchProductByPriceAndBrand($prixMin, $prixMax, $marque){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT produit.id, description, desc_detail, image, prix, produit.id_marque,id_categorie, label_marque from produit inner join marque on produit.id_marque = marque.id inner join produitcontenance on produit.id = produitcontenance.id_produit where marque.id = :marque and produitcontenance.prix BETWEEN :min and :max;  GROUP BY produit.id');
	$reqN -> bindValue(':marque',$marque,PDO::PARAM_STR);
	$reqN -> bindValue(':min',$prixMin,PDO::PARAM_STR);
	$reqN -> bindValue(':max',$prixMax,PDO::PARAM_STR);
	$reqN->execute();
	$lesLignesN = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesLignesN;
}
/**
 * recherche le produit en fonction de la marque
 * 
 * @param marque représente la marque du produit rechercher
 */
function searchProductByBrand($marque){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT produit.id, label_marque,description, desc_detail, id_categorie,id_marque, image, prix from produit inner join marque on marque.id = produit.id_marque inner join produitcontenance on produitcontenance.id_produit = produit.id where id_marque = :marque GROUP BY produit.id;');
	$reqN -> bindValue(':marque',$marque,PDO::PARAM_STR);
	$reqN->execute();
	$lesProduits = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesProduits;
}

/**
 * function qui va chercher toutes les marques disponibles
 * 
 */
function getAllBrand(){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id, label_marque from marque order by id asc; ');
	$reqN->execute();
	$lesMarques = $reqN->fetchAll(PDO::FETCH_ASSOC);
	
	return $lesMarques;
}
function getMarqueById($idmarque){
	$monPdo = connexionPDO();

	$reqN=$monPdo -> prepare('SELECT id, label_marque from marque where id = :id');
	$reqN -> bindValue(':id',$idmarque,PDO::PARAM_STR);
	
	
	$reqN->execute();
	$laMarque = $reqN->fetch(PDO::FETCH_ASSOC);
	
	return $laMarque;
}

?>	
