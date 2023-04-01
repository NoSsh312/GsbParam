<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'voirMonProfil' :
        {


        $lesInfoUtil= getLesInfoUtil($_SESSION['nomUtil']);
        foreach($lesInfoUtil as $uneInfo){
        $idClient= $uneInfo['idCli'];
        }
        
        $lesCommandesUtil = getLesCommandesUtil($idClient);

      
        $lesAvisUtil = getLesAvisUtil($idClient);
            include('vues/v_profil.php');
            break;
        }



}