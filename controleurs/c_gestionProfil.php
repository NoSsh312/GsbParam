<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'voirMonProfil' :
        {
            include('vues/v_profil.php');
            break;
        }



}