<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'selecCli':
        {

            $lesCli=getLesClients();
            include('vues/v_SelectClient.php');
            break;
        }
        case 'CommandeClient':
            {

               $idCli= $_POST['selectCli'];
               $commandeCli=getLesCommandesUtil($idCli);
            
                include('vues/v_commandeClient.php');
                break;
            }

            case 'updateCmd':
                {
                    $idCli=$_GET['cli'];
                 
                    $idCmd=$_GET['cmd'];
                    updateCmd($idCmd);
                    $commandeCli=getLesCommandesUtil($idCli);
                    include('vues/v_commandeClient.php');
                    break;
                }


}