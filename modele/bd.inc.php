<?php
/** 
 * Mission 3 : architecture MVC
 * @mainpage La documentation de la mission 3
*/
/**
 * @file bd.inc.php
 * @author Marielle Jouin <jouin.marielle@gmail.com>
 * @version    2.0
 * @date nov 2021
 * @details contient la fonction qui créée l'ojet Pdo $conn pour l'accès à la BD
 */
 
/**
 * connexionPdo fournit un objet Pdo $conn
 * pour effectuer ensuite des requêtes
*/
function connexionPDO() {
    $login = 'root';
    $mdp = '';
    $bd = 'ryu_m2gsbparam';
    $serveur = 'localhost';

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd;port=3307",$login,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}


function connexionPDO2($nom , $mdp) {
    

    try {
        $conn = new PDO("mysql:host=localhost;dbname=ryu_m2gsbparam;port=3307",$nom,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}


?>
