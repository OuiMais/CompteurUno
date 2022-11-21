<?php
// Informations d'identification
define('DB_SERVER', 'localhost');//serveur
define('DB_USERNAME', 'root');//nom users
define('DB_PASSWORD', 'root');//mdp
define('DB_NAME', 'CompteurUno');//nom de la base de donnees
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>