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
require('config.php');
//recuperation de l'id passé par le formulaire
session_start();
$id_createur = $_SESSION['ID_USER'];
$postData = $_POST;
$nb_joueur = $postData['NB_JOUEUR'];
$_SESSION['nb_joueur'] = $nb_joueur;
//Affichage du formulaire
?>
<div style="width:100%; text-align:center">
    <form action="post_new_party.php" method="POST">
        <div class="mb-3">
            <table id="table" class="table table-hover">
                <thead>
                    <tr>
                        <th>Numéro Joueur</th>
                        <th>Nom Joueur</th>
                        <th>Nouveau Joueur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-title="Numéro Joueur"><?php echo(1);?></td>
                        <td data-title="Nom Joueur">
                            <?php
                                $nom = "NOM_JOUEUR_1";
                                $requestPseudo = "SELECT PSEUDO FROM `USERS` WHERE ID_USER = $id_createur";
                                $resultRequestPseudo = mysqli_query($conn,$requestPseudo) or die(mysqli_error());
                                $objPseudo = $resultRequestPseudo->fetch_object();
                                $pseudo = $objPseudo->PSEUDO;
                                $_SESSION[$nom] = $pseudo;
                                echo($pseudo);
                            ?>
                        </td>
                    </tr>
                    <tr>
                    <?php
                        for($i = 2; $i<=$nb_joueur;$i++){
                    ?>
                    <tr>
                        <td data-title="Numéro Joueur"><?php echo($i);?></td>
                        <td data-title="Nom Joueur">
                            <?php
                                $num = strval($i);
                                $nom = "NOM_JOUEUR_$num";
                            ?>
                            <select name=<?php echo($nom); ?> id=<?php echo($nom); ?>  class="form-control">
                                <?php
                                    $requestPseudo = "SELECT * FROM `USERS` WHERE ID_USER != $id_createur AND ID_USER != 1";
                                    $resultRequestPseudo = mysqli_query($conn,$requestPseudo) or die(mysqli_error());
                                    while($objPseudo =  $resultRequestPseudo->fetch_object()){
                                ?>
                                    <option value="<?php echo($objPseudo->ID_USER) ?>"><?php echo($objPseudo->PSEUDO);?></option>
                                <?php 
                                    } 
                                ?>
                            </select>
                        </td>
                        <td data-title="Nouveau Joueur">
                            <a href="new_player.php">Nouveau Joueur</a>
                        </td>
                    <?php
                        }
                    ?>
                    </tr>
                </tbody>
            </table>					
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