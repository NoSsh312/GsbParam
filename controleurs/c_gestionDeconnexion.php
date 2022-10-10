<?php 
$action = $_REQUEST['action'];
switch($action)
{
	case 'deconnexion' : 
	{
	session_destroy();
	include('vues/v_deconnexion.php');
	header('Location:index.php');
	break;
}
}

?>