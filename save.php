<?php
/**
 * Je vérifie que mes données soient bien transmises
 */
var_dump($_POST);
$host       = 'localhost';
$dbname     = 'cours_php'; 
$port       = '3308';  
$login      = 'root';  
$password   = ''; 
/**
 * Je me connecte à la base de données
 */
try {
    
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;port='.$port, $login, $password);
}
catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}