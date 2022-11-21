<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
<?php 
require('config.php');
//selection header en fonction de si on est admin ou pas
$query = "SELECT droit FROM `users`";
$result = mysqli_query($conn,$query) or die(mysql_error());
$obj = $result->fetch_object();
$ok = $obj -> droit;
if($ok == 1){
	include_once('header_admin.php'); 
} else {
	include_once('header_user.php'); 
}
//par defaut affichage de la page de gestion des dossiers
include_once('party_list_central.php');
// inclusion du bas de page du site : pour ce deconnecter
 include_once('footer.php'); 
 ?>
</body>
</html>