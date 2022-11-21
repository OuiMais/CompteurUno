<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
<?php 

require('config.php');
$postData = $_POST;
$pseudo = $postData['pseudo'];
$pseudo = stripslashes($pseudo);
$pseudo = mysqli_real_escape_string($conn, $pseudo); 
?>
<?php

$query = "INSERT INTO users(PSEUDO, MDP, DROIT) VALUES ('".$pseudo."','".hash('sha256', "")."','.1.')";
//execution de la requete
$result = mysqli_query($conn,$query) or die(mysql_error());
header('Location: new_party.php');


?>
</body>
</html>