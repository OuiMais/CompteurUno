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

require('config.php');
//recuperation de l'id passé par le formulaire
session_start();
$id_createur = $_SESSION['ID_USER'];
$postData = $_POST;
$nb_joueur = $_SESSION['nb_joueur'];
$id2 = 0;
$id3 = 0;
$id4 = 0;
$id5 = 0;
$id6 = 0;
$id7 = 0;
$id8 = 0;
$id9 = 0;
$id10 = 0;
$verif = 0;

for($i = 2; $i<=$nb_joueur;$i++){

    $num = strval($i);
    $nom = "NOM_JOUEUR_$num";
    if($verif == 0){
        if(! empty($postData[$nom])){
            switch ($i) {
                case 2:
                    $id2 = $postData[$nom];
                    break;
                case 3:
                    $id3 = $postData[$nom];
                    if($id2 != $id3){
                        $verif = 0;
                    }
                    else{
                        $verif = 1;
                    }
                    break;
                case 4:
                    $id4 = $postData[$nom];
                    if($id4 != $id3 && $id4 != $id2){
                        $verif = 0;
                    }else{
                        $verif = 1;
                    }
                    break;
                case 5:
                    $id5 = $postData[$nom];
                    if($id5 != $id2 && $id5 != $id3 && $id5 != $id4){
                        $verif = 0;
                    }else{
                        $verif = 1;
                    }
                    break;
                case 6:
                    $id6 = $postData[$nom];
                    if($id6 != $id2 && $id6 != $id3 && $id6 != $id4 && $id6 != $id5){
                        $verif = 0;
                    }else{
                        $verif = 1;
                    }
                    break;
                case 7:
                    $id7 = $postData[$nom];
                    if($id7 != $id2 && $id7 != $id3 && $id7 != $id4 && $id7 != $id5 && $id7 != $id6){
                        $verif = 0;
                    }else{
                        $verif = 1;
                    }
                    break;
                case 8:
                    $id8 = $postData[$nom];
                    if($id8 != $id2 && $id8 != $id3 && $id8 != $id4 && $id8 != $id5 && $id8 != $id6 && $id8 != $id7){
                        $verif = 0;
                    }else{
                        $verif = 1;
                    }
                    break;
                case 9:
                    $id9 = $postData[$nom];
                    if($id9 != $id2 && $id9 != $id3 && $id9 != $id4 && $id9 != $id5 && $id9 != $id6 && $id9 != $id7 && $id9 != $id8){
                        $verif = 0;
                    }else{
                        $verif = 1;
                    }
                    break;
                case 10:
                    $id10 = $postData[$nom];
                    if($id10 != $id2 && $id10 != $id3 && $id10 != $id4 && $id10 != $id5 && $id10 != $id6 && $id10 != $id7 && $id10 != $id8 && $id10 != $id9){
                        $verif = 0;
                    }else{
                        $verif = 1;
                    }
                    break;
            }
        } else{
            $message = "ERREUR: Veuillez selectionner des joueurs.";
            $i = $nb_joueur;
            $verif = 1;
        }
    }
}
if($verif == 0){
    $querry = "INSERT INTO jeu(NB_JOUEUR, ETAT, ID_JOUEUR_1, ID_JOUEUR_2, ID_JOUEUR_3, ID_JOUEUR_4, ID_JOUEUR_5, ID_JOUEUR_6, ID_JOUEUR_7, ID_JOUEUR_8, ID_JOUEUR_9, ID_JOUEUR_10) VALUES ('".$nb_joueur."','.1.','".$id_createur."','".$id2."','".$id3."','".$id4."','".$id5."','".$id6."','".$id7."','".$id8."','".$id9."','".$id10."')";
    $result = mysqli_query($conn,$querry) or die(mysql_error());
    header('Location: party_list.php');//171000
} else{
    if(empty($message)){
        $message = "ERREUR: Il y a au moins deux joueurs identiques. Veuillez selectionner des joueurs différents.";
    }
}
?>

<?php 
// Si le message d'erreur n'est pas vide, on l'affiche
if (! empty($message)) { ?>
    <html>
        <?php 
            include_once('header_user.php'); 
        ?>
        <body>
            <div style="width:100%; text-align:center">
                <form action="post_new_party_player.php" method="POST">
                    <p class="errorMessage"><font face="Arial" size="6" ><?php echo $message; ?></font></p>
                    <button type="submit" formaction="new_party.php">Retour</button>
                </form>
            </div>
        </body>
        <?php 
            include_once('footer.php'); 
        ?>
    </html>
<?php 
} ?>

</body>
</html>
