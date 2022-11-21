<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["PSEUDO"])){
		header("Location: login.php");
		exit(); 
	}
	else
	{
		
		if($_SESSION['DROIT'] == 0)
			header("Location: index_admin.php");
		else
			header("Location: index_user.php");
	}
?>


