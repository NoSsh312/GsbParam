<?php
$action = $_REQUEST['action'];
switch($action)
{


    case 'voirCatAdmin':
        {

            $categories=getLesCategories();

            include('vues/v_catAdmin.php');

            break;
        }
    case 'ajouterCat':
        {
          
            if(isset($_POST['submit']))
            {
                $id=$_POST['idCat'];
                $id=strtoupper($id);
                $libelle=$_POST['labelCat'];
              
                if(ajouterCat($id,$libelle)){
                    $ok=true;
                }else{
                    $ok=false;
                }

            }
            include('vues/v_catAjoutAdmin.php');

            break;
        }
        
        
        case 'modifCat':
            {
                if(isset($_GET['cat'])){
                    $idCat = $_GET['cat'];
                $idCatOld = $_GET['cat'];
                $libelleCat=getLeLibelleCategorie($idCatOld);
                }
                
                if(isset($_POST['submit'])){
                    $idCat=$_POST['idCat'];
                    $idCat=strtoupper($idCat);
                    $libelleCat=$_POST['labelCat'];
                    
                    if(updateCat($idCat,$libelleCat,$idCatOld)){
                        $ok=true;
                        header("Location:index.php?uc=gererCat&action=modifCat&cat=$idCat");
                    }else{
                        $ok=false;
                        header("Location:index.php?uc=gererCat&action=modifCat&cat=$idCat");
                      
                    }
                }
                include('vues/v_modifCatAdmin.php');
                break;
            }


            case 'suppCat':
                {
                    $idcat=$_GET['cat'];
                    
                if(deleteCat($idcat)){
                    
                    $ok=true;
                }else{
                    $ok=false;
                }
                    header('Location:index.php?uc=gererCat&action=voirCatAdmin');

                    break;
                }
}
