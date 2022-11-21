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

if(isset($_POST['pseudo'])){
    $pseudo = $_POST['pseudo'];
    $pseudo = stripslashes($pseudo);
    $pseudo = mysqli_real_escape_string($conn, $pseudo);
    $mdp = $_POST['mdp'];
    $mdp = stripslashes($mdp);
    $mdp = mysqli_real_escape_string($conn, $mdp); 
    $recupPseudo = "SELECT PSEUDO FROM `users`";
    $resultPseudo = mysqli_query($conn,$recupPseudo) or die(mysql_error());

    while($obj = $resultPseudo->fetch_object()){
        if($pseudo == $obj->PSEUDO){
            $message = "Le pseudo est déjà utilisé.";
        }
    }
    if(empty($message)){
        $newPlayer = "INSERT INTO users(PSEUDO, MDP, DROIT) VALUES ('".$pseudo."', '".hash('sha256', $mdp)."','.1.')";
        $result = mysqli_query($conn,$newPlayer) or die(mysql_error());
        header('Location: login.php');
    }
}
?>
<div class="container">
    <h1>Nouvel Utilisateur</h1>
    <form action="" method="POST">
        <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo : </label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required placeholder="Pseudo"><br />
                <label for="mdp" class="form-label">Mot de passe : </label>
                <input type="password" class="form-control" name="mdp" id="mdp"/>
                      
            </div>
            <?php 
            // Si le message d'erreur n'est pas vide, on l'affiche
            if (! empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Ajouter</button> <br />
			<br /> <a href="login.php"><p> <font face="Arial" size="4" color="purple" >Retour</font></p></a>
    </form>
    <br />
</div>
</body>
</html>