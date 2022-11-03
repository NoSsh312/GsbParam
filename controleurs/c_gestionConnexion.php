<?php
$action = $_REQUEST['action'];
switch($action)
{


	case 'voirForm':
	{
		$admin=false;
	include('vues/v_seConnecter.php');
	break;
	}

	case 'voirFormPourAdmin':
	{
		$admin=true;
	include('vues/v_seConnecterAdmin.php');
	break;
	}

	case 'inscription':
	{

		include('vues/v_inscription.php');
		break;
	}
	case 'inscriptionR':
	{

	$testDouble =ajouterClient($_POST['nomUtil2'],password_hash($_POST['mdp'], PASSWORD_DEFAULT),$_POST['nomInsc'],$_POST['adresseInsc'], $_POST['codePostInsc'],$_POST['villeInsc'],$_POST['tel'], $_POST['courriel']);

			
			include('vues/v_inscription.php');?>

			<div class = "message-form"><?php
			if($testDouble){
			?>
				<p id = "message-failed">  Ajout du client échoué</p><?php
			}
			else{?>
				<p id = "message-reussi">  Ajout du client réussi</p><?php
			}
		break;
	}
	case 'connexion':
	{
		$nomUtilisateur = $_POST['nomUtil'];
		$mdpUtil=$_POST['mdp'];

		
		$testConnexion = seConnecter($nomUtilisateur,$mdpUtil);
	

		
		include('vues/v_seConnecter.php');?>
	<div class = "message-form"><?php

			if($testConnexion){ 

				
				header('Location:index.php');
			
			}
			else{
				
				$message= " Authentification échouée / Nom d'utilisateur ou Mot de passe incorrect";
				include('vues/v_message.php');
			}
		break;

	}
	case 'connexionPourAdmin':
	{
		$nomUtilisateur = $_POST['nomUtil'];
		$mdpUtil=$_POST['mdp'];

		
		$testConnexion = seConnecterPourAdmin($nomUtilisateur,$mdpUtil);
	

		
		include('vues/v_seConnecter.php');?>
	<div class = "message-form"><?php

			if($testConnexion){ 

				
				header('Location:index.php?uc=voirProduits&action=voirProduits&categorie=CH');
			
			}
			else{
				
				$message= " Authentification échouée / Nom d'utilisateur ou Mot de passe incorrect";
				include('vues/v_message.php');
			}
		break;

	}

}