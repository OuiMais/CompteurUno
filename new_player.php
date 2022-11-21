<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle partie</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>

<?php 
//inclusion du menu de navigation de la partie user
include_once('header_user.php'); 
//Affichage du formulaire
?>

<div class="container" style="width:100%; text-align:center">
    <h1>Nouveau Joueur</h1>
    <form action="post_new_player.php" method="POST">
        <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo : </label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required placeholder="Pseudo"><br />
                      
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button> <br/>
			<br/> <a href="new_party.php"><p> <font face="Arial" size="4" color="purple" >Retour</font></p></a>
    </form>
    <br />
</div>
<?php
// inclusion du bas de page du site : pour ce deconnecter
 include_once('footer.php'); 
 ?>
</body>
</html>