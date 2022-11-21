<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
//chargement du fichier config.php contenant toues les infos liees à la base de donnees
require('config.php');
session_start();

if (isset($_POST['pseudo'])){
	$pseudo = stripslashes($_REQUEST['pseudo']);
	$pseudo = mysqli_real_escape_string($conn, $pseudo);
	$mdp = stripslashes($_REQUEST['mdp']);
	$mdp = mysqli_real_escape_string($conn, $mdp);
	//connexion
    $query = "SELECT * FROM `users` WHERE PSEUDO = '".$pseudo."' and MDP = '".hash('sha256',$mdp)."'";
	//Executer la requete
	$result = mysqli_query($conn,$query) or die(mysql_error());;
	//déterminer le nombre de réponse
	$rows = $result -> num_rows;
	if($rows==1){
		// Il existe 1 utilisateur, rechercher ses droits
		while($obj = $result->fetch_object()){
			$droit = $obj -> DROIT;
			$id_user = $obj -> ID_USER;
        }
		//On rempli le tableau $_SESSION avec le droit et l'identifiant
		$_SESSION['ID_USER'] = $id_user;
    	$_SESSION['DROIT'] = $droit;
		$_SESSION['PSEUDO'] = $pseudo;
	    header("Location: index.php");
	}else{
		//sinon création d'un message d'erreur
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	} 
}
?>
<!-- Partie HTML : création du formulaire de connexion -->
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><a href="index.php"><p> <font face="Arial" size="10" color="red" >Compteur</font></p></a></h1>
<h1 class="box-title">Connexion</h1>
<!-- Champ du nom d'utilisateur -->
<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur">
<!-- Champ mot de passe -->
<input type="password" class="box-input" name="mdp" placeholder="Mot de passe">
<!-- Bouton valider -->
<input type="submit" value="Connexion " name="submit" class="box-button">

<?php 
// Si le message d'erreur n'est pas vide, on l'affiche
if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
<h1>Créer un compte</h1>
	<a href="add_user.php"><p> <font face="Arial" size="4" color="purple" >Nouveau Compte</font></p></a>
</body>
</html>