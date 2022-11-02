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

	function getTousLesProduits()
	{

		try 
		{
			$lesProduits = array();
        $monPdo = connexionPDO();
	    $req='select id, description, prix, image, idCategorie from produit';
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
 * @return array $lesLignes un tableau associatif  contenant les produits de la categ passée en paramètre
*/

	function getLesProduitsDeCategorie($idCategorie)
	{

		try 
		{
        $monPdo = connexionPDO();
	    $req='select id, description, prix, image, idCategorie from produit where idCategorie ="'.$idCategorie.'"';
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
				$req = 'select id, description, prix, image, idCategorie from produit where id = "'.$unIdProduit['id'].'"';
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
	function creerCommande($idCli,$nom,$rue,$cp,$ville,$mail, $lesIdProduit )
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
			$prodQte=$unIdProduit['qte'];
			$req = "insert into contenir values ('$idCommande','$idProd','$prodQte')";
			$res = $monPdo->exec($req);
		}
		}
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}

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
		return $lesCommandes;
		}
		catch (PDOException $e) 
		{
        print "Erreur !: " . $e->getMessage();
        die();
		}
	}
?>