<?php
$action = $_REQUEST['action'];
switch($action)
{


	case 'voirForm':
	{
	include('vues/v_seConnecter.php');
	break;
	}

	case 'inscription':
	{

		include('vues/v_inscription.php');
		break;
	}
	case 'inscriptionR':
	{
	$testDouble =ajouterClient($_POST['nomUtil2'],$_POST['mdp'],$_POST['nomInsc'],$_POST['adresseInsc'],
								$_POST['codePostInsc'],$_POST['villeInsc'],$_POST['tel'], $_POST['courriel']);

			ajouterClient($_POST['nomUtil2'],$_POST['mdp'],$_POST['nomInsc'],$_POST['adresseInsc'],
						  $_POST['codePostInsc'],$_POST['villeInsc'],$_POST['tel'], $_POST['courriel']);


			include('vues/v_inscription.php');?>

			<div class = "message-form"><?php
			if($testDouble){?>
				<p id = "message-failed">  Ajout du client échoué</p><?php
			}
			else{?>
				<p id = "message-reussi">  Ajout du client réussi</p>'<?php
			}
		break;
	}
	case 'connexion':
	{
		$testConnexion = seConnecter($_POST['nomUtil'],$_POST['mdp']);

		 seConnecter($_POST['nomUtil'],$_POST['mdp']);
		
		include('vues/v_seConnecter.php');?>
	<div class = "message-form"><?php
			if($testConnexion){ 
				header('Location:index.php');
			
			}
			else{?>
				<p id = "message-reussi">   Authentification échouée / Nom d'utilisateur ou Mot de passe incorrect</p><?php
			}
		break;

	}
}