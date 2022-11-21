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
<div class="container">
    <form action="post_new_party_player.php" method="POST">
        <div class="mb-3">
                			
				<label for="NB_JOUEUR" class="form-label">Nombre de joueur :</label>
                <select name="NB_JOUEUR" id="NB_JOUEUR"  class="form-control">
                    <option> 2 </option>
                    <option> 3 </option>
                    <option> 4 </option>
                    <option> 5 </option>
                    <option> 6 </option>
                    <option> 7 </option>
                    <option> 8 </option>
                    <option> 9 </option>
					<option> 10 </option>
                </select>
						
        </div>
        <button type="submit" class="btn btn-primary">Suivant</button>
    </form>
    <br />
</div>
<?php
// inclusion du bas de page du site : pour ce deconnecter
 include_once('footer.php'); 
 ?>
</body>
</html>